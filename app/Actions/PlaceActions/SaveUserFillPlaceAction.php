<?php

namespace App\Actions\PlaceActions;

use App\Models\UserFillAboutPlace;

class SaveUserFillPlaceAction
{
    static function execute($data): UserFillAboutPlace
    {
        $dataStored = UserFillAboutPlace::create(
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
                'place_id' => NULL,
            ]
        );

        return $dataStored;
    }
}
