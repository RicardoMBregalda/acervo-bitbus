<?php

use App\Http\Controllers\OficinaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DoacaoController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('visita', [VisitaController::class, 'store']);
Route::get('visita', [VisitaController::class, 'index']);
Route::get('visita/{id}', [VisitaController::class, 'show']);
Route::put('visita/{id}', [VisitaController::class, 'update']);
Route::delete('visita/{id}', [VisitaController::class, 'delete']);

Route::post('participante', [ParticipanteController::class, 'store']);
Route::get('participante', [ParticipanteController::class, 'index']);
Route::get('participante/{id}', [ParticipanteController::class, 'show']);
Route::put('participante/{id}', [ParticipanteController::class, 'update']);
Route::delete('participante/{id}', [ParticipanteController::class, 'delete']);

Route::post('produto', [ProdutoController::class, 'store']);
Route::get('produto', [ProdutoController::class, 'index']);
Route::get('produto/{id}', [ProdutoController::class, 'show']);
Route::put('produto/{id}', [ProdutoController::class, 'update']);
Route::delete('produto/{id}', [ProdutoController::class, 'delete']);

Route::post('oficina', [OficinaController::class, 'store']);
Route::get('oficina', [OficinaController::class, 'index']);
Route::get('oficina/{id}', [OficinaController::class, 'show']);
Route::put('oficina/{id}', [OficinaController::class, 'update']);
Route::delete('oficina/{id}', [OficinaController::class, 'delete']);

Route::post('doacao', [DoacaoController::class, 'store']);
Route::get('doacao', [DoacaoController::class, 'index']);
Route::get('doacao/{id}', [DoacaoController::class, 'show']);
Route::put('doacao/{id}', [DoacaoController::class, 'update']);
Route::delete('doacao/{id}', [DoacaoController::class, 'delete']);