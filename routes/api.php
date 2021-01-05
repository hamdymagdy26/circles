<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::apiResource('place', 'App\Http\Controllers\PlaceController');
Route::apiResource('placeType', 'App\Http\Controllers\PlaceTypeController');
Route::apiResource('menu', 'App\Http\Controllers\MenuController');
Route::apiResource('menuCategory', 'App\Http\Controllers\MenuCategoryController');
Route::apiResource('menuProduct', 'App\Http\Controllers\MenuProductController');
Route::apiResource('placeRate', 'App\Http\Controllers\PlaceRateController');
Route::apiResource('userRate', 'App\Http\Controllers\UserRateController');
Route::apiResource('tag', 'App\Http\Controllers\TagController');
Route::apiResource('favourite', 'App\Http\Controllers\FavouriteController');
Route::apiResource('circle', 'App\Http\Controllers\CircleController');
Route::apiResource('placeInformation', 'App\Http\Controllers\PlaceInformationController');

Route::middleware('auth:api')->group(function () {
    // Route::resource('place', PlaceController::class);
});
