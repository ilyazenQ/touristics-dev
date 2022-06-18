<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadUserAvatarAction
{

    static function execute(Request $request, User $user)
    {
        $folder = date('Y-m-d');
        if ($user->image !== "images/users/default.jpg") {
            Storage::delete('public/' . $user->image);
        }

        $image = $request->file('image')->store("images/users/{$folder}", 'public');
        return $image;
    }

}
