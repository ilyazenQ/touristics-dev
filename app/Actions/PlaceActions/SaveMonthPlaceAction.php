<?php

namespace App\Actions\PlaceActions;

use App\Models\MonthPlace;
use App\Models\Place;

class SaveMonthPlaceAction
{

    public static function execute(Place $place, $months)
    {
        foreach ($months as $month) {
            $monthPlace = MonthPlace::create([
                'month_id' => $month,
                'place_id' => $place->id,
            ]);
            $monthPlace->save();
        }

    }
}
