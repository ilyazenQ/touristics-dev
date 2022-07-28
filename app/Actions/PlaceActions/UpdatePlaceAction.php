<?php

namespace App\Actions\PlaceActions;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdatePlaceAction
{
    static function execute(array $data, Request $request, Place $place): Place
    {
        $place->update(
            [
                'title' => $data['title'],
                'slug' => Str::slug($data['title'], '-'),
                'description' => $data['description'],
                'on_map' => $data['on_map'],
                'distance_to' => $data['distance_to'],
                'stars' => $data['stars'],
                'type_id' => $data['type_id'],
                'location_id' => $data['location_id'],
                'price' => $data['price']
            ]
        );
        $place->abouts()->sync($request->about_place);

        return $place;
    }
}
