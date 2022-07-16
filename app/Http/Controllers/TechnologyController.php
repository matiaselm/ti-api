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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        //
    }
}
