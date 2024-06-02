<?php

use App\Http\Controllers\EstadosController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/publicaciones', [PublicacionController::class, 'index']);
Route::post('/publicaciones', [PublicacionController::class, 'store']);
Route::put('/publicaciones/{id}', [PublicacionController::class, 'update']);
Route::delete('/publicaciones/{id}', [PublicacionController::class, 'destroy']);

Route::get('/estudiantes', [EstudiantesController::class, 'index']);
Route::post('/estudiantes', [EstudiantesController::class, 'store']);
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update']);
Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy']);

Route::get('/estados', [EstadosController::class, 'index']);
Route::post('/estados', [EstadosController::class, 'store']);
Route::put('/estados/{id}', [EstadosController::class, 'update']);
Route::delete('/estados/{id}', [EstadosController::class, 'destroy']);

