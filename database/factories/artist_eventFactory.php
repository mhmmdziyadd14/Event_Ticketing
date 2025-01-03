<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event; // Pastikan Anda mengimpor model Event
use App\Models\Artist; // Pastikan Anda mengimpor model artist
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artist_event>
 */
class artist_eventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(), // Menggunakan factory untuk membuat event
            'artist_id' => Artist::factory(), // Menggunakan factory untuk membuat genre
        ];
    }
}
