<?php

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\DiscoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/artistas', [ArtistaController::class, 'index']);
Route::post('/artistas', [ArtistaController::class, 'store']);
Route::get('/artistas/{id}', [ArtistaController::class, 'show']);
Route::put('/artistas/{id}', [ArtistaController::class, 'update']);
Route::delete('/artistas/{id}', [ArtistaController::class, 'destroy']);

Route::get('/canciones', [DiscoController::class, 'index']);
Route::get('/canciones/{id}', [DiscoController::class, 'show']);
Route::post('/canciones', [DiscoController::class, 'store']);
Route::put('/canciones/{id}', [DiscoController::class, 'update']);
Route::delete('/canciones/{id}', [DiscoController::class, 'destroy']);