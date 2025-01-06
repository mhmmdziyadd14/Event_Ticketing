<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->nama }} - Event Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .card {
            background-color: #1E1E1E;
            border: 1px solid #333;
            color: #e0e0e0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        .card-body {
            background-color: #2C2C2C;
        }
        .event-image {
            max-height: 500px;
            object-fit: cover;
            width: 100%;
            filter: brightness(0.8);
        }
        
        /* Enhanced Dark Table Styling */
        .table-dark {
            --bs-table-bg: #2C2C2C;
            --bs-table-color: #e0e0e0;
            --bs-table-border-color: #444;
        }
        .table-dark thead {
            background-color: #1E1E1E;
            color: #fff;
        }
        .table-dark tbody tr {
            background-color: #2C2C2C;
            border-bottom: 1px solid #444;
            transition: background-color 0.3s ease;
        }
        .table-dark tbody tr:hover {
            background-color: #3C3C3C;
        }
        .table-dark td, .table-dark th {
            border-color: #444;
            padding: 12px;
        }
        
        /* Ticket Type Badges */
        .badge-ticket {
            font-size: 0.9em;
            padding: 5px 10px;
        }
        .badge-reguler { background-color: #3F51B5; }
        .badge-vip { background-color: #FF9800; }
        .badge-vvip { background-color: #4CAF50; }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                    -ms-flex-direction: column;
                        flex-direction: column;
                margin-bottom: 1rem;
                border: 1px solid #444;
            }
            .table-responsive-stack td {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card mb-3 shadow-lg">
            <img src="{{ $event->foto ? asset('storage/' . $event->foto) : 'https://via.placeholder.com/1200x600.png?text=Event+Image' }}" 
                 class="card-img-top event-image" alt="{{ $event->nama }}">
            
            <div class="card-body text-center">
                <h1 class="card-title text-light mb-4">{{ $event->nama }}</h1>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong class="text-light">
                            <i class="fas fa-map-marker-alt text-info me-2"></i>Venue
                        </strong> 
                        <p class="">{{ optional($event->venue)->nama ?? 'Venue Not Specified' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong class="text-light">
                            <i class="fas fa-calendar text-info me-2"></i>Date
                        </strong>
                        <p class="">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong class="text-light">
                            <i class="fas fa-clock text-info me-2"></i>Time
                        </strong>
                        <p class="">{{ \Carbon\Carbon::parse($event->tanggal)->format('H:i A') }}</p>
                    </div>
                </div>

                <p class="card-text ">{{ $event->deskripsi ?? 'No description available' }}</p>

                <div class="mb-4">
                    <h4 class="text-light mb-3">Artists</h4>
                    @if($event->artists && $event->artists->count() > 0)
                        <div class="d-flex justify-content-center gap-3">
                            @foreach($event->artists as $artist)
                                <span class="badge bg-secondary">{{ $artist->nama }}</span>
                            @endforeach
                        </div>
                    @else
                        <p class="">No artists specified</p>
                    @endif
                </div>

                <div class="row mt-4">
                    <div class="col-md-10 offset-md-1">
                        <div class="card">
                            <div class="card-body  shadow-lg">
                                <h5 class="card-title text-light mb-4 ">Ticket Options</h5>
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped">
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
                                                    <td>
                                                        <span class="badge badge-ticket bg-secondary badge-{{ strtolower($ticket->type) }}">
                                                            {{ ucfirst($ticket->type) }}
                                                        </span>
                                                    </td>
                                                    <td>Rp {{ number_format($ticket->harga, 0, ',', '.') }}</td>
                                                    <td>
                                                        <span class="badge bg-secondary">
                                                            {{ $ticket->stok }} Tickets
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @auth
                                                            @if(auth()->user()->hasRole('user'))
                                                                <form action="{{ route('login') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                                    <button type="submit" class="btn btn-secondary btn-sm">
                                                                        Buy Ticket
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">
                                                                    Login to Buy
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">
                                                 Login to Buy
                                                            </a>
                                                        @endauth
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center ">No tickets available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Events
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