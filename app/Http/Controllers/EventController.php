<?php
 namespace App\Http\Controllers;

 use App\Models\Event;
 use App\Models\Ticket;
 use App\Models\Venue;
 use App\Models\Artist;
 use App\Models\Transaksi;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;
 use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\JsonResponse;

 class EventController extends Controller
 {
     /**
      * Display a listing of the events.
      */
     public function index()
     {
         // Fetch venues
         $venues = Venue::all();

         // Fetch artists
         $artists = Artist::all();

         // Fetch events for the current user
         $events = Event::where('organizer_id', Auth::id())
             ->latest()
             ->paginate(9);

         // Pass venues, artists, and events to the view
         return view('organizer', [
             'venues' => $venues,
             'artists' => $artists,
             'events' => $events
         ]);
     }
     public function showDetails(Event $event): JsonResponse
     {
         // Load any relationships you need for the modal (e.g., artists, tickets, venue)
         $event->load('artists', 'tickets', 'venue');
         return response()->json($event);
     }

     /**
      * Show the form for creating a new event.
      */
     public function create()
     {
         $venues = Venue::all();
         return view('events.create', compact('venues'));
     }

     /**
      * Store a newly created event in storage.
      */
     public function store(Request $request)
     {
         // Validate the request
         $validatedData = $request->validate([
             'nama' => 'required|string|max:255',
             'deskripsi' => 'required|string',
             'tanggal' => 'required|date|after:today',
             'venue_id' => 'required|exists:venues,id',
             'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'ticket_nama.*' => 'required|string',
             'ticket_harga.*' => 'required|numeric|min:0',
             'ticket_stok.*' => 'required|integer|min:0',
             'ticket_type.*' => 'required|in:reguler,vip,vvip',
             'artists' => 'nullable|array',
             'artists.*' => 'exists:artists,id',
         ]);

         // Start a database transaction
         DB::beginTransaction();

         try {
             // Prepare input data
             $input = $request->all();
             $input['organizer_id'] = Auth::id();

             // Handle file upload
             if ($request->hasFile('foto')) {
                 $image = $request->file('foto');
                 $filename = 'event_' . time() . '.' . $image->getClientOriginalExtension();
                 $path = $image->storeAs('event_photos', $filename, 'public');
                 $input['foto'] = $path;
             }

             // Create Event
             $event = Event::create($input);

             // Attach Artists if provided
             if ($request->has('artists') && !empty($request->artists)) {
                 $event->artists()->attach($request->artists);
             }

             // Create Tickets
             if ($request->has('ticket_nama')) {
                 $ticketsData = [];
                 foreach ($request->ticket_nama as $key => $ticketName) {
                     $ticketsData[] = [
                         'event_id' => $event->id,
                         'nama' => $ticketName,
                         'harga' => $request->ticket_harga[$key],
                         'stok' => $request->ticket_stok[$key],
                         'type' => $request->ticket_type[$key],
                         'status' => 'tersedia',
                         'created_at' => now(),
                         'updated_at' => now(),
                     ];
                 }

                 // Bulk insert tickets
                 Ticket::insert($ticketsData);
             }

             // Commit the transaction
             DB::commit();

             return redirect()->route('organizer')
                 ->with('success', 'Event created successfully.');

         } catch (\Exception $e) {
             // Rollback the transaction
             DB::rollBack();

             // Log the error
             Log::error('Event Creation Error: ' . $e->getMessage());

             return back()->with('error', 'Failed to create event. Please try again.')
                 ->withInput();
         }
     }

     /**
      * Display the specified event.
      */
     public function show(Event $event)
     {
         return view('events.show', compact('event'));
     }

     public function userDashboard(Request $request)
     {
         $user = Auth::user();

         // Fetch events for the user
         $query = Event::with(['tickets', 'venue', 'artists'])
             ->where('tanggal', '>=', now());

         // Venue filter
         if ($request->filled('venue_id')) {
             $query->where('venue_id', $request->venue_id);
         }

         // Artist filter
         if ($request->filled('artist_id')) {
             $query->whereHas('artists', function ($q) use ($request) {
                 $q->where('artists.id', $request->artist_id);
             });
         }

         // Search filter
         if ($request->filled('search')) {
             $query->where(function ($q) use ($request) {
                 $q->where('nama', 'like', '%' . $request->search . '%')
                     ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
             });
         }

         $events = $query->latest()->paginate(9);

         // Fetch venues and artists for filtering
         $venues = Venue::all();
         $artists = Artist::all();

         // Fetch user's transaction history
         $transactions = Transaksi::with('event')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

         return view('user', [
             'events' => $events,
             'venues' => $venues,
             'artists' => $artists,
             'transactions' => $transactions
         ]);
     }

     public function update(Request $request, Event $event)
     {
         $validatedData = $request->validate([
             'nama' => 'required|string|max:255',
             'deskripsi' => 'required|string',
             'tanggal' => 'required|date',
             'venue_id' => 'required|exists:venues,id',
             'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'artists' => 'nullable|array',
             'artists.*' => 'exists:artists,id',
         ]);

         // Start a database transaction
         DB::beginTransaction();

         try {
             $input = $request->all();

             // Handle file upload
             if ($request->hasFile('foto')) {
                 // Delete old file if exists
                 if ($event->foto) {
                     Storage::disk('public')->delete($event->foto);
                 }

                 $image = $request->file('foto');
                 $filename = 'event_' . time() . '.' . $image->getClientOriginalExtension();
                 $path = $image->storeAs('event_photos', $filename, 'public');
                 $input['foto'] = $path;
             } else {
                 // Keep existing photo if no new photo uploaded
                 unset($input['foto']);
             }

             // Update Event
             $event->update($input);

             // Sync Artists
             if ($request->has('artists')) {
                 $event->artists()->sync($request->artists);
             } else {
                 // If no artists are selected, detach all existing artists
                 $event->artists()->detach();
             }

             // Commit the transaction
             DB::commit();

             return redirect()->route('organizer')
                 ->with('success', 'Event updated successfully');

         } catch (\Exception $e) {
             // Rollback the transaction
             DB::rollBack();

             // Log the error
             Log::error('Event Update Error: ' . $e->getMessage());

             return back()->with('error', 'Failed to update event. Please try again.')
                 ->withInput();
         }
     }

     /**
      * Show the form for editing the specified event.
      */
     public function edit(Event $event)
     {
         $venues = Venue::all();
         $artists = Artist::all();

         // Load existing artists for the event
         $selectedArtists = $event->artists->pluck('id')->toArray();

         return view('events.edit', compact('event', 'venues', 'artists', 'selectedArtists'));
     }

     /**
      * Get artists for a specific event
      */
     public function getEventArtists(Event $event)
     {
         $artists = $event->artists;
         return response()->json($artists);
     }



     public function destroy(Event $event)
     {
         // Delete associated photo
         if ($event->foto) {
             Storage::disk('public')->delete($event->foto);
         }

         $event->delete();

         return redirect()->route('organizer')
             ->with('success', 'Event deleted successfully');
     }
 }