<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Measure::where('status',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $measure = new Measure();
        $measure->code = $request->code;
        $measure->name = $request->name;
        $measure->save();
        return $measure;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        return $measure;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        $measure->code = $request->code;
        $measure->name = $request->name;
        $measure->save();
        return $measure;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measure  $measure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        $measure->status = 0;
        $measure->save();
        return $measure;
    }
}
