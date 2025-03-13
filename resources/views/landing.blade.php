<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Vas a Llorar GYM - Landing</title>
	<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
	<header>
		<nav>
			<div class="nav-left">
				<img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1740490225/Landing-page%20GYM/logo-letras.png"
					alt="Logo Vas a Llorar GYM" class="gym-logo" />
			</div>
			<div class="nav-right">
				<ul class="nav-menu">
					<li><a href="/price-view">PRECIOS</a></li>
					<li><a href="#por-que-elegir">CONÓCENOS</a></li>
					<li><a href="#busca-club">BUSCA TU CLUB</a></li>
				</ul>
				@auth
				<a href="/user-management" class="client-access">
					<span>ÁREA CLIENTES</span>
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/cuenta_2_s4gs1a.png"
						alt="Icono Perfil" class="profile-icon" />
				</a>
				@else
				<a href="/user-access" class="client-access">
					<span>ÁREA CLIENTES</span>
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/cuenta_2_s4gs1a.png"
						alt="Icono Perfil" class="profile-icon" />
				</a>
				@endauth
			</div>

		</nav>
	</header>

	<section class="hero" id="hero">
		<div class="hero-content">
			<h1>LLORA HOY, PERO SONRÍE MAÑANA</h1>
			<p>¡Bienvenido a tu nuevo reto de entrenamiento!</p>
			<a href="#por-que-elegir" class="btn-cta">Conoce más</a>
		</div>
	</section>

	<section class="why-choose" id="por-que-elegir">
		<div class="container">
			<h2>POR QUÉ ELEGIR VAS A LLORAR GYM</h2>
			<p>
				Somos el gimnasio para quienes buscan resultados reales, sin excusas. En
				<strong>VAS A LLORAR GYM</strong>, te ofrecemos una experiencia intensa
				para llegar más lejos de lo que jamás pensaste.
			</p>
			<div class="features">
				<div class="feature"
					style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/image_57_y48fei.png');">
					<h3>Fuerza</h3>
					<p>Fortalece tus músculos y tu determinación.</p>
				</div>
				<div class="feature"
					style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_59_zsfsru.png');">
					<h3>Rendimiento</h3>
					<p>Maximiza tu desempeño atlético con nuestras rutinas.</p>
				</div>
				<div class="feature"
					style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_58_myyh3z.png');">
					<h3>Resistencia</h3>
					<p>Entrena para soportar las rutinas más intensas.</p>
				</div>
			</div>
		</div>
	</section>



	<section class="trainers" id="entrenadores">
		<div class="container">
			<h2>LOS MEJORES ENTRENADORES, PARA TU MEJOR VERSIÓN</h2>
			<p>
				Te presentamos a los profesionales que te acompañarán en tu camino al éxito. Consulta sus horarios y
				entrena bajo su supervisión.
			</p>
			<div class="trainer-cards">
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDePesas_wm1qsc.png"
						alt="Entrenador 1" />
					<h3>Carlos Forza</h3>
					<p>
						Con Carlos Forza, jefe de entrenadores de fuerza y pesas, cada repetición te acerca a tu máximo
						potencial.
					</p>
				</div>
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDeCardio_wwkcj0.png"
						alt="Entrenador 2" />
					<h3>Marco Sprint</h3>
					<p>Mejora tu cardio, bajo el liderazgo de Marco Sprint y su equipo de entrenadores.</p>
				</div>
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/freepik__35mm-film-photography-a-female-fitness-instructor-__60087_1_fvyj5u.png"
						alt="Entrenador 3" />
					<h3>Marta Vibe</h3>
					<p>Con Marta Vibe, jefa de actividades para socializar, divertirse y mejorar tu salud, disfrutarás
						mientras te pones en forma haciendo lo que más te gusta.</p>
				</div>
			</div>
		</div>
		<section class="gym-container">
			<section id="busca-club" class="gym-search">
				<h2>Busca tu Club</h2>
				<input type="text" id="busqueda" placeholder="Ingrese provincia">
				<button onclick="buscar()">Buscar</button>
				<section class="search-results" id="resultados"></section>
			</section>

			<section id="mapa-container">
				<h2>Ubicación del Gimnasio</h2>
				<iframe id="mapa" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade">
				</iframe>
			</section>
		</section>

		<script>
		async function buscar() {
			const inputBusqueda = document.getElementById("busqueda").value.trim().toLowerCase();
			const resultadosContainer = document.getElementById("resultados");
			const mapaIframe = document.getElementById("mapa");

			resultadosContainer.innerHTML = "";

			if (!inputBusqueda) {
				resultadosContainer.innerHTML = "<p>Por favor, ingrese una provincia.</p>";
				return;
			}

			try {
				const response = await fetch("data/gimnasios.json");
				if (!response.ok) {
					console.error("Error al cargar el JSON. Código: ", response.status);
					resultadosContainer.innerHTML = "<p>Error al cargar el archivo JSON.</p>";
					return;
				}

				const gimnasios = await response.json();
				const resultados = gimnasios.filter(gym =>
					gym.provincia.toLowerCase().includes(inputBusqueda)
				);

				if (resultados.length === 0) {
					resultadosContainer.innerHTML = "<p>No se encontraron gimnasios.</p>";
					return;
				}

				resultados.forEach(gym => {
					resultadosContainer.innerHTML += `
          <div class="gym-item">
            <h3>${gym.nombre}</h3>
            <p><strong>Provincia:</strong> ${gym.provincia}</p>
            <p><strong>Dirección:</strong> ${gym.direccion}</p>
            <p><strong>Horario Lectivo:</strong> ${gym.horario_lectivo}</p>
            <p><strong>Horario Festivo:</strong> ${gym.horario_festivo}</p>
          </div>
        `;
				});

				mostrarEnIframe(resultados[0]);

			} catch (error) {
				console.error("Error en la búsqueda:", error);
				resultadosContainer.innerHTML = "<p>Error al procesar la búsqueda.</p>";
			}
		}

		function mostrarEnIframe(gym) {
			if (!gym.direccion) {
				console.error("No hay dirección disponible para este gimnasio.");
				return;
			}

			const mapsUrl = `https://www.google.com/maps?q=${encodeURIComponent(gym.direccion)}&output=embed`;

			document.getElementById("mapa").src = mapsUrl;
		}
		</script>



		<footer>
			<div class="top-bar">
				<div class="footer-container">
					<span class="follow-us">SÍGUENOS EN</span>

					<div class="social-icons">
						<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
						<a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
						<a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
					</div>
				</div>
			</div>

			<div class="middle-footer">
				<div class="footer-container">
					<div class="footer-section">
						<h3>SERVICIOS E INFORMACIÓN</h3>
						<ul>
							<li><a href="#">Atención al cliente</a></li>
							<li><a href="#">Reglamento interno</a></li>
							<li><a href="#">Horarios de apertura</a></li>
						</ul>
					</div>
					<div class="footer-section">
						<h3>ACERCA DE</h3>
						<ul>
							<li><a href="#">Acerca de Vas A Llorar GYM</a></li>
							<li><a href="#">Embajadores</a></li>
							<li><a href="#">Trabaja con nosotros</a></li>
						</ul>
					</div>
					<div class="footer-section">
						<h3>POLÍTICAS Y PRIVACIDAD</h3>
						<ul>
							<li><a href="#">Reglamento de videovigilancia</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Aviso Legal</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="bottom-bar">
				<div class="footer-container">
					<span class="created-by"><b>CREADO POR</b></span>

					<div class="creators">
						<div class="creator">
							<a href="https://github.com/Israelab01" target="_blank">
								<i class="fab fa-github"></i>
							</a>
							<a href="https://linkedin.com/in/israel-abad-barrera" target="_blank">
								<i class="fab fa-linkedin"></i>
							</a>
							<span>Israel Abad</span>
						</div>

						<div class="creator">
							<a href="https://github.com/samuel-un" target="_blank">
								<i class="fab fa-github"></i>
							</a>
							<a href="https://www.linkedin.com/in/samuel-un/" target="_blank">
								<i class="fab fa-linkedin"></i>
							</a>
							<span>Samuel Utrilla</span>
						</div>

						<div class="creator">
							<a href="https://github.com/blurry0507" target="_blank">
								<i class="fab fa-github"></i>
							</a>
							<a href="https://www.linkedin.com/in/nicolas-burgos-contreras-278b042b4" target="_blank">
								<i class="fab fa-linkedin"></i>
							</a>
							<span>Nicolás Burgos</span>
						</div>
					</div>

				</div>
			</div>
		</footer>



</body>

</html>