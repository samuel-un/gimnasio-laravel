<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Inscripcion;
use App\Models\Instalacion;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManagementController extends Controller
{
    public function index()
    {
        $response = Http::get('https://gimnasios-g4coy481d-samuel-uns-projects.vercel.app/api/gimnasios');
        $gimnasios = $response->successful() ? $response->json() : [];
        $user = auth()->user();
        $actividades = Actividad::take(4)->get();
        $instalaciones = Instalacion::take(4)->get();

        return view('user-management', compact('gimnasios', 'user', 'actividades', 'instalaciones'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success_usuario', 'Datos actualizados correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_actividad' => 'required|integer|exists:actividades_grupales,id_actividad',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error_actividades', 'Debes iniciar sesión para inscribirte.');
        }

        $existingInscripcion = Inscripcion::where('id_usuario', $user->id)
            ->where('id_actividad', $request->id_actividad)
            ->first();

        if ($existingInscripcion) {
            return redirect()->back()->with('error_actividades', 'Ya estás inscrito en esta actividad.');
        }

        Inscripcion::create([
            'id_usuario' => $user->id,
            'id_actividad' => $request->id_actividad,
        ]);

        return redirect()->back()->with('success_actividades', 'Te has inscrito correctamente.');
    }

    public function storeReservation(Request $request)
    {
        $request->validate([
            'id_instalacion' => 'required|integer|exists:instalaciones,id_instalacion',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error_reservas', 'Debes iniciar sesión para reservar.');
        }

        Reserva::create([
            'id_instalacion' => $request->id_instalacion,
            'fecha_reserva' => $request->fecha_reserva,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);

        return redirect()->back()->with('success_reservas', 'Reserva realizada correctamente.');
    }
}