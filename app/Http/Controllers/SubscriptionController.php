<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    // Método para mostrar la vista con los precios y los planes
    public function index()
    {
        // Obtener los gimnasios desde la API externa
        $response = Http::get('https://gimnasios-g4coy481d-samuel-uns-projects.vercel.app/api/gimnasios');
        
        // Verificar si la respuesta es exitosa
        if ($response->successful()) {
            $gimnasios = $response->json();
        } else {
            $gimnasios = [];
        }

        // Pasar los gimnasios a la vista
        return view('prices', compact('gimnasios'));
    }

    // Método para almacenar la suscripción de un usuario directamente en perfiles
    public function store(Request $request)
    {
        // Validación de datos recibidos
        $request->validate([
            'gimnasio' => 'required|string',
            'plan' => 'required|string',
        ]);

        // Obtener el plan y gimnasio seleccionados, convirtiendo el plan a minúsculas
        $plan = strtolower($request->input('plan'));
        $gimnasio = $request->input('gimnasio');

        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', '¡Necesitas iniciar sesión primero!');
        }

        $usuario = Auth::user(); // Obtener el usuario autenticado

        // Verificar si el usuario ya tiene un plan activo en el modelo Perfil
        if (Perfil::where('id_usuario', $usuario->id)->where('estado_membresia', 'activa')->exists()) {
            return redirect()->route('price-view')->with('error', 'Ya tienes una membresía activa.');
        }

        // Verificar si el plan seleccionado es válido
        if (!in_array($plan, ['comfort', 'premium', 'ultimate'])) {
            return redirect()->route('price-view')->with('error', 'El plan seleccionado no es válido.');
        }

        // Generar fechas para la membresía
        $fechaInicio = Carbon::now()->subDays(rand(0, 30));
        $fechaFin = $fechaInicio->copy()->addDays(30);

        // Crear la membresía directamente en el modelo Perfil
        Perfil::create([
            'id_usuario' => $usuario->id,
            'id_gimnasio' => $gimnasio, // Guardar el gimnasio seleccionado
            'plan_membresia' => $plan,
            'fecha_inicio_membresia' => $fechaInicio,
            'fecha_fin_membresia' => $fechaFin,
            'estado_membresia' => 'activa',
        ]);

        // Redirigir al usuario con un mensaje de éxito a user-management
        return redirect()->route('user-management')->with('success', '¡Suscripción exitosa! Has elegido el plan ' . ucfirst($plan) . ' en ' . $gimnasio);
    }
}