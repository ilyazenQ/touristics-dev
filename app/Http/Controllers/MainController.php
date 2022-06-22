<?php

namespace App\Http\Controllers;

use App\Filters\PlaceFilter;
use App\Models\Location;
use App\Models\Month;
use App\Models\Place;
use App\Queries\PlaceQuery;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;


class MainController extends Controller
{
    public function index(Request $request)
    {
        $places = (new PlaceQuery())->paginate()->appends(request()->query());
        $months = Month::where('count', '>', 0)->get();
        $locations = Location::where('count', '>', 0)->get();

        return view('main',
            [
                'places' => $places,
                'months' => $months,
                'locations' => $locations,
            ]);
    }

    public function filtering(Request $request)
    {
       $places = (new PlaceQuery())->paginate()->appends(request()->query());
        $months = Month::where('count', '>', 0)->get();
        $locations = Location::where('count', '>', 0)->get();
        return view('filterResult',  [
            'places' => $places,
            'months' => $months,
            'locations' => $locations,
        ]);
    }


}
