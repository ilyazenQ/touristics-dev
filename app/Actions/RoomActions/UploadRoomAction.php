<?php

namespace App\Actions\RoomActions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadRoomAction
{

    static function execute(array $data, Request $request)
    {
       return DB::transaction(function () use ($data, $request) {
            $userFillStored = SaveUserFillRoomAction::execute($data);

            $referencesValues = [
                'user_fill' => $userFillStored,
            ];

            $roomStored = SaveRoomAction::execute($data, $referencesValues, $request);

            SaveMonthRoomAction::execute($data, $roomStored);

            SyncReferencesOnRoomAction::execute($referencesValues, $roomStored);

            return $roomStored;
        });


    }
}
