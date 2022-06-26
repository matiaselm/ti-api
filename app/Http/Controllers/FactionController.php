<?php

namespace App\Http\Controllers;

use App\Models\Faction;
use Illuminate\Http\Request;

class FactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Faction::with('tendency')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faction = Faction::create($request->all());

        return $this->show($faction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faction  $faction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Faction::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faction  $faction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faction = Faction::findOrFail($id);
        $faction->update($request->all());

        return $this->show($faction->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faction  $faction
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $race = Faction::findOrFail($id);
        $race->delete();

        return response()->json(['message' => 'Faction deleted']);
    }
}
