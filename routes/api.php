<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# Public routes
Route::prefix('tendencies')->group(function() {
    Route::get('',  'TendencyController@index');
    Route::post('', 'TendencyController@create');
});

Route::prefix('anomalies')->group(function() {
    Route::get('', 'AnomalyController@getAll');
});

Route::prefix('factions')->group(function() {
    Route::get('',        'FactionController@index');
    Route::get('{id}',    'FactionController@show');
    Route::post('',       'FactionController@store');
    Route::put('{id}',    'FactionController@update');
    Route::delete('{id}', 'FactionController@delete');
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
    Route::put('{id}', 'PlanetController@update');
});
