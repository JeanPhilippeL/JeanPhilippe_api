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
Route::post('stations/{station}/measure', 'MeasureController@store');

Route::apiResource('stations', 'StationController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users/{user}/profile', 'ProfileController@show');
Route::put('users/{user}/profile', 'ProfileController@update');

Route::get('stations/{station}/measure', 'MeasureController@show');
Route::get('stations/{station}/measure/24h', 'MeasureController@show24h');



