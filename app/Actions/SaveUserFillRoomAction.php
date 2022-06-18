<?php

namespace App\Actions;

use App\Models\UserFillAboutRoom;

class SaveUserFillRoomAction
{
    static function execute($data): UserFillAboutRoom
    {
        $dataStored = UserFillAboutRoom::create(
            [
                'beds' => $data['beds'],
                'area' => $data['area'],
                'room_id' => NULL,
            ]
        );

        return $dataStored;
    }
}
