<?php

namespace App\Actions\PlaceActions;

use App\Models\SocialPlace;

class UpdateSocialNetworkAction
{
    static function execute($data, $place): void
    {
        $dataRequest = $data['phone'];
        $social = SocialPlace::findOrFail($place->social_place_id);
        $social->update(
            [
                'phone' => $dataRequest,
                'social_network_1' => 1
            ]
        );
    }

}
