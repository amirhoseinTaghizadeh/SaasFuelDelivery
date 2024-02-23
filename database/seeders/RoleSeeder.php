<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $superAdmin = Role::create(['name' => 'super-admin']);
       $admin      = Role::create(['name' => 'admin']);
       $user       = Role::create(['name' => 'user']);

        $superAdmin->syncPermissions(Permission::all());

        // Give all permissions except company permissions to admin
        $admin->syncPermissions(Permission::whereNotIn('name', [
            'view-companies',
            'create-companies',
            'update-companies',
            'delete-companies',
        ])->get());

        // Give create and edit permissions in trucks and orders to user
        $user->givePermissionTo([
            'create-orders',
            'update-orders',
            'create-trucks',
            'update-trucks',
        ]);
    }
}
