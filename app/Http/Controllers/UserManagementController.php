<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManagementController extends Controller
{
    public function index()
    {
        $response = Http::get('https://gimnasios-g4coy481d-samuel-uns-projects.vercel.app/api/gimnasios');
        $gimnasios = $response->successful() ? $response->json() : [];
        $user = auth()->user();
        $actividades = Actividad::take(4)->get(); // Limita a 4 actividades

        // Depuración: Descomenta esto para verificar los datos
        // dd($actividades);

        return view('user-management', compact('gimnasios', 'user', 'actividades'));
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

    public function store(Request $request)
    {
        // Validar que id_actividad exista en la tabla actividades_grupales
        $request->validate([
            'id_actividad' => 'required|integer|exists:actividades_grupales,id_actividad',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario está autenticado
        if (!$user) {
            return redirect()->back()->with('error', 'Debes iniciar sesión para inscribirte.');
        }

        // Verificar si el usuario ya está inscrito en esta actividad
        $existingInscripcion = Inscripcion::where('id_usuario', $user->id)
            ->where('id_actividad', $request->id_actividad)
            ->first();

        if ($existingInscripcion) {
            return redirect()->back()->with('error', 'Ya estás inscrito en esta actividad.');
        }

        // Crear una nueva inscripción
        Inscripcion::create([
            'id_usuario' => $user->id,
            'id_actividad' => $request->id_actividad,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Te has inscrito correctamente.');
    }
}
