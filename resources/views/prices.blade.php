<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Planes y Precios - Gimnasio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
		background-color: #ececec;
	}

	.header {
		background-color: #3c3c3c;
		color: #ffc107;
		padding: 20px 20px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		height: 90px;
	}

	.header span {
		color: white;
	}

	.banner {
		background: url('https://res.cloudinary.com/dqcaqvplr/image/upload/v1740396560/rdeprhfbimjhxbqg9xih.png') no-repeat center center fixed;
		background-size: cover;
		height: 250px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		font-size: 32px;
		font-weight: bold;
	}

	.pricing-section {
		background-color: #f8f8f8;
		padding: 40px;
		text-align: center;
	}

	.card {
		border-radius: 10px;
		padding: 20px;
	}

	.btn-primary,
	.btn-warning,
	.btn-success {
		background-color: #ffc107;
		border: none;
		color: black;
	}

	.footer-text {
		color: red;
		font-weight: bold;
		text-align: center;
		margin-top: 20px;
	}
	</style>
</head>

<body>
	<div class="header">
		<img src="https://chat.google.com/u/0/api/get_attachment_url?url_type=FIFE_URL&content_type=image%2Fpng&attachment_token=AOo0EEXDg3iC8Xn61p0tP7%2BrWXq3BzlVxvg%2BiiFW%2BytzmR%2FkPZ%2FnfnzeI1qzMJr8KVNkrZPTp%2BV8w6Y2BnawILSEhNkSTMqYfTPpuxFC8%2BHNhStJ1Hsm%2F7Ph%2F%2B3nC%2BEncaeHaQ0sWZCe%2BaBkLroc%2BDwZThmBRUJlneyITsOr6tZwAJWwOzcJQmzIIjbh9%2FUGVpU4JrixIrFmT%2BKiMsTHg4SGM%2F7lTKydym1z189kxxw7koR%2Fvd92yCHQP56%2BZO3E5AFQcrVTJRwZ6bv0YqkWILZPMQmxg%2Fp7nnMu9K7VuiR6rNMzn64jgAqu97SQG%2BsX%2FLSoJlfAaDQP1Q14t0OMZ3ZLn5LFlHvyPBFnE38nYoodxIm1Hmj11RM1%2BMTKmBsBZk%2Bcar6QA3ouBE2PWvHH1ucgeyyveCp%2FgHegBxBTK7GrItfhtWWBNX5sFrQV06D1VEXqZSbsxTxKWzpdg205qEC%2Bj2YoMlQn8neAIh2%2F9bkUE0HJq94XiOLu8ydFHLZxqAX%2BLdOamlILJN%2F8J8HrxoDWAhMrOaMpAUbDKojv2arK76EfENLynnwokVeb4DVTtzhbRO2tZ6bAkA%3D%3D&allow_caching=true&sz=w1920-h868&auditContext=forDisplay"
			alt="VAS A LLORAR GYM" style="width: 350px;">
		<div style="display: flex; align-items: center;">
			<span>¡Hola (Usuario)!</span>
		</div>
	</div>

	<div class="banner">SELECCIONA TU ABONO</div>

	<div class="pricing-section">
		<div class="row justify-content-center">
			<!-- Plan Comfort -->
			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Comfort</b></h4>
					<h3>€24,99</h3>
					<p>/ 4 semanas</p>
					<p>- Acceso a todas las instalaciones del gimnasio apuntado.</p>
					<p>- Horario ilimitado.</p>
					<p>- Acceso a la web, pudiendo apuntarte a actividades grupales.</p>
					<p><b>Selecciona el único gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} -
								{{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>


						<input type="hidden" name="plan" value="Comfort">
						<button type="submit" class="btn btn-primary mt-3">ELIGE COMFORT</button>
					</form>
				</div>
			</div>

			<!-- Plan Premium -->
			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Premium</b></h4>
					<h3>€39,99</h3>
					<p>/ 4 semanas</p>
					<p>- Acceso a todas las instalaciones del gimnasio apuntado.</p>
					<p>- Horario ilimitado.</p>
					<p>- Acceso a la web, pudiendo apuntarte a actividades grupales.</p>
					<p>- Acceso a zonas exclusivas y eventos VIP.</p>
					<p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} -
								{{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>
						<input type="hidden" name="plan" value="Premium">
						<button type="submit" class="btn btn-warning mt-3">ELIGE PREMIUM</button>
					</form>
				</div>
			</div>

			<!-- Plan Ultimate -->
			<div class="col-md-3 mx-2">
				<div class="card shadow">
					<h4 class="text-uppercase"><b>Ultimate</b></h4>
					<h3>€59,99</h3>
					<p>/ 4 semanas</p>
					<p>- Acceso a todas las instalaciones del gimnasio apuntado.</p>
					<p>- Horario ilimitado.</p>
					<p>- Acceso a la web, pudiendo apuntarte a actividades grupales.</p>
					<p>- Acceso a zonas exclusivas, eventos VIP y clases premium.</p>
					<p>- Entrenamiento personal disponible.</p>
					<p><b>Selecciona el gimnasio al que tendrás acceso: </b></p>
					<form action="{{ route('price-view.store') }}" method="POST">
						@csrf
						<select name="gimnasio" class="form-control" required>
							<option value="">Elige un gimnasio</option>
							@foreach($gimnasios as $gimnasio)
							<option value="{{ $gimnasio['id'] }}">{{ $gimnasio['nombre'] }} -
								{{ $gimnasio['direccion'] }}</option>
							@endforeach
						</select>
						<input type="hidden" name="plan" value="Ultimate">
						<button type="submit" class="btn btn-success mt-3">ELIGE ULTIMATE</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-text">¡Gracias por elegirnos! - Gimnasio Ficticio</div>
</body>

</html>