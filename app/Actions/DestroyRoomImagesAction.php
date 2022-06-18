<?php

namespace App\Actions;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;

class DestroyRoomImagesAction
{
    static function execute(int $id)
    {
        $image = RoomImage::findOrFail($id);
        $room = $image->room;
        Storage::delete('public/' . $image->link);
        $image->delete();

        return $room->id;
    }
}

