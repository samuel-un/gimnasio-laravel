<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // Vista de login (ubicada en resources/views/auth/login.blade.php)
    }

    // Procesa el formulario de login
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required', // Validar el campo 'password' enviado por el formulario
        ]);

        // Intentar autenticar al usuario utilizando el campo 'contraseña' en lugar de 'password'
        if (Auth::attempt(['email' => $credentials['email'], 'contraseña' => $credentials['password']])) {
            return redirect()->intended('/'); // Redirige al dashboard o página principal
        }

        // En caso de error, redirigir con mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
