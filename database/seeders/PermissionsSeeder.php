<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view-orders']);
        Permission::create(['name' => 'create-orders']);
        Permission::create(['name' => 'update-orders']);
        Permission::create(['name' => 'delete-orders']);

        // Permissions related to trucks
        Permission::create(['name' => 'view-trucks']);
        Permission::create(['name' => 'create-trucks']);
        Permission::create(['name' => 'update-trucks']);
        Permission::create(['name' => 'delete-trucks']);

        // Permissions related to companies
        Permission::create(['name' => 'view-companies']);
        Permission::create(['name' => 'create-companies']);
        Permission::create(['name' => 'update-companies']);
        Permission::create(['name' => 'delete-companies']);

        // Permissions related to users
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'update-users']);
        Permission::create(['name' => 'delete-users']);
    }
}
