<?php

namespace App\Queries;

use App\Models\Room;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoomQuery extends QueryBuilder
{
    public function __construct()
    {
        $query = Room::query()->with('type', 'images');

        parent::__construct($query);

        $this->allowedSorts(['id', 'price']);

        $this->allowedIncludes([
            'types', 'months'
        ]);

        $this->allowedFilters([

            AllowedFilter::scope('place_in_month'),
            AllowedFilter::exact('id'),
            AllowedFilter::exact('price'),
            AllowedFilter::exact('type_id'),
        ]);

        $this->defaultSort('id');

    }


}
