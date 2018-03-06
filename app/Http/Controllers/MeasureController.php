<?php

namespace App\Http\Controllers;

use App\Measure;
use App\Station;
use App\Http\Resources\MeasureResource;
use App\Http\Requests\MeasurePostRequest;

class MeasureController extends Controller
{
    //Display a listing of the resource.
	public function index()
	{
        return Measure::all();
    }

    public function store(MeasurePostRequest $request)
    {
        //#POST -- Add Specified request
        $measure = new Measure;
        $measure->value = $request->input('value');
        $measure->description = $request->input('description');
        $measure->save();
        return new MeasureResource($measure);
    }

    //#GET -- Display the specified resource.
    public function show(Station $station)
    {
       $array = array($station->measure());
       return $array;

    }

    // Update the specified resource in storage.
    public function update(MeasurePostRequest $request, Measure $measure)
    {
        if($measure->exists){
            $measure->value = $request->input('value');
            $measure->description = $request->input('description');
            $measure->save();
            return new MeasureResource($measure);
        }
    }

    // Remove the specified resource from storage.
    public function destroy(Measure $measure)
    {
        Measure::destroy($measure->id);
        //return new Measure($measure);
    }
}
