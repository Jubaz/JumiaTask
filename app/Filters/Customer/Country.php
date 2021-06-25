<?php

namespace App\Filters\Customer;

use App\Utilities\FilterContract;
use Illuminate\Support\Collection;

class Country implements FilterContract
{
    public function apply(Collection $collection, string $value = ''): Collection
    {
        return $collection->filter(
            function ($item) use ($value) {
                return $item->country == ucfirst($value);
            }
        );
    }
}
