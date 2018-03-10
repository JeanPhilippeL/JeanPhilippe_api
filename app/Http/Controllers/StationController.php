<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use App\Http\Resources\StationResource;
use App\Http\Requests\StationPostRequest;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::paginate(5);
        return StationResource::collection($stations);
    }
    public function create()
    {
        //
    }
    public function store(StationPostRequest $request)
    {
        $station = new Station();
        $station->name = $request->input('name');
        $station->lat = $request->input('lat');
        $station->long = $request->input('long');
        $station->user_id = $request->input('user_id');
        $station->save();
        return new StationResource($station);

    }
    public function show(Station $stations)
    {
        return new StationResource($stations);
    }
    public function edit(Station $station)
    {
        //
    }
    public function update(StationPostRequest $request, Station $stations)
    {
        $stations->name = $request->input('name');
        $stations->lat = $request->input('lat');
        $stations->long = $request->input('long');
        $stations->user_id = $request->input('user_id');
        $stations->save();

        return new StationResource($stations);
    }
    public function destroy(Station $stations)
    {
        $collection = $stations->measure()->get();
        foreach($collection as $item)
        {
            $item->delete();
        }
            $stations->delete();
    }
}
