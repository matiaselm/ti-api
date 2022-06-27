<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;

class SystemController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $ids = NULL)
    {
        $systems = System::query();
        if(isset($ids)) {
            $systems->whereIn('id', $ids);
        }

        if($request->search) {
            $systems->where(function($query) use($request) {
                return $query->whereHas('faction', fn($q) => $q->where('name', 'LIKE', "%{$request->search}%"));
            });
        }

        return response()->json($systems->with('anomaly', 'faction')->withCount('planets')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $system = System::create($request->all());

        return $this->show($system->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(System::with('planets')->findOrFail($id));
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
        $system = System::findOrFail($id);
        $system->update($request->all());
        
        return $this->show($system->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system = System::findOrFail($id);
        $system->delete();

        return response()->json(['message' => 'System deleted']);
    }
}
