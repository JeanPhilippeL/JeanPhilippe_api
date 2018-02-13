<?php

namespace App\Http\Controllers;

use App\Measure;
use App\Http\Resources\MeasureResource;
use App\Http\Requests\MeasurePostRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function index()
	{
        //echo('Welcome');
        return Measure::all();

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

    public function store(MeasurePostRequest $request)
    {
        //#POST -- Add Specified request
        $measure = new Measure($request->all());
        $measure->save();
        if ($measure->save()) {
            return new MeasureResource($measure);
        }
    }

    public function show(Measure $measure)
    {
        //#GET -- Display the specified resource.
        return $measure;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        echo('test');
        $measure = Measure::Update($measure->id);
        $measure->Description = $request->input('Value');
        $measure->Description = $request->input('Description');
        $measure->save();
        return new MeasureResource($measure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        if($measure->delete()) {
            return new Measure($measure);
        }
    }
}
