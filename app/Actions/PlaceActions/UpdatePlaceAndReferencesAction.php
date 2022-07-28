<?php

namespace App\Actions\PlaceActions;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdatePlaceAndReferencesAction
{
    static function execute(array $data, Request $request, Place $place)
    {

            UpdateSocialNetworkAction::execute($data, $place);
            UpdateUserFillPlaceAction::execute($data, $place);

            $place = UpdatePlaceAction::execute($data, $request, $place);

            UpdatePlaceMonthAction::execute($place, $data['months']);


    }
}
