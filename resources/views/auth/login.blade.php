<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>
	<h1>Iniciar Sesión</h1>

	<!-- Mostrar mensaje de éxito -->
	@if (session('success'))
	<div style="color: green;">
		{{ session('success') }}
	</div>
	@endif

	<!-- Mostrar errores de validación -->
	@if ($errors->any())
	<div style="color: red;">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form method="POST" action="{{ route('login.post') }}">
		@csrf
		<div>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="{{ old('email') }}" required>
		</div>
		<div>
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" required>
		</div>
		<button type="submit">Iniciar Sesión</button>
	</form>

</body>

</html>