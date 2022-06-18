<?php

namespace App\Actions;

use App\Models\Month;
use App\Models\Room;
use App\Models\RoomMonth;

class UpdateMonthRoomAction
{
    // TODO разбить на подметоды
    static function execute($data, Room $room)
    {
        foreach ($data['months'] as $title => $month) {

            if (in_array($title, $room->months->pluck('title')->all())) {

                $roomMonth = RoomMonth::FindByTitleAndRoom($title, $room->id);
                $roomMonth = RoomMonth::findOrFail($roomMonth->id);

                if ((count($month) == 2 && !is_null($month['price']))) {
                    $roomMonth->update([
                        'price' => $month['price']
                    ]);
                } elseif (count($month) == 1 || (count($month) == 2 && is_null($month['price']))) {

                    $roomMonth->delete();

                }
            } elseif (isset($month["id"]) && !is_null($month["price"])) {

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


