<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Corrected use statement

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venues')->insert([ // Corrected to use DB facade
            [
                'name' => 'Stadion Gelora Bung Karno',
                'alamat' => 'Jl. Pintu Satu Senayan, Jakarta',
                'link alamat' => 'https://goo.gl/maps/GBK', // Changed space to underscore
                'deskripsi' => 'Stadion terbesar di Indonesia dengan kapasitas 80.000 penonton.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jakarta Convention Center',
                'alamat' => 'Jl. Jend. Gatot Subroto, Jakarta',
                'link alamat' => 'https://goo.gl/maps/JCC', // Changed space to underscore
                'deskripsi' => 'Tempat untuk konferensi dan acara indoor dengan kapasitas besar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}