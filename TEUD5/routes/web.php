<?php

use App\Http\Controllers\DiscoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/canciones', [DiscoController::class, 'index']);
Route::get('/canciones/{id}', [DiscoController::class, 'show']);
Route::post('/canciones', [DiscoController::class, 'store']);
Route::put('/canciones/{id}', [DiscoController::class, 'update']);
Route::delete('/canciones/{id}', [DiscoController::class, 'destroy']);
*/
