<?php

namespace App\Actions\PlaceActions;

use App\Actions\RoomActions\FindLowestRoomPriceAction;
use App\Models\MonthPlace;
use App\Models\Room;
use ErrorException;

class SaveOrUpdateMonthPlaceAction
{

    public static function execute(array $data, Room $room, $month)
    {

        $placeMonth = MonthPlace::where('place_id', '=', $room->place_id)->where('month_id', '=', $month->id)->get();

        try {
            $placeMonth[0]->id;
            $rooms = Room::where('place_id', '=', $room->place_id)->pluck('id');
            $lowestPrice = FindLowestRoomPriceAction::execute($rooms, $data['price']);
            $placeMonth[0]->price = $lowestPrice;
            $placeMonth[0]->save();

        } catch (ErrorException $e) {

            $monthPlace = MonthPlace::create([
                'month_id' => $month->id,
                'place_id' => $room->place_id,
                'price' => $data['price'],
            ]);
            $monthPlace->save();
        }

    }
}
