<?php

namespace App\Actions;

use Illuminate\Http\Request;

class UploadRoomImagesAction
{

    static function execute(Request $request, $id)
    {
        SaveRoomImagesAction::execute($request, 'room'.$id, $id);
    }
}
