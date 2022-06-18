<?php

namespace App\Actions;

use Illuminate\Http\Request;

class UploadPlaceImagesAction
{

    static function execute(Request $request)
    {
        SavePlaceImagesAction::execute($request, 'room');
    }

}
