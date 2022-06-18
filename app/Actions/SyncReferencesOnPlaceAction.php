<?php

namespace App\Actions;

use App\Models\Place;
use Illuminate\Support\Facades\Auth;

class SyncReferencesOnPlaceAction
{
    static function execute(array $references, Place $place)
    {
        foreach ($references as $k => $v) {
            $v->place_id = $place->id;

            $v->save();
        }

        $user = Auth::user();
        $user->place_id = $place->id;
        $user->save();
    }
}
