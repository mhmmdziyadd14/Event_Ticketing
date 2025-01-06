<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Models\Artist;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Base query for events
        $query = Event::query();

        // Filter events from today onwards
        $query->where('tanggal', '>=', now()->toDateString());

        // Search by event name or description
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        // Filter by venue
        if ($request->filled('venue_id')) {
            $query->where('venue_id', $request->input('venue_id'));
        }

        // Filter by artist (if you have a many-to-many relationship)
        if ($request->filled('artist_id')) {
            $query->whereHas('artists', function ($q) use ($request) {
                $q->where('artists.id', $request->input('artist_id'));
            });
        }

        // Order by most recent and paginate
        $events = $query->latest('tanggal')->paginate(9);

        // Fetch venues and artists for dropdown filters
        $venues = Venue::all();
        $artists = Artist::all();

        return view('welcome', [
            'events' => $events,
            'venues' => $venues,
            'artists' => $artists
        ]);
    }
}