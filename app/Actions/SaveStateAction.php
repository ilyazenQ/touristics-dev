<?php

namespace App\Actions;

use App\Models\State;

class SaveStateAction
{
    static function execute()
    {
        $state = State::create();

        return $state;
    }
}
