<?php

namespace App\Http\Controllers;

use App\Models\Faction;
use App\Models\System;
use App\Models\Planet;
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

        return $this->update($request, $faction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faction  $faction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Faction::with('systems', 'systems.planets')->findOrFail($id));
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
        $values = $request->all();
        $faction->fill($values);
        $faction->save();

        if($request->has('systems')) {
            $systemIds = [];
            foreach($values['systems'] ?? [] as $inputSystem) {
                $system = System::where('number', $inputSystem['number'])->first();
                if(!$system) {
                    $system = new System();
                }
    
                $system->fill([
                    'number'     => $inputSystem['number'],
                    'anomaly_id' => $inputSystem['anomaly_id'] ?? null,
                    'faction_id' => $faction->id,
                ]);
    
                $system->save();
                $systemIds[] = $system->id;

                $planetIds = [];
                foreach($inputSystem['planets'] as $inputPlanet) {
                    $planet = Planet::where('name', $inputPlanet['name'])->first();
                    if(!$planet) {
                        $planet = new Planet();
                    }
    
                    $planet->fill([
                        'name'       => $inputPlanet['name'],
                        'type'       => $inputPlanet['type'],
                        'is_special' => $inputPlanet['is_special'] ?? false,
                        'production' => $inputPlanet['production'],
                        'influence'  => $inputPlanet['influence'],
                        'system_id'  => $system->id,
                    ]);
    
                    $planet->save();
                    $planetIds[] = $planet->id;
                }
                Planet::whereNotIn('id', $planetIds)->where('system_id', $system->id)->delete();
            }
            System::whereNotIn('id', $systemIds)->where('faction_id', $faction->id)->delete();
        }

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
