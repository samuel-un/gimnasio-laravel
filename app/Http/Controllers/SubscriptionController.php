<?php

namespace App\Http\Controllers;

use App\Models\Gimnasio;
use App\Models\Perfil;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
	public function index()
	{
		$endpoint = 'https://gimnasios-api.vercel.app/api/gimnasios';
		$gimnasios = [];
		try {
			$res = Http::timeout(10)->get($endpoint);
			if ($res->ok()) {
				$data = $res->json();
				$gimnasios = is_array($data) ? $data : [];
			}
		} catch (\Throwable $e) {
		}
		return view('prices', compact('gimnasios'));
	}

	public function store(Request $request)
	{
		$usuarioId = Auth::id();
		if (!$usuarioId) {
			return redirect()->route('login.show')->with('swal', [
				'icon'  => 'info',
				'title' => 'Inicia sesión',
				'text'  => 'Debes iniciar sesión para suscribirte.',
			]);
		}

		$validated = $request->validate([
			'gimnasio' => ['required', 'integer', 'min:1'],
			'plan'     => ['required', Rule::in(['comfort', 'premium', 'ultimate'])],
		]);

		$apiId = (int) $validated['gimnasio'];
		$plan  = strtolower($validated['plan']);

		$detailEndpoint = "https://gimnasios-api.vercel.app/api/gimnasios/{$apiId}";
		try {
			$detail = Http::timeout(10)->get($detailEndpoint);
		} catch (\Throwable $e) {
			return back()->with('swal', [
				'icon'  => 'error',
				'title' => 'Sin conexión',
				'text'  => 'No se pudo contactar con la API de gimnasios.',
			]);
		}

		if (!$detail->ok()) {
			return back()->with('swal', [
				'icon'  => 'error',
				'title' => 'Gimnasio inválido',
				'text'  => 'El gimnasio seleccionado no es válido.',
			]);
		}

		$g = $detail->json();
		if (!is_array($g) || empty($g)) {
			return back()->with('swal', [
				'icon'  => 'error',
				'title' => 'Respuesta inválida',
				'text'  => 'Respuesta inválida de la API de gimnasios.',
			]);
		}

		$nombre    = $g['nombre']           ?? 'Gimnasio sin nombre';
		$direccion = $g['direccion']        ?? 'Dirección no disponible';
		$provincia = $g['provincia']        ?? 'N/D';
		$hLectivo  = $g['horario_lectivo']  ?? 'N/D';
		$hFestivo  = $g['horario_festivo']  ?? 'N/D';

		try {
			DB::beginTransaction();

			$gym = Gimnasio::firstOrCreate(
				['nombre' => $nombre, 'direccion' => $direccion],
				['provincia' => $provincia, 'horario_lectivo' => $hLectivo, 'horario_festivo' => $hFestivo]
			);

			Perfil::where('id_usuario', $usuarioId)
				->where('estado_membresia', 'activa')
				->update(['estado_membresia' => 'inactiva']);

			Perfil::updateOrCreate(
				['id_usuario' => $usuarioId],
				[
					'id_gimnasio'            => $gym->id,
					'plan_membresia'         => $plan,
					'fecha_inicio_membresia' => Carbon::today(),
					'fecha_fin_membresia'    => Carbon::today()->addWeeks(4),
					'estado_membresia'       => 'activa',
				]
			);

			try {
				if (class_exists(Subscription::class)) {
					Subscription::create([
						'user_id'  => $usuarioId,
						'plan'     => $plan,
						'gimnasio' => (string) $apiId,
					]);
				}
			} catch (\Throwable $e) {
			}

			DB::commit();
		} catch (\Throwable $e) {
			DB::rollBack();
			return back()->with('swal', [
				'icon'  => 'error',
				'title' => 'Error al guardar',
				'text'  => 'No se pudo guardar la suscripción. Inténtalo de nuevo.',
			]);
		}

		return redirect()
			->route('user-management.index')
			->with('swal', [
				'icon'  => 'success',
				'title' => '¡Suscripción guardada!',
				'text'  => 'Has elegido el plan ' . ucfirst($plan) . ' en ' . $nombre . '.',
				'timer' => 2200,
				'showConfirmButton' => false,
			]);
	}
}
