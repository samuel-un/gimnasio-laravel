<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Planes y Precios - Gimnasio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/prices.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="{{ asset('css/swal.css') }}">
</head>

<body>
	<header class="text-center py-3 bg-warning">
		<a href="/">
			<img src="https://res.cloudinary.com/dqcaqvplr/image/upload/v1740052973/xzz7r6cldz70lzphtg5p.png" alt="Logo"
				class="logo" style="position: absolute; top: 10px; left: 10px; width: 70px; height: 70px;"></a>
		<h1>SELECCIONA TU ABONO</h1>
	</header>

	<div class="banner">
		Elige el plan que se adapta a ti y empieza hoy mismo.
	</div>

	<div class="pricing-section">
		<div class="row justify-content-center">
			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Comfort</b></h4>
					<h3>€24,99</h3>
					<p>30 Días</p>
					<p>- Acceso a todas las instalaciones del gimnasio apuntado.</p>
					<p>- Horario ilimitado.</p>
					<p>- Acceso a la web, pudiendo apuntarte a actividades grupales.</p>
					<br>
					<p><b>Selecciona el único gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>
						<input type="hidden" name="plan" value="comfort">
						<button type="submit" class="btn btn-primary mt-3">ELIGE COMFORT</button>
					</form>
				</div>
			</div>

			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Premium</b></h4>
					<h3>€29,99</h3>
					<p>30 Días</p>
					<p><b>Todo desde el plan confort y ademas:</b></p>
					<p>- ¡Acceso ilimitado a todos los clubes de España!</p>
					<p>- Posiblidad de reservar instalaciones.</p>
					<br>
					<p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>
						<input type="hidden" name="plan" value="premium">
						<button type="submit" class="btn btn-warning mt-3">ELIGE PREMIUM</button>
					</form>
				</div>
			</div>

			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Ultimate</b></h4>
					<h3>€44,99</h3>
					<p>30 Días</p>
					<p><b>Todo desde Plan Comfort, y Premium:</b></p>
					<p>- Invita a un amigo de manera ilimitada.</p>
					<p>- Acceso a horarios de los entrenadores y posiblidad de acesoramiento personalizado..</p>
					<br>
					<p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} - {{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>
						<input type="hidden" name="plan" value="ultimate">
						<button type="submit" class="btn btn-success mt-3">ELIGE ULTIMATE</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-text">
		* Para suscribirte a un plan debes tener una
		<a href="/user-access">cuenta</a> primero.
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@include('partials.swal')
</body>

</html>