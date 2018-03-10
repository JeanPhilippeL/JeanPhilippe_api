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
Route::post('/register', 'UserController@store'); //ok

//récit 2 & 3
Route::get('stations/{stations}', 'StationController@show'); //ok
Route::get('stations/', 'StationController@show'); //ok
Route::post('stations', 'StationController@store')->middleware(['auth:api']); //ok

Route::put('stations/{stations}', 'StationController@update') //ok
    ->middleware(['auth:api', 'owner:stations']);
Route::delete('stations/{stations}', 'StationController@destroy') //unauthorized
   ->middleware(['auth:api', 'owner:stations']);

//récit 4
Route::post('stations/{stations}/measures', 'MeasureController@store') //ok
    ->middleware(['auth:api', 'owner:stations']);

Route::get('stations/{station}/measure', 'MeasureController@show'); //ok
Route::get('stations/{station}/measure/24h', 'MeasureController@show24h'); //ok
