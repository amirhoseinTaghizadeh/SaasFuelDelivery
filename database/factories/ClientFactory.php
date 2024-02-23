<?php

namespace Database\Factories;

use App\Models\Clients;
use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientFactory extends Factory
{
    protected $model = Clients::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyID  = DB::table('companies')->inRandomOrder()->value('id');
        return [
            'name'          => $this->faker->name,
            'address'       => $this->faker->address,
            'client_info'   => [
                'phone_number' => $this->faker->phoneNumber,
                'email'        => $this->faker->safeEmail,
                'website'      => $this->faker->url,
                'address'      => $this->faker->address
            ],
            'company_id'    => $companyID
        ];
    }


}
