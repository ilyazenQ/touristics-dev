<?php

namespace App\Actions\RoomActions;

use App\Models\Room;

class SyncReferencesOnRoomAction
{
    static function execute(array $references, Room $room)
    {
        foreach ($references as $k => $v) {
            $v->room_id = $room->id;

            $v->save();
        }
    }
}

