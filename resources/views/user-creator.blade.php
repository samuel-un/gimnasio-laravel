<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Landing Page - Barra de Navegación</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- (Opcional) Bootstrap Icons para iconos de usuario, etc. -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

	<!-- Barra de navegación -->
	<nav class="navbar navbar-expand-lg" style="background-color: #000;">
		<div class="container">
			<!-- Marca / Logo -->
			<a class="navbar-brand text-warning fw-bold" href="#">
				<!-- Opcional: puedes colocar aquí tu logo con <img> -->
				<!-- <img src="ruta-a-tu-logo.png" alt="Logo" width="40" class="me-2"> -->
				VAS A LLORAR GYM
			</a>

			<!-- Botón "hamburguesa" para móviles -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: none;">
				<span class="navbar-toggler-icon" style="color: #ffc107;"></span>
			</button>

			<!-- Enlaces del menú -->
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link text-light" href="#">Precios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="#">Conócenos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="#">Busca tu club</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="#">Área clientes</a>
					</li>
					<!-- Ejemplo de icono de usuario si lo necesitas -->
					<!-- 
        <li class="nav-item">
          <a class="nav-link text-light" href="#">
            <i class="bi bi-person"></i>
          </a>
        </li>
        -->
				</ul>
			</div>
		</div>
	</nav>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>