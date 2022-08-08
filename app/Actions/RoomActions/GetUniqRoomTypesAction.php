<?php

namespace App\Actions\RoomActions;

use App\Models\Room;
use App\Models\RoomType;
use App\Queries\RoomQuery;

class GetUniqRoomTypesAction
{
    static function execute($place)
    {
        $rooms = Room::query()->where('place_id', '=', $place->id)->get();
        $typesArr = [];
        foreach($rooms as $room) {
            $typesArr[] = $room->type_id;
        }
        return RoomType::whereIn('id',array_unique($typesArr))->get();
    }
}
