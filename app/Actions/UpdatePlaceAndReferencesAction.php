<?php

namespace App\Actions;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UpdatePlaceAndReferencesAction
{
    static function execute(array $data, Request $request, Place $place)
    {
        UpdateSocialNetworkAction::execute($data, $place);
        UpdateUserFillPlaceAction::execute($data, $place);

        UpdatePlaceAction::execute($data, $request, $place);

    }
}
