<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\venue>
 */
class venueFactory extends Factory
{
    protected $model = Venue::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
  

        return [
            'nama' => $this->faker->company, // Nama venue
            'kapasitas' => $this->faker->numberBetween(50, 5000), // Kapasitas acak
            'alamat' => $this->faker->address, // Alamat venue
            'link_alamat' => $this->faker->url, // Link alamat venue
            'deskripsi' => $this->faker->realText($maxNbChars = 200, $indexSize = 2), // Deskripsi venue
        ];
    }
}
