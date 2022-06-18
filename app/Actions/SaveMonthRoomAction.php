<?php

namespace App\Actions;

use App\Models\Month;
use App\Models\Room;
use App\Models\RoomMonth;


class SaveMonthRoomAction
{
    static function execute($data, Room $room)
    {
        foreach ($data['months'] as $month) {
            if (isset($month["id"]) && !is_null($month["price"])) {
                $monthTitle = Month::findOrFail($month["id"]);

                $roomMonth = RoomMonth::create([
                    'title' => $monthTitle->title,
                    'month_id' => $month['id'],
                    'room_id' => $room->id,
                    'price' => $month['price'],
                ]);

                $roomMonth->save();
            }
        }
    }
}
