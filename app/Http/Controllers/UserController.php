<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
	public function create()
	{
		return view('user-creator');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'nombre'    => 'required|string|max:255',
			'apellidos' => 'required|string|max:255',
			'email'     => 'required|email:rfc,dns|unique:usuarios,email',
			'password'  => 'required|string|min:8',
			'telefono'  => 'nullable|string|min:9|max:9',
		]);

		$user = User::create([
			'nombre'    => $validated['nombre'],
			'apellidos' => $validated['apellidos'],
			'email'     => $validated['email'],
			'password'  => $validated['password'], // cast 'hashed' en el modelo
			'telefono'  => $validated['telefono'] ?? null,
		]);

		Auth::login($user, remember: true);
		$request->session()->regenerate();

		return redirect()->intended('/')->with('swal', [
			'icon' => 'success',
			'title' => '¡Cuenta creada!',
			'text' => 'Has iniciado sesión correctamente.',
			'timer' => 2200,
			'showConfirmButton' => false,
		]);
	}
}
