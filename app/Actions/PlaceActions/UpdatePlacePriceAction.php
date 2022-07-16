<?php

namespace App\Actions\PlaceActions;

use App\Models\MonthPlace;
use App\Models\Place;

class UpdatePlacePriceAction
{

    public static function execute($room)
    {
        $placesMonth = MonthPlace::where('place_id','=',$room->place_id)->get()->sortBy('price')->toArray();
        if(count($placesMonth) == 0) {
            $place = Place::findOrFail($room->place_id);
            $place->price = 0;
            $place->save();
            return;
        } else {
            $place = Place::findOrFail($room->place_id);
            $place->price = $placesMonth[0]["price"];
            $place->save();
        }
    }
}
