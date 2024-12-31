<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::role('user')->inRandomOrder()->first()->id ?? User::factory(),
            'event_id' => Event::inRandomOrder()->first()->id ?? Event::factory(),
            'grand_total' => $this->faker->randomFloat(2, 50, 500), // Total lebih realistis
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed', 'cancelled']),
            'cancellation_reason' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
