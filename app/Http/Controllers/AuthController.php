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

		if (Auth::attempt($credentials, remember: true)) {
			$request->session()->regenerate();

			return redirect()->intended('/')->with('swal', [
				'icon' => 'success',
				'title' => '¡Inicio de sesión exitoso!',
				'text' => 'Bienvenido de nuevo.',
				'timer' => 2200,
				'showConfirmButton' => false,
			]);
		}

		return back()->with('swal', [
			'icon' => 'error',
			'title' => 'Error de acceso',
			'text' => 'Las credenciales no coinciden con nuestros registros.',
		])->withInput();
	}
}
