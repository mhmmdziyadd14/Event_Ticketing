@extends('layouts.app')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">All Events</h2>
                <p class="color-black-opacity-5">Discover Exciting Events Happening Soon</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4">
                {{-- Sidebar Filters --}}
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Filter Events</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('events.index') }}" method="GET">
                            {{-- Date Range Filter --}}
                            <div class="form-group">
                                <label>Date Range</label>
                                <input type="date" name="start_date" class="form-control mb-2" placeholder="Start Date">
                                <input type="date" name="end_date" class="form-control" placeholder="End Date">
                            </div>

                            {{-- Category Filter --}}
                            <div class="form-group">
                                <label>Event Type</label>
                                <select name="event_type" class="form-control">
                                    <option value="">All Types</option>
                                    <option value="music">Music</option>
                                    <option value="conference">Conference</option>
                                    <option value="sports">Sports</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @forelse($events as $event)
                        <div class="col-md-6 mb-4">
                            <div class="listing-item">
                                <div class="listing-image">
                                    @php
                                        $eventImage = $event->artists->first()->foto ?? 'default-event.jpg';
                                    @endphp
                                    <img src="{{ asset('storage/' . $eventImage) }}" 
                                         alt="{{ $event->nama }}" 
                                         class="img-fluid">
                                </div>
                                <div class="listing-item-content">
                                    <a href="{{ route('events.show', $event->id) }}" class="bookmark">
                                        <span class="icon-heart"></span>
                                    </a>
                                    <a class="px-3 mb-3 category" href="#">
                                        {{ $event->venue->nama }}
                                    </a>
                                    <h2 class="mb-1">
                                        <a href="{{ route('events.show', $event->id) }}">
                                            {{ $event->nama }}
                                        </a>
                                    </h2>
                                    <span class="address">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </span>
                                    <div class="mt-2">
                                        <span class="badge badge-primary">
                                            Tickets from ${{ $event->tickets->min('harga') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                No events found. Check back later!
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $events->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection