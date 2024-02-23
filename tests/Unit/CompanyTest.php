<?php

namespace Tests\Unit;

use App\Models\Companies;
use App\Models\Users;

use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function it_has_many_users()
    {
        $company = Companies::factory()->create();
        Users::factory(3)->create(['company_id' => $company->id]);
        $this->assertCount(3, $company->users);
    }
}
