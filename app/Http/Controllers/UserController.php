<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('user-creator'); // Muestra la vista de creación de cuenta
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'contraseña' => 'required|string|min:8',
            'telefono' => 'nullable|string|min:9|max:9',  // Teléfono es opcional
        ]);

        // Crear el nuevo usuario en la base de datos
        User::create([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'contraseña' => bcrypt($validated['contraseña']), // Encriptar la contraseña
            'telefono' => $validated['telefono'] ?? null, // Si no se proporciona teléfono, se dejará como null
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('user-creator')->with('success', '¡Cuenta creada exitosamente!');
    }
}
