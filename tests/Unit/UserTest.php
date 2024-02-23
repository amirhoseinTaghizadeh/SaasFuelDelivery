<?php

namespace Tests\Unit;

use App\Models\Companies;
use Tests\TestCase;
use App\Models\Users as User;
use App\Models\Orders as Order;



class UserTest extends TestCase
{
    /** @test */
    public function it_belongs_to_a_company()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(Companies::class, $user->company);
    }

    /** @test */
    public function it_has_many_orders()
    {
        $user = User::factory()->create();
        Order::factory()->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Order::class, $user->orders->first());
    }
}
