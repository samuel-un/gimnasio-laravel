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
        <section class="bg-gray-500 p-5 rounded lg:">
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
</section>

            <!-- Sección de Reservar Instalaciones -->
            <section class="bg-gray-500 p-5 rounded-lg mt-5">
                <h2 class="text-xl font-bold mb-3">Reservar Instalaciones</h2>
                <div id="instalaciones">
                    <div class="bg-yellow-400 p-3 rounded-lg mb-3 flex">
                        <img src="ruta_imagen_piscina.jpg" alt="Piscina" class="w-20 h-20 rounded-lg">
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
        function actualizarGimnasio() {
            let select = document.getElementById("gimnasios");
            let gimnasioSeleccionado = select.options[select.selectedIndex].text;
            document.getElementById("gimnasio-seleccionado").innerText = gimnasioSeleccionado;
        }

        // Aquí puedes agregar más funciones JavaScript si las necesitas, como reservarHorario()
    </script>
</body>

</html>