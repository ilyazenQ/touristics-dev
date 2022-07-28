<?php

namespace App\Actions\PlaceActions;

use App\Actions\StateActions\SaveStateAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadPlaceAction
{
    static function execute(array $data, Request $request)
    {

        DB::transaction(function () use ($data, $request) {
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
            SaveMonthPlaceAction::execute($placeStored, $data['months']);
            SyncReferencesOnPlaceAction::execute($referencesValues, $placeStored);
            });
}

}
