<x-app-layout>
    <style>
        .web-bg {
            background-color: rgb(14, 1, 17);
            color: white;
        }

        .card-hd {
            background-color: #17001f;
            color: white;
        }
    </style>
    <div class="py-12 web-bg dark:bg-gray-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Create Event Form --}}
                <div class="bg-white card-hd rounded-lg shadow-xl p-6">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Create New Event</h3>

                    <form id="eventForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="event_id" id="event-id-input">
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="nama" :value="__('Event Name')" />
                                <x-text-input id="nama" name="nama" type="text"
                                    class="mt-1 block w-full web-bg  dark:text-gray-300" required />
                            </div>

                            <div class="mt-1">
                                <x-input-label for="deskripsi" :value="__('Description')" />
                                <textarea name="deskripsi" class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" rows="4" required></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="mt-1">
                                    <x-input-label for="tanggal" :value="__('Event Date')" />
                                    <x-text-input type="date" name="tanggal"
                                        class="mt-1 block w-full web-bg dark:text-gray-300" required />
                                </div>
                                <div class="mt-1">
                                    <x-input-label for="venue_id" :value="__('Venue')" />
                                    <select name="venue_id"
                                        class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" required>
                                        @foreach ($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-1">
                                <x-input-label for="foto" :value="__('Event Photo')" />
                                <x-text-input type="file" name="foto"
                                    class="mt-1 block w-full web-bg dark:text-gray-300" accept="image/*" />
                            </div>

                            {{-- Artist Selection --}}
                            <div class="mt-1">
                                <x-input-label for="artists" :value="__('Select Artists')" />
                                <div id="artists-container" class="space-y-2">
                                    <div class="artist-selection-group flex items-center space-x-2 relative"
                                        data-index="0">
                                        <select name="artists[]"
                                            class="mt-1 block w-full artist-select rounded-md web-bg dark:text-gray-300">
                                            <option value="">Select an Artist</option>
                                            @foreach ($artists as $artist)
                                                <option value="{{ $artist->id }}">{{ $artist->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex space-x-2 mt-2">
                                    <button type="button" id="add-artist"
                                        class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Add Artist
                                    </button>
                                    <button type="button" id="remove-artist"
                                        class="bg-red-500 text-white px-4 py-2 rounded">
                                        Remove Artist
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <x-primary-button class="web-bg  ">Create Event</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Ticket Creation Section --}}
                <div class="bg-white card-hd rounded-lg shadow-xl p-6">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Add Tickets</h3>
                    <div id="ticket-container">
                        {{-- Initial ticket field --}}
                        <div class="ticket-item space-y-4 relative" data-index="0">
                            <div>
                                <x-input-label for="ticket_nama[]" :value="__('Ticket Name')" />
                                <x-text-input name="ticket_nama[]" type="text"
                                    class="ticket-name mt-1 block w-full rounded-md web-bg dark:text-gray-300"
                                    required />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="ticket_harga[]" :value="__('Ticket Price')" />
                                <x-text-input name="ticket_harga[]" type="number"
                                    class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" required />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="ticket_stok[]" :value="__('Ticket Stock')" />
                                <x-text-input name="ticket_stok[]" type="number"
                                    class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" required />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="ticket_type[]" :value="__('Ticket Type')" />
                                <select name="ticket_type[]"
                                    class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" required>
                                    <option value="reguler">Regular</option>
                                    <option value="vip">VIP</option>
                                    <option value="vvip">VVIP</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-2 mt-4">
                        <button type="button" id="add-ticket" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Add Ticket
                        </button>
                        <button type="button" id="remove-ticket" class="bg-red-500 text-white px-4 py-2 rounded">
                            Remove Ticket
                        </button>
                    </div>
                </div>

                {{-- Event List Section --}}
                <div class="bg-white card-hd rounded-lg shadow-xl p-6 col-span-1 md:col-span-2 lg:col-span-1">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">My Events</h3>

                    <div class="space-y-4">
                        @forelse ($events as $event)
                            <div class="bg-gray-50 web-bg rounded-lg overflow-hidden flex mt-2"
                                style="max-height: 300px;">
                                <div class="w-24 h-24 flex-shrink-0 overflow-hidden">
                                    <div class="image-container relative w-full h-full rounded-md">
                                        @if ($event->foto)
                                            <img src="{{ url('storage/' . $event->foto) }}" alt="{{ $event->nama }}"
                                                class="w-full h-full object-cover fixed-size-image rounded-md"
                                                style="max-height: 600px; max-width: 600px;">
                                        @else
                                            <div
                                                class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                <span class="text-gray-500 card-bg dark:text-gray-400">No Image</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="p-4 flex-grow">
                                    <h4 class="font-bold text-sm">{{ $event->nama }}</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </p>
                                </div>
                                <div class="flex flex-col justify-center p-2">
                                    {{-- Edit Event Button --}}
                                   

                                    {{-- Delete Event Button --}}
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this event?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 bg-red-500 text-white rounded text-xs w-full">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600 dark:text-gray-400">No events created yet.</p>
                        @endforelse
                    </div>



                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Event Details Modal --}}
    <div id="eventDetailsModal"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6 w-11/12 max-w-4xl max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 id="modalEventName" class="text-2xl font-bold"></h2>
                <button onclick="closeEventModal()" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                {{-- Event Image --}}
                <div>
                    <div class="image-container relative w-full h-64 rounded-md">
                        <img id="modalEventImage" src="" alt="Event Image"
                            class="w-full h-full object-cover rounded-md fixed-size-image">
                    </div>
                </div>

                {{-- Event Details --}}
                <div>
                    <h3 class="text-xl font-semibold mb-4">Event Information</h3>
                    <p><strong>Date:</strong> <span id="modalEventDate"></span></p>
                    <p><strong>Venue:</strong> <span id="modalEventVenue"></span></p>
                    <p><strong>Description:</strong> <span id="modalEventDescription"></span></p>
                </div>
            </div>

            {{-- Artists Section --}}
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-4">Performing Artists</h3>
                <div id="modalEventArtists" class="grid grid-cols-2 md:grid-cols-4 gap-4"></div>
            </div>

            {{-- Tickets Section --}}
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-4">Ticket Types</h3>
                <div id="modalEventTickets" class="space-y-3"></div>
            </div>
        </div>
    </div>
    {{-- Javascript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Artist Management
            const artistsContainer = document.getElementById('artists-container');
            const addArtistButton = document.getElementById('add-artist');
            const removeArtistButton = document.getElementById('remove-artist');
            const MAX_ARTISTS = 5;

            // Artist Remove Logic
            removeArtistButton.addEventListener('click', function() {
                const artistGroups = artistsContainer.querySelectorAll('.artist-selection-group');
                if (artistGroups.length > 1) {
                    artistsContainer.removeChild(artistGroups[artistGroups.length - 1]);
                }
                updateArtistButtons();
            });

            // Artist Add Logic
            addArtistButton.addEventListener('click', function() {
                const currentArtistGroups = artistsContainer.querySelectorAll('.artist-selection-group');

                if (currentArtistGroups.length >= MAX_ARTISTS) {
                    alert(`Maximum of ${MAX_ARTISTS} artists allowed.`);
                    return;
                }

                const newArtistGroup = document.createElement('div');
                newArtistGroup.classList.add('artist-selection-group', 'flex', 'items-center', 'space-x-2',
                    'relative');
                newArtistGroup.innerHTML = `
                    <select name="artists[]" 
                        class="mt-6 block w-full artist-select rounded-md web-bg dark:text-gray-300">
                        <option value="">Select an Artist</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->nama }}</option>
                        @endforeach
                    </select>
                `;

                artistsContainer.appendChild(newArtistGroup);
                updateArtistButtons();
            });

            // Ticket Management
            const ticketContainer = document.getElementById('ticket-container');
            const addTicketButton = document.getElementById('add-ticket');
            const removeTicketButton = document.getElementById('remove-ticket');
            const MAX_TICKETS = 5;

            // Ticket Remove Logic
            removeTicketButton.addEventListener('click', function() {
                const ticketItems = ticketContainer.querySelectorAll('.ticket-item');
                if (ticketItems.length > 1) {
                    ticketContainer.removeChild(ticketItems[ticketItems.length - 1]);
                }
                updateTicketButtons();
            });

            // Ticket Add Logic
            addTicketButton.addEventListener('click', function() {
                const currentTicketItems = ticketContainer.querySelectorAll('.ticket-item');

                if (currentTicketItems.length >= MAX_TICKETS) {
                    alert(`Maximum of ${MAX_TICKETS} tickets allowed.`);
                    return;
                }

                const newTicket = document.createElement('div');
                newTicket.classList.add('ticket-item', 'space-y-4', 'relative');
                newTicket.innerHTML = `
                    <div class="mt-6">
                        <x-input-label for="ticket_nama[]" :value="__('Ticket Name')" />
                        <x-text-input name="ticket_nama[]" type="text" 
                            class="ticket-name mt-1 block w-full rounded-md web-bg dark:text-gray-300" 
                            required />
                    </div>
                    <div>
                        <x-input-label for="ticket_harga[]" :value="__('Ticket Price')" />
                        <x-text-input name="ticket_harga[]" type="number" 
                            class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" 
                            required />
                    </div>
                    <div>
                        <x-input-label for="ticket_stok[]" :value="__('Ticket Stock')" />
                        <x-text-input name="ticket_stok[]" type="number" 
                            class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" 
                            required />
                    </div>
                    <div>
                        <x-input-label for="ticket_type[]" :value="__('Ticket Type')" />
                        <select name="ticket_type[]" 
                            class="mt-1 block w-full rounded-md web-bg dark:text-gray-300" 
                            required>
                            <option value="reguler">Regular</option>
                            <option value="vip">VIP</option>
                            <option value="vvip">VVIP</option>
                        </select>
                    </div>
                `;

                ticketContainer.appendChild(newTicket);
                updateTicketButtons();
            });

            // Update Artist Button Visibility
            function updateArtistButtons() {
                const artistGroups = artistsContainer.querySelectorAll('.artist-selection-group');

                // Hide remove button if only one artist
                removeArtistButton.style.display = artistGroups.length > 1 ? 'inline-block' : 'none';

                // Disable add button if max artists reached
                addArtistButton.disabled = artistGroups.length >= MAX_ARTISTS;
                addArtistButton.classList.toggle('opacity-50', artistGroups.length >= MAX_ARTISTS);
            }

            // Update Ticket Button Visibility
            function updateTicketButtons() {
                const ticketItems = ticketContainer.querySelectorAll('.ticket-item');

                // Hide remove button if only one ticket
                removeTicketButton.style.display = ticketItems.length > 1 ? 'inline-block' : 'none';

                // Disable add button if max tickets reached
                addTicketButton.disabled = ticketItems.length >= MAX_TICKETS;
                addTicketButton.classList.toggle('opacity-50', ticketItems.length >= MAX_TICKETS);
            }

            // Initial setup
            updateArtistButtons();
            updateTicketButtons();
        });
    </script>
    <style>
        .fixed-size-image {
            object-fit: cover;
            object-position: center;
        }

        .remove-artist,
        .remove-ticket {
            cursor: pointer;
            display: block;
        }
    </style>
</x-app-layout>
</svg>
<i class="bi bi-instagram"></i>
</a>
</div>
</footer>

</html>
