<?php

namespace App\Http\Controllers;

use App\Models\TechnologyType;
use Illuminate\Http\Request;

class TechnologyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        return response()->json(TechnologyType::get());
    }
}
