<?php

namespace Tests\Feature\AdminPanel;

use Tests\TestCase;

class CustomersTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_view_customers()
    {
        $response = $this->get('/customers');

        $response->assertStatus(200);
    }
}
