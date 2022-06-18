<?php

namespace App\Http\Controllers;

use App\Actions\UploadUserAvatarAction;
use App\Http\Requests\UsersRequest;
use App\Models\Place;
use App\Models\User;
use App\Queries\PlaceQuery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        try {
            $place = $user->place;
        } catch (Exception $e) {
            $place = [];
        }

        try {
            $rooms = $place->rooms;
        } catch (Exception $e) {
            $rooms = [];
        }

        return view('user.user_panel', ['user' => $user, 'place' => $place,
            'rooms' => $rooms
        ]);
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = UploadUserAvatarAction::execute($request, $user);
        }

        $user->update($data);

        return redirect()->route('userPanel')->with('success', 'Профиль обновлен');
    }

    public function passwordUpdate(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'passwordNew' => 'required|string|min:8',
            'passwordOld' => 'required|string|min:8',
        ]);

        if (Hash::check($request->passwordOld, $user->password)) {

           $user->update([
                'password' => Hash::make($request->passwordNew),
            ]);
            return redirect()->route('userEdit', $user->id)->with('success', 'Пароль обновлен');

        }

        return redirect()->route('userEdit', $user->id)->with('password-error', 'Неверно введен пароль');

    }

}
