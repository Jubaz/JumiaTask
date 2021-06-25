<?php

namespace App\Filters\Customer;

use App\Utilities\FilterContract;
use Illuminate\Support\Collection;

class PhoneState implements FilterContract
{

    public function apply(Collection $collection, string $value = ""): Collection
    {
        return $collection->filter(
            function ($item) use ($value) {
                return $item->phone_state == filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }
        );
    }
}
