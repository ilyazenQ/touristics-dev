<?php

namespace App\Actions;

use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
