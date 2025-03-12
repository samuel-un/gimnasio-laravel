<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">
    <div class="flex">
        <!-- Barra lateral (Panel de Gestiones) -->
        <aside class="w-1/4 bg-gray-800 min-h-screen p-5">
            <h2 class="text-lg font-bold mb-5">PANEL DE GESTIONES</h2>
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

        <!-- Contenido principal -->
        <main class="w-3/4 p-10 bg-gray-700 min-h-screen">
            <!-- Sección de Selección de Gimnasio -->
            <section class="bg-gray-500 p-5 rounded-lg">
                <h2 class="text-xl font-bold mb-3">Selecciona un gimnasio:</h2>
                <div>
                    <select id="gimnasios" class="p-2 bg-gray-800 text-white rounded" onchange="actualizarGimnasio()">
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
                <p class="mt-3" id="gimnasio-seleccionado">🏋 Gimnasio seleccionado: <strong id="gimnasio">Ninguno</strong></p>
                <p class="mt-1" id="horario-lectivo">⏰ Horario lectivo: <span id="horario-lectivo-texto">No disponible</span></p>
                <p class="mt-1" id="horario-festivo">⏰ Horario festivo: <span id="horario-festivo-texto">No disponible</span></p>
                <p class="mt-2 text-sm" id="info-cierres">Nuestro gimnasio situado en la calle <strong id="direccion-gimnasio">No disponible</strong> estará cerrado en los siguientes días a lo largo del año: el 1 de enero (Año Nuevo), el 6 de enero (Reyes), el 19 de marzo (Día del Padre), el 1 de mayo (Día del Trabajo), el 15 de agosto (Asunción de la Virgen), el 12 de octubre (Fiesta Nacional), del 13 al 20 de abril (Semana Santa), el 1 de noviembre (Todos los Santos), el 6 de diciembre (Día de la Constitución), el 8 de diciembre (Inmaculada Concepción), el 25 de diciembre (Navidad) y el 31 de diciembre (Nochevieja).</p>
            </section>

            <!-- Sección de Reservar Instalaciones -->
            <section class="bg-gray-500 p-5 rounded-lg mt-5">
                <h2 class="text-xl font-bold mb-3">Reservar Instalaciones</h2>
                <div id="instalaciones">
                    <div class="bg-yellow-400 p-3 rounded-lg mb-3 flex">
                        <img src="https://via.placeholder.com/80" alt="Piscina" class="w-20 h-20 rounded-lg">
                        <div class="ml-4">
                            <h3 class="text-lg font-bold">Piscina</h3>
                            <p>Horario: <span id="horario-piscina">Cargando...</span></p>
                            <p class="mt-2">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha-piscina" class="p-2 bg-gray-800 text-white rounded">
                            </p>
                            <p class="mt-2">
                                <label for="hora">Hora:</label>
                                <select id="hora-piscina" class="p-2 bg-gray-800 text-white rounded">
                                    <option value="">Selecciona una hora</option>
                                </select>
                            </p>
                            <button onclick="reservarHorario(1, 'fecha-piscina', 'hora-piscina')" class="mt-3 bg-blue-500 text-white p-2 rounded">
                                Reservar
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección de Actividades Grupales -->
            <section class="bg-gray-500 p-5 rounded-lg mt-5">
                <h2 class="text-xl font-bold mb-3">Actividades Grupales</h2>
                <div id="actividades">
                    <!-- Mensajes de éxito o error -->
                    @if (session('success'))
                    <div class="bg-green-500 p-3 rounded mb-5 text-white">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="bg-red-500 p-3 rounded mb-5 text-white">
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Lista de actividades -->
                    @php
                        // Función para obtener la URL de la imagen según el nombre de la actividad
                        function getImageUrl($nombre)
                        {
                            $images = [
                                'pilates' => 'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/qfgjbbqh1dxdk6vfd2td.png',
                                'zumba' => 'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/vn3wtwvwfr06t3humvzp.png',
                                'circuitos de entrenamiento personal' => 'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/jthkatfjwqofet5m31ep.png',
                                'deportes de contacto' => 'https://res.cloudinary.com/dqcaqvplr/image/upload/v1741810260/wc6cweq7djn0bdqp2i7d.png'
                            ];
                            return $images[strtolower($nombre)] ?? 'https://via.placeholder.com/80';
                        }
                    @endphp

                    @if(!empty($actividades))
                    @foreach ($actividades as $actividad)
                    <div class="bg-yellow-400 p-3 rounded-lg mb-3 flex">
                        <img src="{{ getImageUrl($actividad->nombre) }}" alt="{{ $actividad->nombre ?? 'Actividad' }}" class="w-20 h-20 rounded-lg">
                        <div class="ml-4">
                            <h3 class="text-lg font-bold">{{ $actividad->nombre ?? 'Sin nombre' }}</h3>
                            <p>Monitor: {{ $actividad->monitor ?? 'No asignado' }}</p>
                            <p>Horario: {{ $actividad->horario ?? 'Sin horario' }}</p>
                            <form action="{{ route('inscripciones.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_actividad" value="{{ $actividad->id_actividad }}">
                                <button type="submit" class="mt-2 bg-blue-500 text-white p-2 rounded">Apuntarse</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No hay actividades grupales disponibles en este momento.</p>
                    @endif
                </div>
            </section>

            <!-- Sección de Gestión de Usuario -->
            <section class="bg-gray-500 p-5 rounded-lg mt-5">
                <h2 class="text-xl font-bold mb-3">Gestión de Usuario</h2>

                <!-- Mensaje de éxito -->
                @if (session('success'))
                <div class="bg-green-500 p-3 rounded mb-5">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Formulario de gestión de usuario -->
                <form method="POST" action="{{ route('user-management.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $user->nombre ?? '' }}"
                            class="mt-1 p-2 w-full bg-gray-800 text-white rounded" required>
                    </div>

                    <!-- Apellidos -->
                    <div>
                        <label for="apellidos" class="block text-sm font-medium">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ $user->apellidos ?? '' }}"
                            class="mt-1 p-2 w-full bg-gray-800 text-white rounded" required>
                    </div>

                    <!-- Correo electrónico -->
                    <div>
                        <label for="email" class="block text-sm font-medium">Correo electrónico</label>
                        <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}"
                            class="mt-1 p-2 w-full bg-gray-800 text-white rounded" required>
                    </div>

                    <!-- Nueva contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium">Nueva contraseña</label>
                        <input type="password" name="password" id="password"
                            placeholder="Dejar en blanco para no cambiar"
                            class="mt-1 p-2 w-full bg-gray-800 text-white rounded">
                    </div>

                    <!-- Confirmar contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium">Confirmar nueva contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="mt-1 p-2 w-full bg-gray-800 text-white rounded">
                    </div>

                    <!-- Botón para guardar cambios -->
                    <button type="submit" class="bg-yellow-400 text-black p-2 rounded">Guardar cambios</button>
                </form>
            </section>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Pasar los datos de gimnasios desde PHP a JavaScript
        const gimnasios = @json($gimnasios ?? []);

        function actualizarGimnasio() {
            let select = document.getElementById("gimnasios");
            let nombreSeleccionado = select.value;
            let gimnasio = gimnasios.find(g => g.nombre === nombreSeleccionado);

            // Actualizar el nombre del gimnasio seleccionado
            let textoGimnasio = gimnasio ? gimnasio.nombre : "Ninguno";
            document.getElementById("gimnasio-seleccionado").innerText = `🏋 Gimnasio seleccionado: ${textoGimnasio}`;

            // Actualizar los horarios del gimnasio seleccionado
            let textoHorarioLectivo = gimnasio && gimnasio.horario_lectivo ? gimnasio.horario_lectivo : "No disponible";
            let textoHorarioFestivo = gimnasio && gimnasio.horario_festivo ? gimnasio.horario_festivo : "No disponible";
            document.getElementById("horario-lectivo").innerText = `⏰ Horario lectivo: ${textoHorarioLectivo}`;
            document.getElementById("horario-festivo").innerText = `⏰ Horario festivo: ${textoHorarioFestivo}`;

            // Actualizar la dirección en el texto de cierres
            let textoDireccion = gimnasio && gimnasio.direccion ? gimnasio.direccion : "No disponible";
            document.getElementById("direccion-gimnasio").innerText = textoDireccion;
        }

        function reservarHorario(instalacionId, fechaId, horaId) {
            let fecha = document.getElementById(fechaId).value;
            let hora = document.getElementById(horaId).value;
            if (fecha && hora) {
                alert(`Reserva realizada para la instalación ${instalacionId} el ${fecha} a las ${hora}`);
            } else {
                alert("Por favor, selecciona una fecha y hora.");
            }
        }
    </script>
</body>

</html>