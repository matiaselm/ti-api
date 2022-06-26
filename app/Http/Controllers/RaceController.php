<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Race::with('tendency')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $race = Race::create($request->all());

        return $this->show($race->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Race::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $race = Race::findOrFail($id);
        $race->update($request->all());

        return $this->show($race->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $race = Race::findOrFail($id);
        $race->delete();

        return response()->json(['message' => 'Race deleted']);
    }
}
