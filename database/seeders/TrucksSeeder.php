<?php

namespace Database\Seeders;

use App\Models\Trucks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrucksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trucks::factory()->count(10)->create();
    }
}
