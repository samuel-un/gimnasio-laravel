<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación de los campos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Si es exitoso, mostrar mensaje de éxito
            return back()->with('success', '¡Inicio de sesión exitoso!');
        } else {
            // Si no es exitoso, mostrar mensaje de error
            return back()->withErrors([
                'error' => 'Las credenciales no coinciden con nuestros registros.',
            ])->withInput();
        }
    }
}