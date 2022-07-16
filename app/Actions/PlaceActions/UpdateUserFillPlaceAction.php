<?php

namespace App\Actions\PlaceActions;

use App\Models\Place;
use App\Models\UserFillAboutPlace;

class UpdateUserFillPlaceAction
{
    static function execute(array $data, Place $place): void
    {
        $userFill = UserFillAboutPlace::findOrFail($place->user_fill_id);
        $userFill->update(
            [
                'check-in' => $data['check-in'],
                'check-out' => $data['check-out'],
                'build' => $data['build'],
                'rebuild' => $data['rebuild'],
                'documents' => $data['documents'],
                'room-fund' => $data['room-fund'],
                'conference-hall-fund' => $data['conference-hall-fund'],
                'restaurant-fund' => $data['restaurant-fund'],
                'cooking' => $data['cooking'],
                'cooking-price' => $data['cooking-price'],
                'breakfast-start' => $data['breakfast-start'],
                'breakfast-end' => $data['breakfast-end'],
            ]
        );

    }
}
