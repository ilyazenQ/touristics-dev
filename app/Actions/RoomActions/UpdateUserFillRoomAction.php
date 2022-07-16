<?php

namespace App\Actions\RoomActions;

use App\Models\Room;
use App\Models\UserFillAboutRoom;

class UpdateUserFillRoomAction
{
    static function execute(array $data, Room $room): void
    {
        $userFill = UserFillAboutRoom::findOrFail($room->user_fill_id);
        $userFill->update(
            [
                'beds' => $data['beds'],
                'area' => $data['area'],
            ]
        );

    }
}
