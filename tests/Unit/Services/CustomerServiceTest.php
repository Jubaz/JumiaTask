<?php

namespace Tests\Unit\Services;

use App\Models\Customer;
use App\Services\CustomerService;
use Tests\TestCase;

class CustomerServiceTest extends TestCase
{
    private $customerService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customerService = app()->make(CustomerService::class);
    }

    /**
     * @test
     */
    public function it_can_get_all_customers()
    {
        Customer::factory()->count(5)->create();

        $customers = $this->customerService->getCustomers();

        $this->assertEquals(5, $customers->count());
    }

    /**
     * @test
     */
    public function it_can_filter_customers_by_country()
    {
        Customer::factory()->create(
            [
                "name" => "Name For Testing",
                "phone" => "(212) 6007989253" //Morocco
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(256) 704244430" //Uganda
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(258) 847651504" //Mozambique
            ]
        );

        $customers = $this->customerService->getCustomersWithFilters(["country" => "morocco"]);

        $this->assertEquals(1, $customers->count());

        $this->assertTrue($customers->contains('name', 'Name For Testing'));
    }

    /**
     * @test
     */
    public function it_can_filter_by_valid_phones()
    {
        Customer::factory()->create(
            [
                "phone" => "(256) 775069443" //valid Phone
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(256) 7503O6263" // not Valid Phone
            ]
        );

        $customers = $this->customerService->getCustomersWithFilters(["phoneState" => "true"]);

        $this->assertEquals(1, $customers->count());

        $this->assertTrue($customers->contains('phone', '(256) 775069443'));
    }

    /**
     * @test
     */
    public function it_can_filter_by_not_valid_phones()
    {
        Customer::factory()->create(
            [
                "phone" => "(256) 775069443" //valid Phone
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(256) 7503O6263" // not Valid Phone
            ]
        );

        $customers = $this->customerService->getCustomersWithFilters(["phoneState" => "false"]);

        $this->assertEquals(1, $customers->count());

        $this->assertTrue($customers->contains('phone', '(256) 7503O6263'));
    }

    /**
     * @test
     */
    public function it_can_get_all_customers_in_case_of_empty_filters_sent()
    {
        Customer::factory()->create(
            [
                "phone" => "(256) 775069443" //valid Phone
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(256) 7503O6263" // not Valid Phone
            ]
        );

        $customers = $this->customerService->getCustomersWithFilters([]);

        $this->assertEquals(2, $customers->count());
    }

    /**
     * @test
     */
    public function it_can_get_all_customers_in_case_of_wrong_filter_sent()
    {
        Customer::factory()->create(
            [
                "phone" => "(256) 775069443" //valid Phone
            ]
        );

        Customer::factory()->create(
            [
                "phone" => "(256) 7503O6263" // not Valid Phone
            ]
        );

        $customers = $this->customerService->getCustomersWithFilters(['fakeFilter' => true]);

        $this->assertEquals(2, $customers->count());
    }
}
