<?php

namespace App\Actions\PlaceActions;

use App\Actions\MonthAction\IncrMonthCountAction;
use App\Models\Month;
use App\Models\MonthPlace;
use App\Models\Place;

class SaveMonthPlaceAction
{
    public static function execute(Place $place, $months)
    {
        foreach ($months as $monthId) {
            self::saveMonth($place,$monthId);
        }
    }

    public static function saveMonth(Place $place, $monthId) {
        $month = Month::findOrFail($monthId);
        $monthPlace = MonthPlace::create([
            'month_id' => $monthId,
            'place_id' => $place->id,
        ]);
        $monthPlace->save();
        IncrMonthCountAction::execute($month);
    }
}
