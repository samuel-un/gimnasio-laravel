<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Ruta principal que ahora apunta directamente a la vista de creación de usuario
Route::get('/', [UserController::class, 'create'])->name('home');

// Ruta para procesar el formulario de creación de usuario
Route::post('/user-creator', [UserController::class, 'store'])->name('user-creator');

// Rutas para el login del usuario
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');

// Mostrar el formulario de inicio de sesión
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login.form');

// Procesar el formulario de inicio de sesión
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');