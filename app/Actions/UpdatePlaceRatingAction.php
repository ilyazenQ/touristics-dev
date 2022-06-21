<?php

namespace App\Actions;

use App\Models\Place;

class UpdatePlaceRatingAction
{

    public static function execute(array $data, int $placeId)
    {
        $place = Place::findOrFail($placeId);
        $currentRating = $place->rating;

        if($currentRating == 0) {
            $updatedRating = $data['experience'];
        } else {
            $updatedRating = ceil(($currentRating + $data['experience']) / 2);
        }

        $place->rating = $updatedRating;
        $place->save();
    }
}
