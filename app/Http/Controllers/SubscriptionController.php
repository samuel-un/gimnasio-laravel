<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Perfil;
use App\Models\Subscription;
use App\Models\Gimnasio;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function index()
    {
        $gimnasios = Gimnasio::select('id', 'nombre', 'direccion')->get()->toArray();
        return view('prices', compact('gimnasios'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Inicia sesión para elegir un plan.');
        }

        $request->validate([
            'gimnasio' => 'required|integer|exists:gimnasios,id',
            'plan'     => 'required|string|in:comfort,premium,ultimate',
        ]);

        $plan       = strtolower($request->input('plan'));
        $gimnasioId = (int) $request->input('gimnasio');
        $usuario    = Auth::user();

        if (Perfil::where('id_usuario', $usuario->id)->where('estado_membresia', 'activa')->exists()) {
            return redirect()->route('price-view')->with('error', 'Ya tienes una membresía activa.');
        }

        $inicio = now()->subDays(random_int(0, 30));
        $fin    = $inicio->copy()->addDays(30);

        try {
            Perfil::create([
                'id_usuario'             => $usuario->id,
                'id_gimnasio'            => $gimnasioId,
                'plan_membresia'         => $plan,
                'fecha_inicio_membresia' => $inicio->toDateString(),
                'fecha_fin_membresia'    => $fin->toDateString(),
                'estado_membresia'       => 'activa',
            ]);
        } catch (\Throwable $e) {
            Log::warning('Fallo al crear Perfil, guardando en Subscription', [
                'user_id'    => $usuario->id,
                'gimnasioId' => $gimnasioId,
                'error'      => $e->getMessage(),
            ]);

            Subscription::create([
                'user_id'  => $usuario->id,
                'plan'     => $plan,
                'gimnasio' => (string) $gimnasioId,
            ]);
        }

        return redirect()
            ->route('user-management')
            ->with('success', '¡Suscripción exitosa! Has elegido el plan ' . ucfirst($plan) . '.');
    }
}
