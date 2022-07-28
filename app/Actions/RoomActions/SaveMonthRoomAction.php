<?php

namespace App\Actions\RoomActions;

use App\Actions\MonthAction\SaveMonthPlaceAtion;
use App\Models\Month;
use App\Models\Room;
use App\Models\RoomMonth;


class SaveMonthRoomAction
{
    static function execute($data, Room $room)
    {
        foreach ($data['months'] as $month) {
            if (isset($month["id"]) && !is_null($month["price"])) {
                $monthDB= Month::findOrFail($month["id"]);

                $monthDB->count += 1;

                $monthDB->save();

                $roomMonth = RoomMonth::create([
                    'title' => $monthDB->title,
                    'month_id' => $month['id'],
                    'room_id' => $room->id,
                    'price' => $month['price'],
                ]);

                SaveMonthPlaceAtion::execute($month,$room,$monthDB);

                $roomMonth->save();
            }
        }
    }
}
