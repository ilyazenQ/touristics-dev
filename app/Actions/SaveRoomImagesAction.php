<?php

namespace App\Actions;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;

class SaveRoomImagesAction
{
    static function execute(Request $request, string $folderName, $id)
    {
        $images = StoreImagesAction::execute($request, $folderName);

        foreach ($images as $image) {

            $imageRoom =  RoomImage::create([
                'link' => $image,
                'room_id' => $id
            ]);

            $imageRoom->save();
        }

    }
}
