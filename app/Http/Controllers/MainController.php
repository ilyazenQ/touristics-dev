<?php

namespace App\Http\Controllers;

use App\Actions\SaveFiltersInSessionAction;
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

        SaveFiltersInSessionAction::execute($request);

        $session = $request->session()->all();

        return view('main',
            [
                'places' => $places,
                'months' => $months,
                'locations' => $locations,
                'session' => $session,
            ]);
    }

    public function filtering(Request $request)
    {
        $places = (new PlaceQuery())->paginate()->appends(request()->query());
        $months = Month::where('count', '>', 0)->get();
        $locations = Location::where('count', '>', 0)->get();

        SaveFiltersInSessionAction::execute($request);

        $session = $request->session()->all();
        return view('filterResult', [
            'places' => $places,
            'months' => $months,
            'locations' => $locations,
            'session' => $session,
        ]);
    }


}
