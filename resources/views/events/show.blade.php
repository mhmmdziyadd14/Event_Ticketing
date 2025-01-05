<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 grid-rows-5 gap-4">
                <!-- Create Event Section -->
                <div class="row-span-2 bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Create Event</h3>
                    <!-- Form or Content for Creating an Event -->
                    <p>Content for creating an event goes here.</p>
                </div>

                <!-- First Event Details -->
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 dark:text-gray-100">Event 1 Details</h4>
                    <p>Details of the first event.</p>
                </div>

                <!-- Conditional Second Event Creation -->
                <div class="col-start-2 row-start-2 bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 dark:text-gray-100">Create Second Event</h4>
                    <p>If there are additional details or options, they go here.</p>
                </div>

                <!-- List of Events -->
                <div class="row-span-2 row-start-3 bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 dark:text-gray-100">List of Events</h4>
                    <!-- List of events goes here -->
                    <p>List all events here.</p>
                </div>

                <!-- First Event Ticket -->
                <div id="ticket-list" class="row-start-3 bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6">
                    <h4 class="font-bold text-gray-800 dark:text-gray-100">Event 1 Ticket 1</h4>
                    <p>Details for the first ticket of the first event.</p>
                </div>
            </div>

            <!-- Buttons to add or undo ticket -->
            <div class="mt-6">
                <button id="add-ticket" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Another Ticket</button>
                <button id="undo-ticket" class="px-4 py-2 bg-red-500 text-white rounded-md">Undo</button>
            </div>
        </div>
    </div>

    <script>
        let ticketCount = 1;
        const ticketList = document.getElementById('ticket-list');
        const undoButton = document.getElementById('undo-ticket');
        const addTicketButton = document.getElementById('add-ticket');

        // Hide undo button initially
        undoButton.style.display = 'none';

        // Add another ticket
        addTicketButton.addEventListener('click', () => {
            ticketCount++;
            const newTicket = document.createElement('div');
            newTicket.className = 'bg-white dark:bg-gray-900 rounded-lg shadow-xl p-6 mt-4';
            newTicket.id = `ticket-${ticketCount}`;
            newTicket.innerHTML = `
                <h4 class="font-bold text-gray-800 dark:text-gray-100">Event 1 Ticket ${ticketCount}</h4>
                <p>Details for ticket ${ticketCount} of the first event.</p>
            `;
            ticketList.appendChild(newTicket);
            undoButton.style.display = 'inline-block';
        });

        // Undo last added ticket
        undoButton.addEventListener('click', () => {
            if (ticketCount > 1) {
                const lastTicket = document.getElementById(`ticket-${ticketCount}`);
                ticketList.removeChild(lastTicket);
                ticketCount--;
                if (ticketCount === 1) {
                    undoButton.style.display = 'none';
                }
            }
        });
    </script>
</x-app-layout>
