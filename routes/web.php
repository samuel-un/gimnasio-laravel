<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Ruta principal
Route::get('/', function () {
    return view('landing');
});

// Ruta para mostrar la vista de creación de usuario
Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');

// Ruta para procesar el formulario de creación de usuario
Route::post('/user-creator', [UserController::class, 'store']);

// Rutas para el login del usuario
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');

// Mostrar el formulario de inicio de sesión
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login.form');

// Procesar el formulario de inicio de sesión
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');