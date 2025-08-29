<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gestión de Usuarios</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
		background-color: #000000;
		color: #ffffff;
	}

	header {
		position: relative;
		height: 90px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	header h1 {
		margin: 0;
		font-size: 2.5rem;
		font-weight: 700;
		color: #000000;
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
	}

	aside {
		background-color: #1f1f1f;
		min-height: 100vh;
		padding: 20px;
	}

	main {
		background-color: #1f1f1f;
		padding: 40px;
		min-height: 100vh;
		width: 75%;
	}

	section {
		background-color: #2e2e2e;
		padding: 20px;
		border-radius: 8px;
	}

	select,
	input {
		background-color: #2e2e2e;
		color: #ffffff;
		border: 1px solid #1f1f1f;
		border-radius: 4px;
	}

	button:not(.bg-yellow-400):not(.reserve-button):not(.join-button):not(.logout-button) {
		background-color: #2e2e2e;
		color: #ffffff;
		padding: 8px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	button:not(.bg-yellow-400):not(.reserve-button):not(.join-button):not(.logout-button):hover {
		background-color: #1f1f1f;
	}

	.reserve-button,
	.join-button {
		background-color: #8c8c8c;
		color: #ffffff;
		padding: 8px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	.reserve-button:hover,
	.join-button:hover {
		background-color: #6c6c6c;
	}

	.logout-button {
		background-color: #ff0000;
		color: #ffffff;
		padding: 8px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		margin-top: 16px;
	}

	.logout-button:hover {
		background-color: #cc0000;
	}

	a:not(.text-yellow-400) {
		color: #ffffff;
	}

	a:not(.text-yellow-400):hover {
		color: #2e2e2e;
	}

	.bg-green-500 {
		background-color: #1f1f1f !important;
	}

	.bg-red-500 {
		background-color: #2e2e2e !important;
	}
	</style>
</head>

<body>
	<header class="bg-warning py-3">
		<a href="/">
			<img src="https://res.cloudinary.com/dqcaqvplr/image/upload/v1740052973/xzz7r6cldz70lzphtg5p.png" alt="Logo"
				class="logo" style="position: absolute; top: 10px; left: 10px; width: 70px; height: 70px;">
		</a>
		<h1>GESTIÓN DE USUARIO</h1>
	</header>
	<div class="flex">
		<aside class="w-1/4 p-5">
			<h2 class="text-lg font-bold mb-5 text-white">PANEL DE GESTIONES</h2>
			<nav>
				<ul class="space-y-3">
					<li class="text-yellow-400 font-semibold">Reservar instalaciones</li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Piscina</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Sauna</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Sala de yoga/meditación</a></li>
					<li class="text-yellow-400 font-semibold mt-4">Actividades grupales</li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Zumba</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Body Combat</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Pilates</a></li>
					<li class="text-yellow-400 font-semibold mt-4">Gestión de usuario</li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Correo electrónico</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Contraseña</a></li>
					<li class="pl-3"><a href="#" class="hover:text-yellow-300">Información personal</a></li>
				</ul>
			</nav>
		</aside>
		<main class="w-3/4 p-10">

            {{-- NUEVO: bloque de membresía --}}
            @if(isset($perfil) && $perfil)
            <section class="p-5 rounded-lg mb-5">
                <h2 class="text-xl font-bold mb-3 text-white">Tu membresía</h2>
                <p class="text-white mb-1">Plan: <span class="text-yellow-400">{{ ucfirst($perfil->plan_membresia) }}</span> ({{ $perfil->estado_membresia }})</p>
                <p class="text-white mb-1">Gimnasio: {{ optional($perfil->gimnasio)->nombre }} — {{ optional($perfil->gimnasio)->direccion }}</p>
                <p class="text-white mb-0">Periodo: {{ optional($perfil->fecha_inicio_membresia)->format('d/m/Y') }} — {{ optional($perfil->fecha_fin_membresia)->format('d/m/Y') }}</p>
            </section>
            @endif

			<section class="p-5 rounded-lg">
				<h2 class="text-xl font-bold mb-3 text-white">Selecciona un gimnasio:</h2>
				<div>
					<select id="gimnasios" class="p-2 rounded" onchange="actualizarGimnasio()">
						<option value="">Selecciona un gimnasio</option>
						@if(!empty($gimnasios))
						@foreach($gimnasios as $gimnasio)
						<option value="{{ $gimnasio['nombre'] }}">{{ $gimnasio['nombre'] }}</option>
						@endforeach
						@else
						<option value="">No hay gimnasios disponibles</option>
						@endif
					</select>
				</div>
				<p class="mt-3 text-white" id="gimnasio-seleccionado">🏋 Gimnasio seleccionado: <strong
						id="gimnasio">Ninguno</strong></p>
				<p class="mt-1 text-white" id="horario-lectivo">⏰ Horario lectivo: <span id="horario-lectivo-texto">No
						disponible</span></p>
				<p class="mt-1 text-white" id="horario-festivo">⏰ Horario festivo: <span id="horario-festivo-texto">No
						disponible</span></p>
				<p class="mt-2 text-gray-400" id="info-cierres">
					Nuestro gimnasio situado en la calle <strong id="direccion-gimnasio">No disponible</strong> estará
					cerrado en los siguientes días a lo largo del año: el 1 de enero (Año Nuevo), el 6 de enero (Reyes),
					el 19 de marzo (Día del Padre), el 1 de mayo (Día del Trabajo), el 15 de agosto (Asunción de la
					Virgen), el 12 de octubre (Fiesta Nacional), del 13 al 20 de abril (Semana Santa), el 1 de noviembre
					(Todos los Santos), el 6 de diciembre (Día de la Constitución), el 8 de diciembre (Inmaculada
					Concepción), el 25 de diciembre (Navidad) y el 31 de diciembre (Nochevieja).
				</p>
			</section>
			<section class="p-5 rounded-lg mt-5">
				<h2 class="text-xl font-bold mb-3 text-white">Reservar Instalaciones</h2>
				<div id="instalaciones">
					@if (session('success_reservas'))
					<div class="p-3 rounded mb-5 text-white" style="background-color: #1f1f1f;">
						{{ session('success_reservas') }}
					</div>
					@endif
					@if (session('error_reservas'))
					<div class="p-3 rounded mb-5 text-white" style="background-color: #2e2e2e;">
						{{ session('error_reservas') }}
					</div>
					@endif
					@if(!empty($instalaciones))
					<div class="grid grid-cols-2 gap-4">
						@php
						function getImageUrlForInstalaciones($nombre)
						{
						$images = [
						'sauna' => 'https://res.cloudinary.com/dup51jxlj/image/upload/v1741854928/image_80_yjuach.png',
						'piscina' =>
						'https://res.cloudinary.com/dup51jxlj/image/upload/v1741854928/image_79_ml8onb.png',
						'pista de padel' =>
						'https://res.cloudinary.com/dup51jxlj/image/upload/v1741854928/0b5a1993-7eab-42d2-b85e-e947cbd5a751_k9ac8f.jpg',
						'pista de baloncesto' =>
						'https://res.cloudinary.com/dup51jxlj/image/upload/v1741854928/20230918_Pista_baloncesto_sOlivera_3F-ef10d2bb_cyrwgk.jpg'
						];
						return $images[strtolower($nombre)] ?? 'https://via.placeholder.com/80';
						}
						@endphp
						@foreach($instalaciones as $instalacion)
						<div class="bg-yellow-400 p-3 rounded-lg flex">
							<img src="{{ getImageUrlForInstalaciones($instalacion->nombre_instalacion) }}"
								alt="{{ $instalacion->nombre_instalacion }}" class="w-16 h-16 rounded-lg">
							<div class="ml-3 flex-1">
								<h3 class="text-md font-bold text-black">{{ $instalacion->nombre_instalacion }}</h3>
								<p class="text-sm text-gray-700">Lun-Vie:
									{{ $instalacion->horario_lun_vie ?? 'No disponible' }}</p>
								<p class="text-sm text-gray-700">Sáb-Dom/Fest:
									{{ $instalacion->horario_sab_dom_fest ?? 'No disponible' }}</p>
								<form action="{{ route('reservas.store') }}" method="POST">
									@csrf
									<input type="hidden" name="id_instalacion"
										value="{{ $instalacion->id_instalacion }}">
									<p class="mt-1">
										<label for="fecha_reserva_{{ $instalacion->id_instalacion }}"
											class="text-sm text-black">Fecha:</label>
										<input type="date" id="fecha_reserva_{{ $instalacion->id_instalacion }}"
											name="fecha_reserva" class="p-1 rounded w-full">
									</p>
									<p class="mt-1">
										<label for="hora_inicio_{{ $instalacion->id_instalacion }}"
											class="text-sm text-black">Hora inicio:</label>
										<input type="time" id="hora_inicio_{{ $instalacion->id_instalacion }}"
											name="hora_inicio" class="p-1 rounded w-full">
									</p>
									<p class="mt-1">
										<label for="hora_fin_{{ $instalacion->id_instalacion }}"
											class="text-sm text-black">Hora fin:</label>
										<input type="time" id="hora_fin_{{ $instalacion->id_instalacion }}"
											name="hora_fin" class="p-1 rounded w-full">
									</p>
									<button type="submit"
										class="mt-2 p-1 rounded w-full reserve-button">Reservar</button>
								</form>
							</div>
						</div>
						@endforeach
					</div>
					@else
					<p class="text-white">No hay instalaciones disponibles en este momento.</p>
					@endif
				</div>
			</section>
			<section class="p-5 rounded-lg mt-5">
				<h2 class="text-xl font-bold mb-3 text-white">Actividades Grupales</h2>
				<div id="actividades">
					@if (session('success_actividades'))
					<div class="p-3 rounded mb-5 text-white" style="background-color: #1f1f1f;">
						{{ session('success_actividades') }}
					</div>
					@endif
					@if (session('error_actividades'))
					<div class="p-3 rounded mb-5 text-white" style="background-color: #2e2e2e;">
						{{ session('error_actividades') }}
					</div>
					@endif
					@php
					function getImageUrl($nombre)
					{
					$images = [
					'pilates' =>
					'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/qfgjbbqh1dxdk6vfd2td.png',
					'zumba' => 'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/vn3wtwvwfr06t3humvzp.png',
					'circuitos de entrenamiento personal' =>
					'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/jthkatfjwqofet5m31ep.png',
					'deportes de contacto' =>
					'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/wc6cweq7djn0bdqp2i7d.png'
					];
					return $images[strtolower($nombre)] ?? 'https://via.placeholder.com/80';
					}
					@endphp
					@if(!empty($actividades))
					<div class="grid grid-cols-2 gap-4">
						@foreach($actividades as $actividad)
						<div class="bg-yellow-400 p-3 rounded-lg flex">
							<img src="{{ getImageUrl($actividad->nombre) }}"
								alt="{{ $actividad->nombre ?? 'Actividad' }}" class="w-16 h-16 rounded-lg">
							<div class="ml-3 flex-1">
								<h3 class="text-md font-bold text-black">{{ $actividad->nombre ?? 'Sin nombre' }}</h3>
								<p class="text-sm text-gray-700">Monitor: {{ $actividad->monitor ?? 'No asignado' }}</p>
								<p class="text-sm text-gray-700">Horario: {{ $actividad->horario ?? 'Sin horario' }}</p>
								<form action="{{ route('inscripciones.store') }}" method="POST">
									@csrf
									<input type="hidden" name="id_actividad" value="{{ $actividad->id_actividad }}">
									<button type="submit" class="mt-2 p-1 rounded w-full join-button">Apuntarse</button>
								</form>
							</div>
						</div>
						@endforeach
					</div>
					@else
					<p class="text-white">No hay actividades grupales disponibles en este momento.</p>
					@endif
				</div>
			</section>
			<section class="p-5 rounded-lg mt-5">
				<h2 class="text-xl font-bold mb-3 text-white">Gestión de Usuario</h2>
				@if (session('success_usuario'))
				<div class="p-3 rounded mb-5 text-white" style="background-color: #1f1f1f;">
					{{ session('success_usuario') }}
				</div>
				@endif
				<form method="POST" action="{{ route('user-management.update') }}" class="space-y-4">
					@csrf
					@method('PUT')
					<div>
						<label for="nombre" class="block text-sm font-medium text-white">Nombre</label>
						<input type="text" name="nombre" id="nombre" value="{{ $user->nombre ?? '' }}"
							class="mt-1 p-2 w-full rounded" style="background-color: #2e2e2e; color: #ffffff;" required>
					</div>
					<div>
						<label for="apellidos" class="block text-sm font-medium text-white">Apellidos</label>
						<input type="text" name="apellidos" id="apellidos" value="{{ $user->apellidos ?? '' }}"
							class="mt-1 p-2 w-full rounded" style="background-color: #2e2e2e; color: #ffffff;" required>
					</div>
					<div>
						<label for="email" class="block text-sm font-medium text-white">Correo electrónico</label>
						<input type="email" name="email" id="email" value="{{ $user->email ?? '' }}"
							class="mt-1 p-2 w-full rounded" style="background-color: #2e2e2e; color: #ffffff;" required>
					</div>
					<div>
						<label for="password" class="block text-sm font-medium text-white">Nueva contraseña</label>
						<input type="password" name="password" id="password"
							placeholder="Dejar en blanco para no cambiar" class="mt-1 p-2 w-full rounded"
							style="background-color: #2e2e2e; color: #ffffff;">
					</div>
					<div>
						<label for="password_confirmation" class="block text-sm font-medium text-white">Confirmar nueva
							contraseña</label>
						<input type="password" name="password_confirmation" id="password_confirmation"
							class="mt-1 p-2 w-full rounded" style="background-color: #2e2e2e; color: #ffffff;">
					</div>
					<button type="submit" class="bg-yellow-400 text-black p-2 rounded">Guardar cambios</button>
				</form>
				<form method="POST" action="{{ route('logout') }}" class="mt-4">
					@csrf
					<button type="submit" class="logout-button p-2.5 rounded">Cerrar Sesión</button>
				</form>
			</section>
		</main>
	</div>
	<script>
	const gimnasios = @json($gimnasios ?? []);

	function actualizarGimnasio() {
		let select = document.getElementById("gimnasios");
		let nombreSeleccionado = select.value;
		let gimnasio = gimnasios.find(g => g.nombre === nombreSeleccionado);
		let textoGimnasio = gimnasio ? gimnasio.nombre : "Ninguno";
		document.getElementById("gimnasio-seleccionado").innerText = `🏋 Gimnasio seleccionado: ${textoGimnasio}`;
		let textoHorarioLectivo = gimnasio && gimnasio.horario_lectivo ? gimnasio.horario_lectivo : "No disponible";
		let textoHorarioFestivo = gimnasio && gimnasio.horario_festivo ? gimnasio.horario_festivo : "No disponible";
		document.getElementById("horario-lectivo").innerText = `⏰ Horario lectivo: ${textoHorarioLectivo}`;
		document.getElementById("horario-festivo").innerText = `⏰ Horario festivo: ${textoHorarioFestivo}`;
		let textoDireccion = gimnasio && gimnasio.direccion ? gimnasio.direccion : "No disponible";
		document.getElementById("direccion-gimnasio").innerText = textoDireccion;
	}

    {{-- NUEVO: preseleccionar el gimnasio del perfil y actualizar datos --}}
    @if(isset($perfil) && $perfil && optional($perfil->gimnasio)->nombre)
    document.addEventListener('DOMContentLoaded', function(){
        var sel = document.getElementById('gimnasios');
        if (sel) {
            var target = @json(optional($perfil->gimnasio)->nombre);
            for (var i=0;i<sel.options.length;i++){
                if (sel.options[i].value === target) { sel.selectedIndex = i; break; }
            }
            actualizarGimnasio();
        }
    });
    @endif
	</script>
</body>

</html>
