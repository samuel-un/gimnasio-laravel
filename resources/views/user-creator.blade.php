<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear nueva cuenta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
		background: url('https://res.cloudinary.com/dqcaqvplr/image/upload/v1740396560/rdeprhfbimjhxbqg9xih.png') no-repeat center center fixed;
		background-size: cover;
		position: relative;
	}

	body::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.4);
		z-index: -1;
	}

	header {
		position: relative;
	}

	.logo {
		position: absolute;
		top: 10px;
		left: 10px;
		width: 70px;
		height: 70px;
	}

	h1 {
		font-family: monospace;
		font-size: 2.5rem;
		font-weight: bold;
	}

	.signup-container {
		background-color: #FFC107;
		padding: 2rem;
		border-radius: 15px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
		max-width: 360px;
		width: 100%;
	}
	</style>
</head>

<body class="min-vh-100 d-flex flex-column">
	<header class="text-center py-3 bg-warning">
		<a href="/">
			<img src="https://res.cloudinary.com/dqcaqvplr/image/upload/v1740052973/xzz7r6cldz70lzphtg5p.png" alt="Logo"
				class="logo">
		</a>
		<h1>CREAR NUEVA CUENTA</h1>
	</header>

	<main class="container d-flex justify-content-center align-items-center flex-grow-1">
		<section class="signup-container">
			@if (session('success'))
			<div class="alert alert-success py-2 text-center" role="alert">
				{{ session('success') }}
			</div>
			@endif

			@if ($errors->any())
			<div class="alert alert-danger py-2" role="alert">
				<ul class="mb-0 ps-3">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('user-creator') }}" method="POST" class="d-grid gap-4">
				@csrf

				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required
					value="{{ old('nombre') }}">

				<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required
					value="{{ old('apellidos') }}">

				<input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
					required value="{{ old('email') }}">

				<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"
					required value="{{ old('password') }}">

				<input type="text" class="form-control" id="telefono" name="telefono"
					placeholder="Número de teléfono (opcional)" value="{{ old('telefono') }}">

				<button type="submit" class="btn btn-dark">Crear cuenta</button>
			</form>
		</section>
	</main>

	<script src="{{ asset('js/user-creator.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>