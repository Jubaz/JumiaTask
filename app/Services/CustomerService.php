<?php

namespace App\Services;

use App\Constants\CustomerFilters;
use App\Models\Customer;
use App\Utilities\FilterContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CustomerService
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomers()
    {
        return $this->customer->all();
    }

    public function getCustomersWithFilters(?array $filters)
    {
        $customers = $this->getCustomers();

        if (!$filters) {
            return $customers;
        }

        foreach ($filters as $filter => $value) {
            $filter = ucfirst(Str::camel($filter));

            if (!in_array($filter, CustomerFilters::FILTERS)) {
                continue;
            }

            $filterPath = CustomerFilters::getFilterClass($filter);
            $filterClass = new $filterPath;
            $customers = $this->applyFilter($filterClass, $customers, $value);
        }

        return $customers;
    }

    function applyFilter(FilterContract $filter, Collection $collection, $value)
    {
        return $filter->apply($collection, $value);
    }

}
