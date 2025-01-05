<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $venues = Venue::all();
        $events = Event::where('organizer_id', Auth::id())
            ->with('tickets')
            ->get();
        
        return view('organizer', [
            'venues' => $venues, 
            'events' => $events
        ]);
    }

    public function createEvent(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ]);

        $validatedData['organizer_id'] = Auth::id();
        $event = Event::create($validatedData);

        return response()->json([
            'success' => true, 
            'event' => $event
        ]);
    }

    public function createTicket(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'type' => 'required|in:reguler,vip,vvip',
        ]);

        $ticket = Ticket::create($validatedData);

        return response()->json([
            'success' => true, 
            'ticket' => $ticket
        ]);
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        
        // Ensure the event belongs to the current organizer
        if ($event->organizer_id !== Auth::id()) {
            return response()->json([
                'success' => false, 
                'message' => 'Unauthorized'
            ], 403);
        }

        $event->delete();

        return response()->json([
            'success' => true, 
            'message' => 'Event deleted successfully'
        ]);
    }

    public function deleteTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        // Ensure the ticket belongs to the current organizer's event
        if ($ticket->event->organizer_id !== Auth::id()) {
            return response()->json([
                'success' => false, 
                'message' => 'Unauthorized'
            ], 403);
        }

        $ticket->delete();

        return response()->json([
            'success' => true, 
            'message' => 'Ticket deleted successfully'
        ]);
    }
}