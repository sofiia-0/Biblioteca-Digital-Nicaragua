<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::apiResource('libros', LibroController::class);
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('prestamos', PrestamoController::class);
});
