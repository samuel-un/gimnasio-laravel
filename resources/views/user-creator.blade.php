<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nueva cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Crear nueva cuenta</h2>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mensajes de error de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear usuario -->
        <form action="{{ route('user-creator') }}" method="POST">
            @csrf
            <!-- Directiva de seguridad para proteger contra ataques CSRF -->

            <!-- Campo para el nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label"></label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required
                    value="{{ old('nombre') }}">
            </div>

            <!-- Campo para los apellidos -->
            <div class="mb-3">
                <label for="apellidos" class="form-label"></label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required
                    value="{{ old('apellidos') }}">
            </div>

            <!-- Campo para el correo electrónico -->
            <div class="mb-3">
                <label for="email" class="form-label"></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required
                    value="{{ old('email') }}">
            </div>

            <!-- Campo para la contraseña -->
            <div class="mb-3">
                <label for="contraseña" class="form-label"></label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña" required
                    value="{{ old('contraseña') }}">
            </div>

            <!-- Campo para el teléfono (opcional) -->
            <div class="mb-3">
                <label for="telefono" class="form-label">(Opcional)</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono (opcional)"
                    value="{{ old('telefono') }}">
            </div>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-primary">Crear cuenta</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional para funcionalidades extra) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
