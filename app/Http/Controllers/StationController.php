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
        $station->save();
        return new StationResource($station);
    }

    public function show(Station $station)
    {
        return new StationResource($station);
    }

    public function edit(Station $station)
    {
        //
    }

    public function update(StationPostRequest $request, Station $station)
    {
        $station->name = $request->input('name');
        $station->lat = $request->input('lat');
        $station->long = $request->input('long');
        $station->save();
        return new StationResource($station);
    }

    public function destroy(Station $station)
    {
        Station::destroy($station->id);
        if($station->delete()){
            return new StationResource($station);
        }
    }
}