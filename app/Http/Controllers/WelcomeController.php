<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch all events, ordered by most recent
        $events = Event::latest()->get();

        return view('welcome', compact('events'));
    }
}