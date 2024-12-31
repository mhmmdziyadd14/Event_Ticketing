<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Venue;
use App\Models\Genre;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use App\Models\Genre_Event;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);

        // Buat venue dan genre
        $venues = Venue::factory()->count(3)->create();
        $genres = Genre::factory()->count(5)->create();

        // Buat event oleh organizer
        $organizers = User::role('organizer')->get();
        $events = collect();
        foreach ($organizers as $organizer) {
            $event = Event::factory()->create([
                'venue_id' => $venues->random()->id,
                'organizer_id' => $organizer->id,
            ]);
            $events->push($event);
        }

        // Buat tiket untuk setiap event
        $tickets = collect();
        foreach ($events as $event) {
            $eventTickets = Ticket::factory()->count(2)->create([
                'event_id' => $event->id,
            ]);
            $tickets = $tickets->merge($eventTickets);
        }

        // Buat transaksi untuk user
        $users = User::role('user')->get();
        foreach ($users as $user) {
            // Buat beberapa transaksi per user
            $transactionCount = rand(1, 3);
            for ($i = 0; $i < $transactionCount; $i++) {
                $event = $events->random();
                $ticket = $tickets->where('event_id', $event->id)->random();

                $transaksi = Transaksi::factory()->create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);

                Detail_Transaksi::factory()->create([
                    'transaksi_id' => $transaksi->id,
                    'tiket_id' => $ticket->id,
                ]);
            }
        }

        // Hubungkan genre dengan event
        foreach ($events as $event) {
            $event->genres()->attach($genres->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}