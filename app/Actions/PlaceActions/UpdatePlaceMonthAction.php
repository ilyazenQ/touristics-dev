<?php

namespace App\Actions\PlaceActions;

use App\Actions\MonthAction\DecrMonthCountAction;
use App\Models\Month;
use App\Models\MonthPlace;
use App\Models\Place;

class UpdatePlaceMonthAction
{
    public static function execute(Place $place, $months = [])
    {
        $placeMonths =  $place->months->pluck('month_id')->all();
        $months = array_map('intval', $months);
        foreach ($months as $monthId) {
            if(in_array($monthId, $placeMonths)) {
                continue;
            } else {
                SaveMonthPlaceAction::saveMonth($place,$monthId);
            }
        }
        $monthsWillDelete = array_diff($placeMonths,$months);
        if(count($monthsWillDelete)) {
            self::monthsWillDelete($monthsWillDelete, $place);
        }


    }
    public static function monthsWillDelete($monthsWillDelete, $place) {

        foreach ($monthsWillDelete as $monthDeleteId) {
            $monthPlace = MonthPlace::where('place_id','=',$place->id)
                ->where('month_id','=',$monthDeleteId)
                ->get()[0];
            $monthPlace->delete();

            $month = Month::findOrFail($monthDeleteId);
            DecrMonthCountAction::execute($month);
        }
    }



}
