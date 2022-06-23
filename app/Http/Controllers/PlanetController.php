<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ids = NULL)
    {
        $planets = Planet::query();
        if(isset($ids)) {
            $planets->whereIn('id', $ids);
        }
        return response()->json($planets->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $request->all();
        if(is_array($values['planets'])) {
            $ids = [];
            foreach($values['planets'] as $planet) {
                $createdPlanet = Planet::create($planet);
                $ids[] = $createdPlanet->id;
            }
            return $this->index($ids);
        }

        $planet = Planet::create($values);
        return $this->show($planet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Planet::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $planet = Planet::findOrFail($id);
        $planet->fill($request->all());
        $planet->save();

        return $this->show($planet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planet = Planet::findOrFail($id);
        $planet->delete();

        return response()->json(['message' => 'Planet deleted']);
    }
}
