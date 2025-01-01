<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        Permission::create(['name' => 'add-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'view-users']);
    
        Permission::create(['name' => 'add-event']);
        Permission::create(['name' => 'edit-event']);
        Permission::create(['name' => 'delete-event']);
        Permission::create(['name' => 'view-event']);

        Permission::create(['name' => 'add-ticket']);
        Permission::create(['name' => 'edit-ticket']);
        Permission::create(['name' => 'delete-ticket']);
        Permission::create(['name' => 'view-ticket']);

        Permission::create(['name' => 'add-venue']);
        Permission::create(['name' => 'edit-venue']);
        Permission::create(['name' => 'delete-venue']);
        Permission::create(['name' => 'view-venue']);

        Permission::create(['name' => 'add-genre']);
        Permission::create(['name' => 'edit-genre']);
        Permission::create(['name' => 'delete-genre']);
        Permission::create(['name' => 'view-genre']);

        Permission::create(['name' => 'add-transaksi']);
        Permission::create(['name' => 'edit-transaksi']);
        Permission::create(['name' => 'delete-transaksi']);
        Permission::create(['name' => 'view-transaksi']);

        // Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleOrganizer = Role::create(['name' => 'organizer']);
        $roleUser = Role::create(['name' => 'user']);

        // Assign Permissions to Roles
        $roleAdmin->givePermissionTo([
            'add-users', 'edit-users', 'delete-users', 'view-users',
            'add-event', 'edit-event', 'delete-event', 'view-event',
            'add-ticket', 'edit-ticket', 'delete-ticket', 'view-ticket',
            'add-venue', 'edit-venue', 'delete-venue', 'view-venue',
            'add-genre', 'edit-genre', 'delete-genre', 'view-genre',
            'add-transaksi', 'edit-transaksi', 'delete-transaksi', 'view-transaksi',
        ]);

        $roleOrganizer->givePermissionTo([
            'add-event', 'edit-event', 'delete-event', 'view-event',
            'add-ticket', 'edit-ticket', 'delete-ticket', 'view-ticket',
        ]);

        $roleUser->givePermissionTo([
            'view-event', 'view-ticket', 'add-transaksi', 'view-transaksi',
        ]);
    }
}
