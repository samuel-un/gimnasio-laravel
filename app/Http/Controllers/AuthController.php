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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return back()->with('success', '¡Inicio de sesión exitoso!');
        } else {
            return back()->withErrors([
                'error' => 'Las credenciales no coinciden con nuestros registros.',
            ])->withInput();
        }
    }
}