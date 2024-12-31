<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\event;
use App\Models\Ticket;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ticket>
 */
class ticketFactory extends Factory
{
    protected $model = Ticket::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition()
     {
         return [
             'nama' => $this->faker->word, // Nama tiket
             'harga' => $this->faker->randomFloat(2, 10, 1000), // Harga tiket acak
             'event_id' => Event::factory(), 
             'stok' => $this->faker->randomNumber(2, 10,), // Stok
             'type' => $this->faker->randomElement(['reguler','vip','vvip']),
             'status' => $this->faker->randomElement(['tersedia', 'habis']),
            ];
     }
}
