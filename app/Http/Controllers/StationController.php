<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use App\Http\Resources\StationResource;
use App\Http\Requests\StationPostRequest;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::paginate(5);
        return StationResource::collection($stations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationPostRequest $request)
    {
        $station = new Station();
        $station->name = $request->input('name');
        $station->lat = $request->input('lat');
        $station->long = $request->input('long');
        $station->save();
        return new StationResource($station);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return new StationResource($station);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(StationPostRequest $request, Station $station)
    {
        $station->name = $request->input('name');
        $station->lat = $request->input('lat');
        $station->long = $request->input('long');
        $station->save();

        return new StationResource($station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        Station::destroy($station->id);
        if($station->delete()){
            return new StationResource($station);
        }
    }
}
