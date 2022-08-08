<?php

namespace App\Actions\PlaceActions;

use App\Actions\RoomActions\FindLowestRoomPriceAction;
use App\Models\MonthPlace;
use App\Models\Room;
use ErrorException;

class SaveOrUpdateMonthPlaceAction
{

    public static function execute(array $data, Place $place, $months)
    {
        foreach ($months as $month) {
            $monthPlace = MonthPlace::create([
                'month_id' => $month->id,
                'place_id' => $place->id,
                'price' => $data['price'],
            ]);
            $monthPlace->save();
        }

    }
}
