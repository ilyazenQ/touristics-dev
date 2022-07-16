<?php

namespace App\Actions\PlaceActions;


use App\Actions\StoreImagesAction;
use App\Models\ImagePlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavePlaceImagesAction
{
    static function execute(Request $request, string $folderName)
    {
        $images = StoreImagesAction::execute($request, $folderName);

        foreach ($images as $image) {

           $imagePlace =  ImagePlace::create([
               'link' => $image,
                'place_id' => Auth::user()->place_id
            ]);

           $imagePlace->save();
        }

    }
}
