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
        Permission::Create(['name' => 'add-users']);
        Permission::Create(['name' => 'edit-users']);
        Permission::Create(['name' => 'delete-users']);
        Permission::Create(['name' => 'view-users']);
    
        Permission::Create(['name' => 'add-event']);
        Permission::Create(['name' => 'edit-event']);
        Permission::Create(['name' => 'delete-event']);
        Permission::Create(['name' => 'view-event']);
    
        $roleAdmin = Role::Create(['name' => 'admin']);
        $roleEoAdmin = Role::Create(['name' => 'eoAdmin']);
        $roleUser  = Role::Create(['name' => 'user']);
    
        $roleAdmin->givePermissionTo(['add-users', 'edit-users', 'delete-users', 'view-users']);
        $roleEoAdmin->givePermissionTo(['add-event', 'edit-event', 'delete-event', 'view-event']);
    }
}
