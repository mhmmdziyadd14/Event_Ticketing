<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->nama }} - Event Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .event-image {
            max-height: 500px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card mb-3">
            <img src="{{ $event->foto ? asset('storage/' . $event->foto) : 'https://via.placeholder.com/1200x600.png?text=Event+Image' }}" 
                 class="card-img-top event-image" alt="{{ $event->nama }}">
            
            <div class="card-body text-center">
                <h1 class="card-title">{{ $event->nama }}</h1>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>Venue:</strong> 
                        {{ optional($event->venue)->nama ?? 'Venue Not Specified' }}
                    </div>
                    <div class="col-md-4">
                        <strong>Date:</strong> 
                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                    </div>
                    <div class="col-md-4">
                        <strong>Time:</strong> 
                        {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i A') }}
                    </div>
                </div>

                <p class="card-text">{{ $event->deskripsi ?? 'No description available' }}</p>

                <div class="mb-3">
                    <h4>Artists</h4>
                    @if($event->artists && $event->artists->count() > 0)
                        <div class="d-flex justify-content-center gap-3">
                            @foreach($event->artists as $artist)
                                <span class="badge bg-primary">{{ $artist->nama }}</span>
                            @endforeach
                        </div>
                    @else
                        <p>No artists specified</p>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ticket Options</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Available</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($event->tickets as $ticket)
                                            <tr>
                                                <td>{{ ucfirst($ticket->type) }}</td>
                                                <td>Rp {{ number_format($ticket->harga, 0, ',', '.') }}</td>
                                                <td>{{ $ticket->stok }}</td>
                                                <td>
                                                    @auth
                                                        @if(auth()->user()->hasRole('user'))
                                                            <form action="{{ route('login') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    Buy Ticket
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                                                Login to Buy
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                                            Login to Buy
                                                        </a>
                                                    @endauth
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No tickets available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    
                                </table>
                                <a href="{{ route('welcome') }}" class="btn btn-primary mb-3">
                                    <i class="fas fa-arrow-left"></i> Back to Events
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>