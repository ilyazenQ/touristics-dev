<?php

namespace App\Actions\PlaceActions;

use App\Actions\StateActions\SaveStateAction;
use Illuminate\Http\Request;

class UploadPlaceAction
{
    static function execute(array $data, Request $request)
    {
        $socialStored = SaveSocialNetworkAction::execute($data);
        $userFillStored = SaveUserFillPlaceAction::execute($data);
        $stateStored = SaveStateAction::execute();

        $referencesValues = [
            'social' => $socialStored,
            'user_fill' => $userFillStored,
            'state' => $stateStored
        ];
        UpdateTypeAndLocationCountAction::execute($data);

        $placeStored = SavePlaceAction::execute($data, $referencesValues, $request);

        SyncReferencesOnPlaceAction::execute($referencesValues, $placeStored);
    }
}
