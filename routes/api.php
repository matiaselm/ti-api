<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# Public routes
Route::prefix('tendencies')->group(function() {
    Route::get('/',  'TendencyController@index');
    Route::post('/', 'TendencyController@create');
});

Route::prefix('races')->group(function() {
    Route::get('/', 'RaceController@index');
});

