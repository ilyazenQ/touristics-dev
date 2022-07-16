<?php

namespace App\Actions\RoomActions;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateRoomAndReferencesAction
{
    static function execute(array $data, Request $request, Room $room)
    {
        DB::transaction(function () use ($data,$room,$request) {
            UpdateUserFillRoomAction::execute($data, $room);
            UpdateMonthRoomAction::execute($data, $room);

            UpdateRoomAction::execute($data, $request, $room);
        });
    }
}
