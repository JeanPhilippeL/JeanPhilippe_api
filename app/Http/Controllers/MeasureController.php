<?php

namespace App\Http\Controllers;

use App\Measure;
use App\Station;
use App\Http\Resources\MeasureResource;
use App\Http\Requests\MeasurePostRequest;
use Carbon\Carbon;

class MeasureController extends Controller
{

    public function index()
    {
        return Measure::all();
    }

    public function store(MeasurePostRequest $request, Station $stations)
    {
        //#POST -- Add Specified request
        $measure = new Measure();
        $measure->station_id = $stations->id;
        $measure->value = $request->input('value');
        $measure->description = $request->input('description');
        $measure->save();
        return new MeasureResource($measure);

    }

    //#GET -- Display the specified resource.
    public function show(Station $station)
    {
        $res = $station
            ->measure()
            ->get();

        foreach ($res as $item) {
            $value = $item->value;
            $item->color = $this->setColor($value);
            $item->index = $this->setIndex($value);
        }

        return $res;
    }

    public function show24h(Station $station)
    {
        $fromDate = Carbon::now()->subHours(24);
        $toDate = new Carbon('now');

        $measuresCollection = $station->measure()
            ->whereBetween('created_at',
                array($fromDate->toDateTimeString(), $toDate->toDateTimeString()))->get();

        foreach ($measuresCollection as $item) {
            $value = $item->value;
            $item->color = $this->setColor($value);
            $item->index = $this->setIndex($value);
        }
        return $measuresCollection;

    }



    // Remove the specified resource from storage.
    public function destroy(Measure $measure)
    {
        $measure->delete();
    }

    public function setColor($value)
    {
        $color = 'Green';

        if ($value > 49) {
            $color = 'Yellow';
        }
        if ($value > 99) {
            $color = 'Red';
        }
        return $color;
    }

    public function setIndex($value)
    {
        $index = 'Bon';
        if ($value > 49) {
            $index = 'Moyen';
        }
        if ($value > 99) {
            $index = 'Mauvais';
        }
        return $index;
    }
}

