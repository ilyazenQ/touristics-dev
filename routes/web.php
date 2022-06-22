<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/place/{id}', [\App\Http\Controllers\PlaceController::class, 'show'])->name('placeSingle');
Route::get('/filter-result', [\App\Http\Controllers\MainController::class, 'filtering'])->name('filtering');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/store-rating/{userId}/{placeId}', [\App\Http\Controllers\StateController::class, 'storeRating'])->name('ratingStore');
    Route::post('/store-comment/{userId}/{placeId}', [\App\Http\Controllers\CommentController::class, 'store'])->name('commentStore');

});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\UserAdminController::class, 'index'])->name('userPanel');

    Route::get('/edit/{id}', [\App\Http\Controllers\UserAdminController::class, 'edit'])->name('userEdit');
    Route::put('/update/{id}', [\App\Http\Controllers\UserAdminController::class, 'update'])->name('userUpdate');
    Route::put('/password-update/{id}', [\App\Http\Controllers\UserAdminController::class, 'passwordUpdate'])->name(
        'userPasswordUpdate'
    );

    Route::group(['prefix' => 'room'], function () {
        Route::get('/create', [\App\Http\Controllers\RoomController::class, 'create'])->name('roomCreate');
        Route::post('/store', [\App\Http\Controllers\RoomController::class, 'store'])->name('roomStore');
        Route::get('/edit/{id}', [\App\Http\Controllers\RoomController::class, 'edit'])->name('roomEdit');
        Route::put('/update/{id}', [\App\Http\Controllers\RoomController::class, 'update'])->name('roomUpdate');



        Route::get('{id}/create/images', [\App\Http\Controllers\RoomController::class, 'createImages'])->name(
            'roomCreateImages'
        );
        Route::post('{id}/store/images', [\App\Http\Controllers\RoomController::class, 'storeImages'])->name(
            'roomStoreImages'
        );

        Route::get('/{id}/images/edit', [\App\Http\Controllers\RoomController::class, 'editImages'])->name(
            'roomImagesEdit'
        );
        Route::delete('/images/destroy/{id}', [\App\Http\Controllers\RoomController::class, 'destroyImage'])->name(
            'roomImageDestroy'
        );

    });

    Route::group(['prefix' => 'place', 'middleware' => ['checkUserPlace']], function () {
        Route::get('/create', [\App\Http\Controllers\PlaceController::class, 'create'])->name('placeCreate');
        Route::post('/store', [\App\Http\Controllers\PlaceController::class, 'store'])->name('placeStore');
    });

    Route::group(['prefix' => 'place'], function () {
        Route::get('/create/images', [\App\Http\Controllers\PlaceController::class, 'createImages'])->name(
            'placeCreateImages'
        );
        Route::post('/store/images', [\App\Http\Controllers\PlaceController::class, 'storeImages'])->name(
            'placeStoreImages'
        );
        Route::get('/{id}/images/edit', [\App\Http\Controllers\PlaceController::class, 'editImages'])->name(
            'placeImagesEdit'
        );
        Route::delete('/images/destroy/{id}', [\App\Http\Controllers\PlaceController::class, 'destroyImage'])->name(
            'placeImageDestroy'
        );


        Route::get('/edit/{id}', [\App\Http\Controllers\PlaceController::class, 'edit'])->name('placeEdit');
        Route::put('/update/{id}', [\App\Http\Controllers\PlaceController::class, 'update'])->name('placeUpdate');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
