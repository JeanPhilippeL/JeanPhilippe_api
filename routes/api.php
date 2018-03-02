<?php

use Illuminate\Http\Request;

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
Route::apiResource('measures', 'MeasureController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
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


