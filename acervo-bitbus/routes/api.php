<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/visita', 'VisitaController@store');
Route::get('/visita/{id}', 'VisitaController@show');
Route::put('/visita/{id}', 'VisitaController@update');
Route::delete('/visita/{id}', 'VisitaController@delete');
// Route::get('/visita', 'VisitaController@index');