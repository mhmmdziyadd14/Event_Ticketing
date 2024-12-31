<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre_Event;
use App\Models\Event; // Pastikan Anda mengimpor model Event
use App\Models\Genre; // Pastikan Anda mengimpor model Genre
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\genre_event>
 */
class genre_eventFactory extends Factory
{
    protected $model = Genre_Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id' => Event::factory(), // Menggunakan factory untuk membuat event
            'genre_id' => Genre::factory(), // Menggunakan factory untuk membuat genre
        ];
    }
}
