<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    protected $model = Orders::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => \App\Models\Clients::factory()->create()->id,
            'fuel_amount' => $this->faker->randomFloat(2, 1, 100),
            'fuel_type' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Propane']),
            'delivery_deadline' => $this->faker->dateTimeBetween('now', '+7 days'),
            'user_id' => \App\Models\Users::factory()->create()->id,
        ];
    }
}
