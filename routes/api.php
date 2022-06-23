<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# Public routes
Route::prefix('tendencies')->group(function() {
    Route::get('',  'TendencyController@index');
    Route::post('', 'TendencyController@create');
});

Route::prefix('races')->group(function() {
    Route::get('',     'RaceController@index');
    Route::get('{id}', 'RaceController@show');
    Route::post('',    'RaceController@store');
    Route::put('{id}', 'RaceController@update');
});

Route::prefix('systems')->group(function() {
    Route::get('',     'SystemController@index');
    Route::get('{id}', 'SystemController@show');
    Route::post('',    'SystemController@store');
    Route::put('{id}', 'SystemController@update');
});

Route::prefix('planets')->group(function() {
    Route::get('',     'PlanetController@index');
    Route::get('{id}', 'PlanetController@show');
    Route::post('',    'PlanetController@store');
    Route::put('{id}', 'SystemController@update');
});
