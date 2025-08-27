<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function index()
    {
        $response = Http::get('https://gimnasios-g4coy481d-samuel-uns-projects.vercel.app/api/gimnasios');
        
        if ($response->successful()) {
            $gimnasios = $response->json();
        } else {
            $gimnasios = [];
        }

        return view('prices', compact('gimnasios'));
    }

    public function store(Request $request)
    {
		if (!Auth::check()) {
			return redirect()->route('login')
				->with('error', 'Inicia sesión para elegir un plan.');
		}

        $request->validate([
            'gimnasio' => 'required|string',
            'plan' => 'required|string',
        ]);

        $plan = strtolower($request->input('plan'));
        $gimnasio = $request->input('gimnasio');

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', '¡Necesitas iniciar sesión primero!');
        }

        $usuario = Auth::user();

        if (Perfil::where('id_usuario', $usuario->id)->where('estado_membresia', 'activa')->exists()) {
            return redirect()->route('price-view')->with('error', 'Ya tienes una membresía activa.');
        }

        if (!in_array($plan, ['comfort', 'premium', 'ultimate'])) {
            return redirect()->route('price-view')->with('error', 'El plan seleccionado no es válido.');
        }

        $fechaInicio = Carbon::now()->subDays(rand(0, 30));
        $fechaFin = $fechaInicio->copy()->addDays(30);

        Perfil::create([
            'id_usuario' => $usuario->id,
            'id_gimnasio' => $gimnasio,
            'plan_membresia' => $plan,
            'fecha_inicio_membresia' => $fechaInicio,
            'fecha_fin_membresia' => $fechaFin,
            'estado_membresia' => 'activa',
        ]);

        return redirect()->route('user-management')->with('success', '¡Suscripción exitosa! Has elegido el plan ' . ucfirst($plan) . ' en ' . $gimnasio);
    }
}