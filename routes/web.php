<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome'); // Esto es para la ruta principal (Deberia ser landing page)
});

// Ruta para mostrar la vista de crear usuario
Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');

// Ruta para procesar el formulario de creación de usuario
Route::post('/user-creator', [UserController::class, 'store']);
