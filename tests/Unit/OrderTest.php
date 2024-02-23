<?php

namespace Tests\Unit;

use App\Models\Orders;
use App\Models\Users;

use Tests\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function it_belongs_to_a_user()
    {
        $order = Orders::factory()->create();
        $this->assertInstanceOf(Users::class, $order->user);
    }
}
