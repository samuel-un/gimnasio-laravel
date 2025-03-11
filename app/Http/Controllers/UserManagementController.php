<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Muestra el formulario con la información del usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('user-management', compact('user'));
    }

    /**
     * Actualiza la información del usuario en la base de datos.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        // Validar los datos enviados desde el formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizar los campos del usuario
        $user->nombre = $validated['nombre'];
        $user->apellidos = $validated['apellidos'];
        $user->email = $validated['email'];

        // Actualizar la contraseña solo si se proporciona una nueva
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        //$user->save(); // Guardar los cambios en la base de datos

        return redirect()->back()->with('success', 'Información actualizada correctamente');
    }
}