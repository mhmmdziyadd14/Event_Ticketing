<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        //
        $admin = User::create([
            'name' => 'Admin',  
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $EoAdmin = User::create([
            'name' => 'EoAdmin',  
            'email' => 'EoAdmin@example.com',
            'password' => bcrypt('password')
        ]);
        $EoAdmin->assignRole('eoAdmin');
    }
}
