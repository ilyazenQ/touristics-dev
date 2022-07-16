<?php

namespace App\Actions\RoomActions;

use App\Models\RoomMonth;

class FindLowestRoomPriceAction
{
    static function execute($rooms, $inputPrice)
    {
        $lowPrice = $inputPrice;
        $price = min(RoomMonth::whereIn('room_id',$rooms)->pluck('price')->toArray());
        if($price < $lowPrice) {
            $lowPrice = $price;
        }
        return $lowPrice;
    }
}
