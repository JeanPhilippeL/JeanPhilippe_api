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

//récit 1
Route::post('/register', 'UserController@store');

//récit 2
Route::get('stations/{stations}', 'StationController@show');
Route::get('stations/', 'StationController@show');
Route::post('stations', 'StationController@store')->middleware(['auth:api']);

Route::put('stations/{stations}', 'StationController@update')
    ->middleware(['auth:api', 'owner:stations']);
Route::delete('stations/{stations}', 'StationController@destroy')
    ->middleware(['auth:api', 'owner:stations']);

//récit 3
Route::put('stations/{stations}/measure', 'MeasureController@update')
    ->middleware(['auth:api', 'owner:stations']);

//récit 3
Route::put('stations/{stations}/measure', 'MeasureController@update')
    ->middleware(['auth:api', 'owner:stations']);

//récit 4
Route::post('stations/{stations}/measures', 'MeasureController@store');
   // ->middleware(['auth:api', 'owner:stations']);

Route::get('stations/{station}/measure', 'MeasureController@show');
Route::get('stations/{station}/measure/24h', 'MeasureController@show24h');
