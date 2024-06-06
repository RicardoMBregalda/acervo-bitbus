<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitaController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('visita', [VisitaController::class, 'store']);
Route::get('visita', [VisitaController::class, 'index']);
Route::get('visita/{id}', [VisitaController::class, 'show']);
Route::put('visita/{id}', [VisitaController::class, 'update']);
Route::delete('visita/{id}', [VisitaController::class, 'delete']);