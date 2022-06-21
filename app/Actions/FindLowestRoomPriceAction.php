<?php

namespace App\Actions;

use App\Models\Room;
use App\Models\RoomMonth;

class FindLowestRoomPriceAction
{
    static function execute($rooms,$monthId, $inputPrice)
    {
        $lowPrice = $inputPrice;
        $price = min(RoomMonth::whereIn('room_id',$rooms)->where('month_id','=',$monthId)->pluck('price')->toArray());
        if($price < $lowPrice) {
            $lowPrice = $price;
        }
        return $lowPrice;
    }
}
