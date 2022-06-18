<?php

namespace App\Actions;

use App\Models\Place;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SaveRoomAction
{
    static function execute(array $data, array $referencesValues, Request $request)
    {
        $room = Room::create(
            [
                'title' => $data['title'],
                'type_id' => $data['type_id'],
                'user_fill_id' => $referencesValues['user_fill']->id,
                'user_id' => Auth::user()->id,
                'place_id' => Auth::user()->place->id
            ]
        );

        $room->abouts()->sync($request->about_place);

        return $room;
    }

}
