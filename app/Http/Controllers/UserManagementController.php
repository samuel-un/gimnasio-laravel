<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Inscripcion;
use App\Models\Instalacion;
use App\Models\Reserva;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index()
    {
        $gimnasios = [];
        try {
            $res = Http::timeout(10)->get('https://gimnasios-api.vercel.app/api/gimnasios');
            if ($res->ok()) {
                $data = $res->json();
                $gimnasios = is_array($data) ? $data : [];
            }
        } catch (\Throwable $e) {}

        $user = Auth::user();

        $perfil = null;
        if ($user) {
            $perfil = Perfil::with('gimnasio')
                ->where('id_usuario', $user->id)
                ->where('estado_membresia', 'activa')
                ->latest('fecha_inicio_membresia')
                ->first();
        }

        $actividades   = ($perfil && class_exists(Actividad::class))   ? Actividad::take(4)->get()   : collect();
        $instalaciones = ($perfil && class_exists(Instalacion::class)) ? Instalacion::take(4)->get() : collect();

        return view('user-management', compact('gimnasios', 'perfil', 'actividades', 'instalaciones', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return back()->with('error', 'Debes iniciar sesión.');
        }

        $request->validate([
            'nombre'    => ['required','string','max:255'],
            'apellidos' => ['required','string','max:255'],
            'email'     => ['required','email','max:255','unique:usuarios,email,'.$user->id],
            'password'  => ['nullable','string','min:8','confirmed'],
        ]);

        $user->nombre    = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->email     = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return back()->with('success_usuario', 'Perfil actualizado correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_actividad' => ['required','integer'],
        ]);

        $user = Auth::user();
        if (!$user) {
            return back()->with('error_actividades', 'Debes iniciar sesión para inscribirte.');
        }

        if (class_exists(Inscripcion::class)) {
            $exists = Inscripcion::where('id_usuario', $user->id)
                ->where('id_actividad', $request->id_actividad)
                ->exists();

            if ($exists) {
                return back()->with('error_actividades', 'Ya estás inscrito en esta actividad.');
            }

            Inscripcion::create([
                'id_usuario'   => $user->id,
                'id_actividad' => $request->id_actividad,
            ]);
        }

        return back()->with('success_actividades', 'Te has inscrito correctamente.');
    }

    public function storeReservation(Request $request)
    {
        $request->validate([
            'id_instalacion' => ['required','integer'],
            'fecha_reserva'  => ['required','date'],
            'hora_inicio'    => ['required'],
            'hora_fin'       => ['required'],
        ]);

        $user = Auth::user();
        if (!$user) {
            return back()->with('error_reservas', 'Debes iniciar sesión para reservar.');
        }

        if (class_exists(Reserva::class)) {
            Reserva::create([
                'id_instalacion' => $request->id_instalacion,
                'fecha_reserva'  => $request->fecha_reserva,
                'hora_inicio'    => $request->hora_inicio,
                'hora_fin'       => $request->hora_fin,
            ]);
        }

        return back()->with('success_reservas', 'Reserva realizada correctamente.');
    }
}
