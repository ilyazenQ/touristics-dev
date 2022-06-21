<?php

namespace App\Actions;

use App\Models\MonthPlace;
use App\Models\Room;
use App\Models\RoomMonth;

class UpdateOrDeleteMonthPlaceAction
{

    public static function execute($room,$monthId)
    {
        $rooms = Room::where('place_id', '=', $room->place_id)->pluck('id');

        $countRoomWithMonth = count(RoomMonth::whereIn('room_id',$rooms)->where('month_id','=',$monthId)->get()->toArray());
        $placeMonth = MonthPlace::where('place_id','=',$room->place_id)->where('month_id','=',$monthId)->get()[0];

        if ($countRoomWithMonth == 1) {
            $placeMonth->delete();
        } else {
            $roomMonthsArray = RoomMonth::whereIn('room_id',$rooms)->where('month_id','=',$monthId)->pluck('price')->toArray();
            sort($roomMonthsArray);
            $lowestPrice = $roomMonthsArray[1];
            $placeMonth->price = $lowestPrice;
            $placeMonth->save();
        }
    }
}
