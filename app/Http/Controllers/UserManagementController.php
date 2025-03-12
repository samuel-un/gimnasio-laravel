<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManagementController extends Controller
{
    public function index()
    {
        $response = Http::get('https://gimnasios-g4coy481d-samuel-uns-projects.vercel.app/api/gimnasios');
        $gimnasios = $response->successful() ? $response->json() : [];
        $user = auth()->user();

        return view('user-management', compact('gimnasios', 'user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Datos actualizados correctamente.');
    }
}