<?php

namespace App\Http\Controllers;

use App\Actions\DestroyRoomImagesAction;
use App\Actions\UpdatePlacePriceAction;
use App\Actions\UpdateRoomAndReferencesAction;
use App\Actions\UploadRoomAction;
use App\Actions\UploadRoomImagesAction;
use App\Models\Month;
use App\Models\Room;
use App\Models\RoomAbout;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function create()
    {
        $types = RoomType::all();
        $aboutRoom = RoomAbout::all();
        $months = Month::all();

        return view(
            'room.create',
            [
                'types' => $types,
                'about' => $aboutRoom,
                'months' => $months
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'beds' => 'required|string',
            'area' => 'required|string',
        ]);

       $room =  UploadRoomAction::execute($data, $request);
        UpdatePlacePriceAction::execute($room);

       return redirect()->route('roomCreateImages', $room->id);
    }

    public function edit(int $id)
    {
        $types = RoomType::all();
        $aboutRoom = RoomAbout::all();
        $months = Month::all();
        $room = Room::findOrFail($id);

        return view(
            'room.edit',
            [
                'types' => $types,
                'about' => $aboutRoom,
                'months' => $months,
                'room' => $room
            ]
        );
    }

    public function update(Request $request, int $id)
    {

        $data = $request->all();

        $room = Room::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'beds' => 'required|string',
            'area' => 'required|string',
        ]);

        UpdateRoomAndReferencesAction::execute($data, $request, $room);
        UpdatePlacePriceAction::execute($room);

        return redirect()->route('userPanel')->with('success', "Размещение $room->title успешно обновлено!");

    }

    public function createImages($id)
    {
        return view(
            'room.image.create',
            [
                'id' => $id,
            ]
        );
    }

    public function editImages(int $id)
    {
        $room = Room::findOrFail($id);
        $images = $room->images;

        return view(
            'room.image.edit',
            [
                'id' => $id,
                'images' => $images,
            ]
        );
    }

    public function storeImages(Request $request, $id)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);


        UploadRoomImagesAction::execute($request, $id);

        return redirect()->route('userPanel')->with('success', 'Успешно сохранено!');
    }

    public function destroyImage(int $imageId)
    {
        $roomID = DestroyRoomImagesAction::execute($imageId);

        return redirect()->route('roomImagesEdit', $roomID)->with('success', 'Успешно удалено');
    }

}
