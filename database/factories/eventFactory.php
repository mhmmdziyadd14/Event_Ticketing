<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\User;
use App\Models\Venue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class eventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->sentence,
            'deskripsi' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'tanggal' => $this->faker->dateTimeBetween('now', '+1 year'),
            'organizer_id' => User::factory(), // Menggunakan factory untuk membuat organizer
            'venue_id' => Venue::factory(), // Menggunakan factory untuk membuat venue
        ];
    }
}
