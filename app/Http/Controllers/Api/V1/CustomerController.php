<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends ApiBaseController
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $customers = $this->customerService->getCustomersWithFilters($request->all());

        return $this->respondWithData($customers);
    }
}
