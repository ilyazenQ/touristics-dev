<?php

namespace App\Actions;

use App\Actions\PlaceActions\UpdatePlaceRatingAction;
use App\Models\Vote;

class UploadRatingAction
{
    static function execute(array $data, int $userId, int $placeId)
    {
        Vote::create([
            'vote'=> $data['experience'],
            'user_id'=>$userId,
            'place_id'=>$placeId,
        ]);

        UpdatePlaceRatingAction::execute($data, $placeId);
    }
}
