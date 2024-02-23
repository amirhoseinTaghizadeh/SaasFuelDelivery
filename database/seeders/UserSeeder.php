<?php

namespace Database\Seeders;

use App\Models\Users as User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $superAdmin =  User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('12345678'),
            'company_id' => 1,
            'role_id' => 1,
        ]);

       $admin1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234567'),
            'company_id' => 1,
            'role_id' => 2,
        ]);

      $user1 =  User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('123456'),
            'company_id' => 1,
            'role_id' => 3,
        ]);
       $admin2 = User::create([
            'name' => 'Admin2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('1234567'),
            'company_id' => 2,
            'role_id' => 2,
        ]);

       $user2 = User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => bcrypt('123456'),
            'company_id' => 2,
            'role_id' => 3,
        ]);

        $superAdmin->assignRole('super-admin');
        $admin1->assignRole('admin');
        $user1->assignRole('user');
        $admin2->assignRole('admin');
        $user2->assignRole('user');
    }
}
