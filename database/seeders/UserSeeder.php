<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Transaksi;
use App\Models\Detail_Transaksi;
use App\Models\Ticket; // Impor model Ticket
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        // Daftar peran yang akan dibuat
        $roleDistribution = [
            'admin' => 1,
            'organizer' => 5,
            'user' => 5
        ];

        // Buat pengguna untuk setiap peran
        foreach ($roleDistribution as $role => $count) {
            // Pengguna admin dibuat secara manual
            if ($role === 'admin') {
                $admin = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@example.com',
                    'password' => bcrypt('password')
                ]);
                $admin->assignRole($role);
            } else {
                // Pengguna lain dibuat menggunakan factory
                User::factory()->count($count)->create()->each(function ($user) use ($role) {
                    $user->assignRole($role);
                });
            }
        }
    }
}