<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar Sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
		background: url('https://res.cloudinary.com/dqcaqvplr/image/upload/v1740052536/wijiz7vzbtdmwmc67zg2.png') no-repeat center center fixed;
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

	.login-container {
		background-color: #FFC107;
		padding: 1.5rem;
		border-radius: 15px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
		max-width: 360px;
		width: 100%;
	}

	.btn-dark {
		font-weight: bold;
	}

	.create-account {
		font-size: 0.9rem;
		font-family: monospace;
	}

	.create-account a {
		font-size: 1rem;
		font-weight: bold;
		text-decoration: underline;
		color: #000;
	}
	</style>
</head>

<body class="min-vh-100 d-flex flex-column">
	<header class="text-center py-3 bg-warning">
		<a href="/">
			<img src="https://res.cloudinary.com/dqcaqvplr/image/upload/v1740052973/xzz7r6cldz70lzphtg5p.png" alt="Logo"
				class="logo">
		</a>
		<h1>INICIAR SESIÓN</h1>
	</header>

	<main class="container d-flex justify-content-center align-items-center flex-grow-1">
		<section class="login-container">

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

			<form method="POST" action="{{ route('login.post') }}" class="d-grid gap-3">
				@csrf
				<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
					placeholder="Correo electrónico" required>

				<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña"
					required>

				<button type="submit" class="btn btn-dark">Iniciar sesión</button>
			</form>

			<p class="mt-3 mb-1 text-center create-account">
				Soy nuevo en Vas a llorar GYM.
			</p>
			<div class="text-center">
				<a href="{{ route('user-creator') }}">Crear una cuenta</a>
			</div>
		</section>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="{{ asset('js/user-access.js') }}"></script>
</body>

</html>