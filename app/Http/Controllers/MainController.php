<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Queries\PlaceQuery;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(Request $request)
    {
        $places = (new PlaceQuery())->paginate()->appends(request()->query());

        return view('main',['places' => $places,]);
    }

    public function filtering()
    {
        $places = (new PlaceQuery())->paginate()->appends(request()->query());

        return view('filterResult',['places' => $places]);
    }


}
