<?php

namespace App\Actions;

use App\Models\ImagePlace;
use App\Models\Place;
use Illuminate\Support\Facades\Storage;

class DestroyPlaceImageAction
{
    static function execute(int $id): Place
    {
        $image = ImagePlace::findOrFail($id);
        $place = $image->place;
        Storage::delete('public/' . $image->link);
        $image->delete();

        return $place;
    }
}
