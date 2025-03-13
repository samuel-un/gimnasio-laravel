<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8',
            'telefono' => 'nullable|string|min:9|max:9',
        ]);

        User::create([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), 
            'telefono' => $validated['telefono'] ?? null,
        ]);

        return redirect()->route('user-creator')->with('success', '¡Cuenta creada exitosamente!');
    }
}