<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        // Log the raw request data for debugging
        Log::info('Raw Transaction Request', [
            'user_id' => Auth::id(),
            'input' => $request->all(),
            'json' => $request->getContent()
        ]);

        try {
            // Validate the request with detailed rules
            $validatedData = $request->validate([
                'event_id' => 'required|exists:events,id',
                'tickets' => 'required|array|min:1',
                'tickets.*.id' => 'required|exists:tickets,id',
                'tickets.*.quantity' => 'required|integer|min:1|max:10',
            ], [
                // Custom error messages
                'event_id.required' => 'Event selection is required.',
                'event_id.exists' => 'Selected event does not exist.',
                'tickets.required' => 'At least one ticket is required.',
                'tickets.*.id.exists' => 'Invalid ticket selected.',
                'tickets.*.quantity.min' => 'Ticket quantity must be at least 1.',
                'tickets.*.quantity.max' => 'Maximum 10 tickets per type allowed.',
            ]);

            // Additional validation to ensure tickets belong to the event
            $event = Event::findOrFail($validatedData['event_id']);

            // Validate each ticket
            foreach ($validatedData['tickets'] as $ticketData) {
                $ticket = Ticket::findOrFail($ticketData['id']);
                
                // Check if ticket belongs to the event
                if ($ticket->event_id !== $event->id) {
                    throw ValidationException::withMessages([
                        'tickets' => "Ticket {$ticket->id} does not belong to the selected event."
                    ]);
                }

                // Check ticket availability
                if ($ticket->stok < $ticketData['quantity']) {
                    throw ValidationException::withMessages([
                        'tickets' => "Not enough tickets available for {$ticket->nama}. Available: {$ticket->stok}, Requested: {$ticketData['quantity']}"
                    ]);
                }
            }

            // Start database transaction
            DB::beginTransaction();

            try {
                // Calculate grand total and validate ticket availability
                $grandTotal = 0;
                $detailTransaksiData = [];

                foreach ($validatedData['tickets'] as $ticketData) {
                    // Find the ticket and lock the row
                    $ticket = Ticket::lockForUpdate()->findOrFail($ticketData['id']);

                    // Calculate subtotal
                    $subtotal = $ticket->harga * $ticketData['quantity'];
                    $grandTotal += $subtotal;

                    // Prepare detail transaksi data
                    $detailTransaksiData[] = [
                        'tiket_id' => $ticket->id,
                        'quantity' => $ticketData['quantity'],
                        'subtotal' => $subtotal
                    ];
                }

                // Create transaction
                $transaksi = Transaksi::create([
                    'user_id' => Auth::id(),
                    'event_id' => $event->id,
                    'grand_total' => $grandTotal,
                    'status' => 'pending'
                ]);

                // Create detail transaksi
                $detailTransaksiWithTransaksiId = array_map(function ($detail) use ($transaksi) {
                    $detail['transaksi_id'] = $transaksi->id;
                    $detail['created_at'] = now();
                    $detail['updated_at'] = now();
                    return $detail;
                }, $detailTransaksiData);

                Detail_Transaksi::insert($detailTransaksiWithTransaksiId);

                // Update ticket stocks
                foreach ($validatedData['tickets'] as $ticketData) {
                    $ticket = Ticket::findOrFail($ticketData['id']);
                    $ticket->decrement('stok', $ticketData['quantity']);

                    // Update ticket status if stock is 0
                    if ($ticket->stok <= 0) {
                        $ticket->status = 'habis';
                        $ticket->save();
                    }
                }

                // Commit the transaction
                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Transaction successful',
                    'transaction_id' => $transaksi->id
                ], 201);

            } catch (\Exception $e) {
                // Rollback the transaction
                DB::rollBack();

                // Log unexpected errors
                Log::error('Transaction Processing Failed', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'input' => $validatedData
                ]);

                return response()->json([
                    'status' => 'error',
                    'message' => 'Transaction processing failed',
                    'error' => $e->getMessage()
                ], 400);
            }

        } catch (ValidationException $e) {
            // Log validation errors
            Log::error('Transaction Validation Failed', [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }
}