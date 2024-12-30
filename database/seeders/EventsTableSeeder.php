<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'Concert of the Year',
                'description' => 'A spectacular concert featuring top artists.',
                'Tanggal Event' => '2023-12-01', // Use the correct date format
                'organizer_id' => 1, // Assuming you have an organizer with ID 1
                'venue_id' => 1, // Assuming you have a venue with ID 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tech Conference 2023',
                'description' => 'An annual conference for tech enthusiasts.',
                'Tanggal Event' => '2023-11-15',
                'organizer_id' => 2, // Assuming you have an organizer with ID 2
                'venue_id' => 2, // Assuming you have a venue with ID 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more events as needed
        ]);
    }
}