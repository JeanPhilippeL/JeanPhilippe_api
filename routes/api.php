<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//public
Route::get('stations/{station}', 'StationController@show');
Route::get('stations', 'StationController@index');

//protégé
Route::post('stations', 'StationController@store')->middleware(['auth:api']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Protégé avec vérification du propriétaire (owner)
Route::delete('stations/{stations}', 'StationController@destroy')
    ->middleware(['auth:api', 'owner:stations']);
Route::put('stations/{stations}', 'StationController@update')
    ->middleware(['auth:api', 'owner:stations']);

Route::apiResource('measures', 'MeasureController');
Route::apiResource('stations', 'StationController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'UserController@store');

Route::get('users/{user}/profile', 'ProfileController@show');
Route::put('users/{user}/profile', 'ProfileController@update');

Route::get('/create-personal-token', function () {
    $rnd = random_int(0, 1000);
    $user = new App\User();
    $user->name = $rnd.'oauth';
    $user->password = Hash::make('secret');
    $user->email = $rnd.'oauth@mail.com';
    $user->save();
    $token = $user->createToken('iot')->accessToken;
    echo $token;
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/user/profile', function (Request $request) {
    return $request->user()->profile;
});







