<?php

namespace App\Actions\PlaceActions;

use Illuminate\Http\Request;

class UploadPlaceImagesAction
{

    static function execute(Request $request)
    {
        SavePlaceImagesAction::execute($request, 'room');
    }

}
