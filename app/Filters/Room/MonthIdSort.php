<?php

namespace App\Filters\Room;
use Illuminate\Database\Eloquent\Builder;


class MonthIdSort implements \Spatie\QueryBuilder\Sorts\Sort
{
    public function __invoke(Builder $query, bool $descending, string $property)
    {
        $direction = $descending ? 'DESC' : 'ASC';

        $query->orderByRaw("LENGTH(`{$property}`) {$direction}");
    }
}

