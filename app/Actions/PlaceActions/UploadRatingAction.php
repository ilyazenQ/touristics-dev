<?php

namespace App\Actions\PlaceActions;

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
