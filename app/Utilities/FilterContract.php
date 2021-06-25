<?php

namespace App\Utilities;


use Illuminate\Support\Collection;

interface FilterContract
{
    public function apply(Collection $collection,string $value = ''): Collection;
}
