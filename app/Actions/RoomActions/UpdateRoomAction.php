<?php

namespace App\Actions\RoomActions;

use App\Models\Room;
use Illuminate\Http\Request;


class UpdateRoomAction
{
    static function execute(array $data, Request $request, Room $room): Room
    {
        $room->update(
            [
                'title' => $data['title'],
                'type_id' => $data['type_id'],
            ]
        );
        $room->abouts()->sync($request->about_place);

        return $room;
    }
}
