<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\TechnologyType;
use App\Models\TechnologyPrerequisite;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $technologies = Technology::with('faction', 'type', 'prerequisites')
            ->where(function($query) use($request) {
                return $query->where('name', 'like', "%{$request->search}%")
                    ->orWhereHas('faction', fn($q) => $q->where('name', 'like', "%{$request->search}%"))
                    ->orWhereHas('type', fn($q) => $q->where(fn($q) =>
                        $q->where('name', 'like', "%{$request->search}%")
                            ->orWhere('color', 'like', "%{$request->search}%")
                    ));
            })
            ->get();

        return response()->json($technologies);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getOne(Request $request, $id)
    {
        return response()->json(Technology::with('faction', 'type', 'prerequisites')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $technology = Technology::create($request->all());
        return $this->getOne($request, $technology->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->update($request->all());

        $saved = [];
        foreach($request->prerequisites as $prerequisite) {
            $prerequisite = TechnologyPrerequisite::create([
                'technology_id'      => $technology->id,
                'technology_type_id' => $prerequisite['id']
            ]);

            $saved[] = $prerequisite->id;
        }
        TechnologyPrerequisite::where('technology_id', $technology->id)->whereNotIn('id', $saved)->delete();

        return $this->getOne($request, $technology->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();
        return response()->json(['success' => true]);   
    }
}
