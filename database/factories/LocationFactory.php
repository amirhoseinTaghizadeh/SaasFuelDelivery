<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locations>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lat' => $this->faker->latitude,
            'long' => $this->faker->longitude,
            'order_id' => \App\Models\Orders::inRandomOrder()->first()->id,
        ];
    }
}
