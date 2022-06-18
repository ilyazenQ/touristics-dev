<?php

namespace App\Actions;

use Illuminate\Http\Request;

class UploadRoomAction
{

    static function execute(array $data, Request $request)
    {
        $userFillStored = SaveUserFillRoomAction::execute($data);

        $referencesValues = [
            'user_fill' => $userFillStored,
        ];

        $roomStored = SaveRoomAction::execute($data, $referencesValues, $request);

        SaveMonthRoomAction::execute($data, $roomStored);

        SyncReferencesOnRoomAction::execute($referencesValues, $roomStored);

        return $roomStored;
    }
}
