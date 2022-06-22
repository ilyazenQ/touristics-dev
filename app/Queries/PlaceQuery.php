<?php

namespace App\Queries;

use App\Models\Place;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PlaceQuery extends QueryBuilder
{
    public function __construct()
    {

        $query = Place::query()->with('type','location', 'images');
//        dd($query);
        parent::__construct($query);

        $this->allowedSorts(['id', 'price']);

        $this->allowedIncludes([
            'types', 'months','locations',
        ]);

        $this->allowedFilters([

            AllowedFilter::scope('place_in_month'),
            AllowedFilter::exact('id'),
            AllowedFilter::exact('price'),
            AllowedFilter::exact('type_id'),
            AllowedFilter::exact('location_id'),
            AllowedFilter::exact('stars'),
            AllowedFilter::exact('rating'),
        ]);

        $this->defaultSort('id');
    }


}
