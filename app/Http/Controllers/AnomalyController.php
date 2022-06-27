<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anomaly;

class AnomalyController extends Controller
{
    public function getAll() {
        return response()->json(Anomaly::with('effects')->get());
    }
}
