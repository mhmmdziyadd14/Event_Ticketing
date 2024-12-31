<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Detail_Transaksi;
use App\Models\Ticket; // Pastikan Anda mengimpor model Ticket
use App\Models\Transaksi; // Pastikan Anda mengimpor model Transaksi

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail_Transaksi>
 */
class Detail_TransaksiFactory extends Factory
{
    protected $model = Detail_Transaksi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Ambil tiket secara acak atau buat baru
        $ticket = Ticket::inRandomOrder()->first() ?? Ticket::factory()->create();

        // Tentukan quantity dan hitung subtotal
        $quantity = $this->faker->numberBetween(1, 5);
        $subtotal = $ticket->price * $quantity;
        return [
            'tiket_id' => $ticket->id, 
            'transaksi_id' => Transaksi::inRandomOrder()->first()->id ?? Transaksi::factory(), 
            'quantity' => $quantity, 
            'subtotal' => $subtotal, 
        ];
    }
}
