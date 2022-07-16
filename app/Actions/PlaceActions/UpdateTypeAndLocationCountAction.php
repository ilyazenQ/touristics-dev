<?php

namespace App\Actions\PlaceActions;

use App\Models\Location;
use App\Models\Type;


class UpdateTypeAndLocationCountAction
{

    public static function execute(array $data)
    {
        $location = Location::findOrFail($data['location_id']);
        $type = Type::findOrFail($data['type_id']);
        $location->count += 1;
        $type->count += 1;
        $location->save();
        $type->save();
    }
}
