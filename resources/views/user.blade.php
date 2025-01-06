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
    <div class="container mx-auto px-4 py-6">

        <div class="grid grid-cols-5 gap-4">
            <!-- Cart Section -->
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1 card-hd rounded-lg shadow-md p-4 flex flex-col">
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Your Cart</h5>
                    <div id="cart-items" class="space-y-2 text-center text-gray-500 dark:text-gray-400">
                        <p>Your cart is empty</p>
                    </div>
                    <div class="mt-4 border-t pt-4">
                        <div class="flex justify-between mb-4">
                            <strong class="text-gray-700 dark:text-gray-300">Total</strong>
                            <strong id="cart-total" class="text-gray-900 dark:text-gray-100">IDR 0</strong>
                        </div>
                        <button id="checkout-btn" disabled
                            class="w-full px-4 py-2 web-bg text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                            Check Out
                        </button>
                    </div>
                </div>
                <div class="col-span-1 card-hd rounded-lg shadow-md p-4 flex flex-col">
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Transaction History</h5>
                    @if ($transactions->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">No transactions found.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="web-bg">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Transaction ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Event</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white web-bg divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $transaction->id }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $transaction->event->nama }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            IDR
                                            {{ number_format($transaction->grand_total, 0) }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ ucfirst($transaction->status) }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $transaction->created_at->format('d M Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <!-- Events and Tickets Section -->
            <div class="col-span-4 card-hd rounded-lg shadow-md p-4">
                <!-- Search and Filter -->
                <form class="mb-6 flex space-x-2" method="GET" action="{{ route('user') }}">
                    <input type="search" name="search" placeholder="Search Event" value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 web-bg text-gray-900 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <select name="venue_id"
                        class="rounded-md border border-gray-300 dark:border-gray-600 web-bg text-gray-900 dark:text-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option value="">All Venues</option>
                        @foreach ($venues as $venue)
                            <option value="{{ $venue->id }}"
                                {{ request('venue_id') == $venue->id ? 'selected' : '' }}>
                                {{ $venue->nama }}
                            </option>
                        @endforeach
                    </select>
                    <select name="artist_id"
                        class="rounded-md border border-gray-300 dark:border-gray-600 web-bg text-gray-900 dark:text-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option value="">All Artists</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}"
                                {{ request('artist_id') == $artist->id ? 'selected' : '' }}>{{ $artist->nama }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="px-4 py-2 web-bg text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600">
                        Search
                    </button>
                    <a href="{{ route('user') }}"
                        class="px-4 py-2 web-bg text-gray-800 dark:text-gray-300 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">
                        Reset
                    </a>
                </form>

                <!-- Filter Indicators -->
                <div class="mb-4 flex space-x-2">
                    @if (request('venue_id'))
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            Venue: {{ $venues->firstWhere('id', request('venue_id'))->nama }}
                            <a href="{{ route('user', array_diff_key(request()->all(), ['venue_id' => ''])) }}"
                                class="ml-1">✕</a>
                        </span>
                    @endif
                    @if (request('artist_id'))
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            Artist: {{ $artists->firstWhere('id', request('artist_id'))->nama }}
                            <a href="{{ route('user', array_diff_key(request()->all(), ['artist_id' => ''])) }}"
                                class="ml-1">✕</a>
                        </span>
                    @endif
                    @if (request('search'))
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            Search: {{ request('search') }}
                            <a href="{{ route('user', array_diff_key(request()->all(), ['search' => ''])) }}"
                                class="ml-1">✕</a>
                        </span>
                    @endif
                </div>

                <!-- Events Grid -->
                <div class="grid grid-cols-3 gap-4">
                    @forelse($events as $event)
                        <div class="bg-white mt-3 web-bg rounded-lg shadow-md overflow-hidden event-card"
                            data-event-id="{{ $event->id }}">
                            @if ($event->foto)
                                <div class="w-full h-48 flex items-center justify-center overflow-hidden">
                                    <img src="{{ Storage::url($event->foto) }}" alt="{{ $event->nama }}"
                                        class="w-full h-full object-cover object-center"
                                        style="max-height: 400px; object-fit: cover;">
                                </div>
                            @else
                                <div class="w-full h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                    <span class="text-gray-500 dark:text-gray-400">No Image</span>
                                </div>
                            @endif

                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $event->nama }}
                                    </h2>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                                    </span>
                                </div>

                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    {{ Str::limit($event->deskripsi, 100) }}
                                </p>

                                <!-- Venue Information -->
                                <div class="mb-4 flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $event->venue->nama }}
                                </div>

                                <!-- Artists -->
                                @if ($event->artists->count() > 0)
                                    <div class="mb-4">
                                        <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Artists:
                                        </h3>
                                        <div class="flex space-x-2">
                                            @foreach ($event->artists as $artist)
                                                <span
                                                    class="inline-block bg-gray-200 dark:bg-gray-600 text-xs px-2 py-1 rounded-full">
                                                    {{ $artist->nama }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Ticket Section -->
                                <div class="space-y-2">
                                    @foreach ($event->tickets as $ticket)
                                        <div class="card-hd rounded-lg p-3 border border-gray-200 dark:border-gray-600
                                            {{ $ticket->stok <= 0 ? 'opacity-50' : '' }}"
                                            data-ticket-type="{{ $ticket->type }}"
                                            data-ticket-status="{{ $ticket->status }}">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h3 class="font-medium text-gray-900 dark:text-gray-100">
                                                        {{ $ticket->nama }} ({{ $ticket->type }})
                                                    </h3>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        IDR {{ number_format($ticket->harga, 0) }}
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        @if ($ticket->stok <= 0)
                                                            <span class="text-red-500">Sold Out</span>
                                                        @else
                                                            {{ $ticket->stok }} tickets available
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    @if ($ticket->stok > 0)
                                                        <button
                                                            class="decrease-ticket web-bg text-gray-700 dark:text-gray-300 rounded-md px-2 py-1
                                                            {{ $ticket->stok <= 0 ? 'cursor-not-allowed opacity-50' : '' }}"
                                                            data-ticket-id="{{ $ticket->id }}"
                                                            data-event-id="{{ $event->id }}"
                                                            {{ $ticket->stok <= 0 ? 'disabled' : '' }}>-</button>
                                                        <span class="ticket-quantity ms-1 me-1 text-gray-800 dark:text-gray-200"
                                                            data-ticket-id="{{ $ticket->id }}">0</span>
                                                        <button
                                                            class="increase-ticket web-bg text-gray-700 dark:text-gray-300 rounded-md px-2 py-1
                                                            {{ $ticket->stok <= 0 ? 'cursor-not-allowed opacity-50' : '' }}"
                                                            data-ticket-id="{{ $ticket->id }}"
                                                            data-event-id="{{ $event->id }}"
                                                            data-ticket-price="{{ $ticket->harga }}"
                                                            data-ticket-name="{{ $ticket->nama }}"
                                                            data-ticket-stock="{{ $ticket->stok }}"
                                                            {{ $ticket->stok <= 0 ? 'disabled' : '' }}>+</button>
                                                    @else
                                                        <span class="text-red-500 text-sm">Sold Out</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 bg-gray-100 dark:bg-gray-800 rounded-lg p-6 text-center">
                            <p class="text-gray-600 dark:text-gray-400">No events are currently available.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-6 ">
                    {{ $events->appends(request()->query())->links() }}
                </div>
            </div>
            
        </div>


        <div id="transaction-success-modal"
            class="fixed inset-0 z-50 hidden items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
            <div class="relative w-auto max-w-lg mx-auto my-6">
                <div
                    class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none dark:bg-gray-800">
                    <!-- Modal Header -->
                    <div
                        class="flex items-center justify-between p-5 border-b border-solid rounded-t border-blueGray-200 dark:border-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Transaction Successful
                        </h3>
                        <button id="close-transaction-modal"
                            class="float-right p-1 ml-auto text-3xl font-semibold leading-none text-gray-500 bg-transparent border-0 outline-none opacity-5 focus:outline-none">
                            <span class="block w-6 h-6 text-2xl text-gray-500 opacity-5 dark:text-white">
                                ×
                            </span>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="relative flex-auto p-6">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 mb-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-lg text-gray-700 dark:text-gray-300 mb-4 text-center">
                                Your transaction has been completed successfully!
                            </p>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Transaction ID:</span>
                                    <span id="transaction-id-display"
                                        class="font-bold text-gray-900 dark:text-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div
                        class="flex items-center justify-center p-6 border-t border-solid rounded-b border-blueGray-200 dark:border-gray-700">
                        <button id="close-transaction-modal-btn"
                            class="px-6 py-2 text-sm font-bold text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Overlay for modal -->
    <div id="transaction-modal-overlay" class="fixed inset-0 z-40 hidden bg-black opacity-25"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cart = {
                items: {},
                eventId: null,

                addItem(ticketId, eventId, name, price, stock) {
                    // Prevent adding tickets from different events
                    if (!this.eventId) {
                        this.eventId = eventId;
                    } else if (this.eventId !== eventId) {
                        this.showErrorModal('You can only purchase tickets for one event at a time.');
                        return;
                    }

                    // Add or update ticket in cart
                    if (!this.items[ticketId]) {
                        this.items[ticketId] = {
                            name,
                            price,
                            quantity: 1,
                            stock: stock,
                            eventId: eventId
                        };
                    } else {
                        // Check stock before increasing quantity
                        if (this.items[ticketId].quantity < stock) {
                            this.items[ticketId].quantity++;
                        } else {
                            this.showErrorModal(`Maximum available tickets: ${stock}`);
                        }
                    }
                    this.updateCart();
                },

                removeItem(ticketId) {
                    if (this.items[ticketId]) {
                        this.items[ticketId].quantity--;

                        // Remove item if quantity becomes 0
                        if (this.items[ticketId].quantity <= 0) {
                            delete this.items[ticketId];
                        }
                    }
                    this.updateCart();
                },

                updateCart() {
                    // Calculate total price
                    const total = Object.values(this.items).reduce((sum, item) =>
                        sum + (item.price * item.quantity), 0);

                    // Get cart elements
                    const cartItemsEl = document.getElementById('cart-items');
                    const cartTotalEl = document.getElementById('cart-total');
                    const checkoutBtn = document.getElementById('checkout-btn');

                    // Validate elements exist
                    if (!cartItemsEl || !cartTotalEl || !checkoutBtn) {
                        console.error('Cart elements not found');
                        return;
                    }

                    // Clear previous cart items
                    cartItemsEl.innerHTML = '';

                    // Handle empty cart
                    if (Object.keys(this.items).length === 0) {
                        cartItemsEl.innerHTML = '<p>Your cart is empty</p>';
                        checkoutBtn.disabled = true;
                        this.eventId = null;
                    } else {
                        checkoutBtn.disabled = false;

                        // Render cart items
                        Object.entries(this.items).forEach(([ticketId, item]) => {
                            const itemEl = document.createElement('div');
                            itemEl.className = 'cart-item flex justify-between';
                            itemEl.innerHTML = `
                                    <span>${item.name}</span>
                                    <span>IDR ${item.price.toLocaleString()} x ${item.quantity}</span>
                                `;
                            cartItemsEl.appendChild(itemEl);
                        });
                    }

                    // Update total price display
                    cartTotalEl.innerText = `IDR ${total.toLocaleString()}`;
                },

                checkout() {
                    // Validate cart is not empty
                    if (Object.keys(this.items).length === 0) {
                        this.showErrorModal('Your cart is empty');
                        return;
                    }

                    // Ensure event ID is set
                    if (!this.eventId) {
                        this.showErrorModal('Please select tickets for an event first.');
                        return;
                    }

                    // Prepare tickets for checkout
                    const tickets = Object.entries(this.items).map(([ticketId, item]) => ({
                        id: ticketId,
                        quantity: item.quantity
                    }));

                    // Disable checkout button during transaction
                    const checkoutBtn = document.getElementById('checkout-btn');
                    checkoutBtn.disabled = true;
                    checkoutBtn.textContent = 'Processing...';

                    // Get CSRF token from the meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                        'content');

                    // Perform checkout
                    fetch('{{ route('transactions.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': csrfToken || ''
                            },
                            credentials: 'same-origin',
                            body: JSON.stringify({
                                event_id: this.eventId,
                                tickets: tickets
                            })
                        })
                        .then(response => {
                            // Log the response status for debugging
                            console.log('Response Status:', response.status);

                            // Check if the response body is empty
                            const contentType = response.headers.get('content-type');
                            if (!contentType || !contentType.includes('application/json')) {
                                throw new Error('Unexpected response type');
                            }

                            // Try to parse JSON, with error handling
                            return response.json().then(data => {
                                if (response.status !== 200 && response.status !== 201) {
                                    // Handle error responses
                                    throw new Error(data.message ||
                                        'An error occurred during the transaction.');
                                }
                                return data;
                            });
                        })
                        .then(data => {
                            // Re-enable checkout button
                            checkoutBtn.disabled = false;
                            checkoutBtn.textContent = 'Checkout';

                            if (data.status === 'success') {
                                // Show success modal
                                this.showTransactionSuccessModal(data.transaction_id);

                                // Clear cart
                                this.items = {};
                                this.eventId = null;
                                this.updateCart();
                            } else {
                                // Show error modal
                                this.showErrorModal(data.error || 'Transaction failed');
                            }
                        })
                        .catch(error => {
                            console.error('Checkout Error:', error);

                            // Re-enable checkout button
                            checkoutBtn.disabled = false;
                            checkoutBtn.textContent = 'Checkout';

                            // More detailed error handling
                            this.showErrorModal(error.message || 'Transaction failed');
                        });
                },

                showTransactionSuccessModal(transactionId) {
                    const modal = document.getElementById('transaction-success-modal');
                    const overlay = document.getElementById('transaction-modal-overlay');
                    const transactionIdDisplay = document.getElementById('transaction-id-display');

                    // Set transaction ID
                    transactionIdDisplay.textContent = transactionId;

                    // Show modal and overlay
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    overlay.classList.remove('hidden');
                },

                hideTransactionSuccessModal() {
                    const modal = document.getElementById('transaction-success-modal');
                    const overlay = document.getElementById('transaction-modal-overlay');

                    // Hide modal and overlay
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    overlay.classList.add('hidden');
                },

                showErrorModal(message) {
                    const errorModal = document.createElement('div');
                    errorModal.innerHTML = `
                            <div class="fixed inset-0 z-50 flex items-center justify-center">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 max-w-sm w-full">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 mb-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-4 text-center">${message}</p>
                                        <button id="close-error-modal" class="px-6 py-2 text-sm font-bold text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                    document.body.appendChild(errorModal);

                    const closeErrorModal = errorModal.querySelector('#close-error-modal');
                    closeErrorModal.addEventListener('click', () => {
                        document.body.removeChild(errorModal);
                    });
                }
            };

            // Unified Event Listener
            document.addEventListener('click', function(event) {
                const target = event.target;

                // Increase Ticket Quantity
                if (target.classList.contains('increase-ticket')) {
                    const ticketId = target.dataset.ticketId;
                    const eventId = target.dataset.eventId;
                    const ticketName = target.dataset.ticketName;
                    const ticketPrice = parseFloat(target.dataset.ticketPrice);
                    const ticketStock = parseInt(target.dataset.ticketStock);

                    if (!eventId) {
                        alert('Unable to determine event. Please try again.');
                        return;
                    }
                    cart.addItem(ticketId, eventId, ticketName, ticketPrice, ticketStock);
                    updateTicketDisplay(ticketId);
                }

                // Decrease Ticket Quantity
                if (target.classList.contains('decrease-ticket')) {
                    const ticketId = target.dataset.ticketId;
                    cart.removeItem(ticketId);
                    updateTicketDisplay(ticketId);
                }

                // Checkout Button
                if (target.id === 'checkout-btn') {
                    cart.checkout();
                }

                // Close Transaction Modal (X button)
                if (target.id === 'close-transaction-modal' || target.closest('#close-transaction-modal')) {
                    cart.hideTransactionSuccessModal();
                }

                // Close Transaction Modal (Close button)
                if (target.id === 'close-transaction-modal-btn') {
                    cart.hideTransactionSuccessModal();
                }

            });


            function updateTicketDisplay(ticketId) {
                const quantityEl = document.querySelector(`.ticket-quantity[data-ticket-id="${ticketId}"]`);
                if (quantityEl) {
                    const currentTicket = cart.items[ticketId];
                    quantityEl.textContent = currentTicket ? currentTicket.quantity : 0;
                }
            }

        });
    </script>
</x-app-layout>
