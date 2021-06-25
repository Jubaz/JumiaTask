<?php

namespace App\Constants;

use App\Filters\Customer\Country;
use App\Filters\Customer\PhoneState;

final class CustomerFilters
{
    const FILTERS = [
        'Country',
        'PhoneState'
    ];

    const filterClass = [
        'Country' => Country::class,
        'PhoneState' => PhoneState::class
    ];

    public static function getFilterClass(string $filter)
    {
        return self::filterClass[$filter];
    }
}
