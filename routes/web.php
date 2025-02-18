<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Ruta principal
Route::get('/', function () {
    return view('welcome'); // Página principal o landing page
});

// Ruta para mostrar la vista de creación de usuario
Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');

// Ruta para procesar el formulario de creación de usuario
Route::post('/user-creator', [UserController::class, 'store']);

// Rutas para el login del usuario
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');
