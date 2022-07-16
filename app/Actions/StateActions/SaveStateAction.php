<?php

namespace App\Actions\StateActions;

use App\Models\State;

class SaveStateAction
{
    static function execute()
    {
        $state = State::create();

        return $state;
    }
}
