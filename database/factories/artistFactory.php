<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artist>
 */
class artistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' =>  fake()->name(), // Nama genre
            'deskripsi' => $this->faker->realText($maxNbChars = 200, $indexSize = 2), // Deskripsi genre
        ];
    }
}
