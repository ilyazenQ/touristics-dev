<?php

namespace App\Actions\PlaceActions;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SavePlaceAction
{
    static function execute(array $data, array $referencesValues, Request $request)
    {
        $place = Place::create(
            [
                'title' => $data['title'],
                'slug' => Str::slug($data['title'], '-'),
                'description' => $data['description'],
                'on_map' => $data['on_map'],
                'distance_to' => $data['distance_to'],
                'stars' => $data['stars'],
                'is_published' => 0,
                'user_id' => Auth::user()->id,
                'type_id' => $data['type_id'],
                'price' => $data['price'],
                'location_id' => $data['location_id'],
                'social_place_id' => $referencesValues['social']->id,
                'user_fill_id' => $referencesValues['user_fill']->id,
                'state_id' => $referencesValues['state']->id,
            ]
        );

        $place->abouts()->sync($request->about_place);

        return $place;
    }

}
