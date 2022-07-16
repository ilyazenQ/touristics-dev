<?php

namespace App\Actions;

use App\Actions\PlaceActions\UpdateOrDeleteMonthPlaceAction;
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
                    $monthDB = Month::findOrFail($month["id"]);
                    $roomMonth->update([
                        'price' => $month['price']
                    ]);
                    SaveOrUpdateMonthPlaceAction::execute($month, $room, $monthDB);
                } elseif (count($month) == 1 || (count($month) == 2 && is_null($month['price']))) {
                    UpdateOrDeleteMonthPlaceAction::execute($room, $roomMonth->month_id);
                    $roomMonth->delete();

                }
            } elseif (isset($month["id"]) && !is_null($month["price"])) {
                $monthDB = Month::findOrFail($month["id"]);

                $roomMonth = RoomMonth::create([
                    'title' => $monthDB->title,
                    'month_id' => $month['id'],
                    'room_id' => $room->id,
                    'price' => $month['price'],
                ]);
                SaveOrUpdateMonthPlaceAction::execute($month, $room, $monthDB);
                $roomMonth->save();
            }
        }
    }

}


