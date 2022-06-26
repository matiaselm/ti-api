<?php

namespace App\Http\Controllers;

use App\Models\Tendency;
use Illuminate\Http\Request;

class TendencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Tendency::with('factions')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tendency = new Tendency();

        \Log::info(json_encode($request->all()));

        $tendency->fill($request->all());
        $tendency->save();

        return response()->json($tendency);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tendency  $tendency
     * @return \Illuminate\Http\Response
     */
    public function show(Tendency $tendency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tendency  $tendency
     * @return \Illuminate\Http\Response
     */
    public function edit(Tendency $tendency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tendency  $tendency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tendency $tendency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tendency  $tendency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tendency $tendency)
    {
        //
    }
}
