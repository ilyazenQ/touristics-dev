<?php

namespace App\Actions\PlaceActions;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdatePlaceAndReferencesAction
{
    static function execute(array $data, Request $request, Place $place)
    {
        DB::transaction(function () use ($data,$place,$request) {

            UpdateSocialNetworkAction::execute($data, $place);
            UpdateUserFillPlaceAction::execute($data, $place);

            UpdatePlaceAction::execute($data, $request, $place);
        });

    }
}
