<?php

namespace App\Actions;

use App\Models\SocialPlace;

class SaveSocialNetworkAction
{
    static function execute($data): SocialPlace
    {
        $dataRequest = $data['phone'];

        $dataStored = SocialPlace::create(
            [
                'phone' => $dataRequest,
                'social_network_1' => 1
            ]
        );

        return $dataStored;
    }
}
