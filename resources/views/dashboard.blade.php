<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Selamat datang, {{ Auth::user()->name }}!</p>

                    <!-- Admin Section -->
                    @if(Auth::user()->hasRole('admin'))
                        <h3 class="mt-6 text-lg font-bold text-gray-800 dark:text-gray-100">Admin Panel</h3>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li><a href="/manage-users" class="text-blue-500 hover:underline">Kelola Pengguna</a></li>
                            <li><a href="/manage-events" class="text-blue-500 hover:underline">Kelola Event</a></li>
                            <li><a href="/manage-tickets" class="text-blue-500 hover:underline">Kelola Tiket</a></li>
                            <li><a href="/manage-venues" class="text-blue-500 hover:underline">Kelola Venue</a></li>
                            <li><a href="/manage-genres" class="text-blue-500 hover:underline">Kelola Genre</a></li>
                            <li><a href="/view-transactions" class="text-blue-500 hover:underline">Lihat Transaksi</a></li>
                        </ul>
                    @endif

                    <!-- Organizer Section -->
                    @if(Auth::user()->hasRole('organizer'))
                        <h3 class="mt-6 text-lg font-bold text-gray-800 dark:text-gray-100">Organizer Panel</h3>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li><a href="/manage-my-events" class="text-blue-500 hover:underline">Kelola Event Saya</a></li>
                            <li><a href="/create-ticket" class="text-blue-500 hover:underline">Buat Tiket Baru</a></li>
                            <li><a href="/manage-my-tickets" class="text-blue-500 hover:underline">Kelola Tiket Saya</a></li>
                            <li><a href="/view-my-transactions" class="text-blue-500 hover:underline">Lihat Transaksi</a></li>
                        </ul>
                    @endif

                    <!-- User Section -->
                    @if(Auth::user()->hasRole('user'))
                        <h3 class="mt-6 text-lg font-bold text-gray-800 dark:text-gray-100">User Panel</h3>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                            <li><a href="/view-events" class="text-blue-500 hover:underline">Lihat Event</a></li>
                            <li><a href="/buy-tickets" class="text-blue-500 hover:underline">Beli Tiket</a></li>
                            <li><a href="/view-my-transactions" class="text-blue-500 hover:underline">Lihat Transaksi Saya</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
