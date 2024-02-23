<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trucks>
 */
class TruckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => $this->faker->unique()->regexify('[A-Z0-9]{7}'),
            'driver_info' => $this->faker->name,
            'capacity' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
        ];
    }
}
