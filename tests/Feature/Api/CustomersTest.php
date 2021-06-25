<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class CustomersTest extends TestCase
{
    /**
     * @test
     */
    public function it_return_customers_data_as_json()
    {
        $response = $this->json('get', 'api/customers');

        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    'data' => [],
                ]
            );
    }
}
