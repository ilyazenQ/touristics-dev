<?php

namespace App\Actions\UserActions;

use App\Models\User;
use Illuminate\Http\Request;

class CheckPasswordAction
{

    static function execute(Request $request, User $user): bool
    {
        return false;
    }
}
