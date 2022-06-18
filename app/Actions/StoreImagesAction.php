<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreImagesAction
{
    static function execute(Request $request, string $folderName)
    {
        $images = [];

        $folder = date('Y-m-d');
        $placeId = Auth::user()->place_id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $image = $file->store("images/{$folderName}/{$placeId}/{$folder}", 'public');
                $images[] = $image;
            }
        }

        return $images;
    }
}
