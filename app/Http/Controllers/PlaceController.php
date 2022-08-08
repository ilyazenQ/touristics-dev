<?php

namespace App\Http\Controllers;



use App\Actions\PlaceActions\DestroyPlaceImageAction;
use App\Actions\PlaceActions\UpdatePlaceAndReferencesAction;
use App\Actions\PlaceActions\UploadPlaceAction;
use App\Actions\PlaceActions\UploadPlaceImagesAction;
use App\Actions\RoomActions\GetUniqRoomTypesAction;
use App\Actions\SaveFiltersInSessionAction;
use App\Models\AboutPlace;
use App\Models\Location;
use App\Models\Month;
use App\Models\Place;
use App\Models\RoomAbout;
use App\Models\RoomType;
use App\Models\Type;
use App\Queries\RoomQuery;
use Exception;
use Illuminate\Http\Request;


class PlaceController extends Controller
{

    public function show(Request $request, int $id)
    {
        $place = Place::findOrFail($id);
        $about = $place->abouts;
        $months = Month::all();
        $comments = $place->comments;
        $rooms = (new RoomQuery($place->id))->paginate()->appends(request()->query()) ?? [];
        SaveFiltersInSessionAction::execute($request);
        request()->session()->put('place_id', $id);
        $aboutRoom = RoomAbout::all() ?? [];
        $roomTypes = GetUniqRoomTypesAction::execute($place) ?? [];
        $session = request()->session()->all();

        return view(
            'single',
            [
                'place' => $place,
                'rooms' => $rooms,
                'aboutRoom' => $aboutRoom,
                'about' => $about,
                'months' => $months,
                'session' => $session,
                'comments' => $comments,
                'roomTypes' => $roomTypes,
            ]
        );


    }

    public function edit(int $id)
    {
        $place = Place::findOrFail($id);
        $locations = Location::all();
        $types = Type::all();
        $aboutPlace = AboutPlace::all();
        $months = Month::all();

        return view(
            'place.edit',
            [
                'place' => $place,
                'locations' => $locations,
                'types' => $types,
                'about' => $aboutPlace,
                'months' => $months
            ]
        );
    }

    public function create()
    {
        $locations = Location::all();
        $types = Type::all();
        $aboutPlace = AboutPlace::all();
        $months = Month::all();

        return view(
            'place.create',
            [
                'locations' => $locations,
                'types' => $types,
                'about' => $aboutPlace,
                'months' => $months,
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|string|max:255|unique:places',
            'type_id' => 'required|integer',
            'location_id' => 'required|integer',
            'on_map' => 'required|string',
            'description' => 'required|string',
            'phone' => 'required',
            'price' => 'required|integer',
            'check-in' => 'required|integer',
            'check-out' => 'required|integer',
            'documents' => 'required|string',
            'room-fund' => 'required|string',
            'cooking' => 'required|string',
        ]);

        UploadPlaceAction::execute($data, $request);

        return redirect()->route('placeCreateImages');
    }

    public function createImages()
    {
        return view(
            'place.image.create',
        );
    }

    public function editImages(int $id)
    {
        $place = Place::findOrFail($id);
        $images = $place->images;

        return view(
            'place.image.edit',
            [
                'images' => $images,
            ]
        );
    }

    public function storeImages(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        UploadPlaceImagesAction::execute($request);

        return redirect()->route('userPanel')->with('success', 'Успешно сохранено!');
    }

    public function destroyImage(int $imageId)
    {
        $place = DestroyPlaceImageAction::execute($imageId);

        return redirect()->route('placeImagesEdit', $place->id)->with('success', 'Успешно удалено');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();

        $place = Place::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'location_id' => 'required|integer',
            'on_map' => 'required|string',
            'description' => 'required|string',
            'phone' => 'required',
            'price' => 'required|integer',
            'check-in' => 'required|integer',
            'check-out' => 'required|integer',
            'documents' => 'required|string',
            'room-fund' => 'required|string',
            'cooking' => 'required|string',
            'months' => 'required'
        ]);

        UpdatePlaceAndReferencesAction::execute($data, $request, $place);

        return redirect()->route('userPanel')->with('success', 'Профиль отеля успешно изменён!');
    }


}
