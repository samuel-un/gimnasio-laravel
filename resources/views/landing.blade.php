<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Vas a Llorar GYM - Landing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="{{ asset('css/swal.css') }}">
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
			<p>¡Bienvenido a tu nuevo reto de entrenamiento! Aquí trabajamos duro para que consigas resultados reales.</p>
			<a href="#por-que-elegir" class="btn-cta">Conoce más</a>
		</div>
	</section>

	<section class="why-choose" id="por-que-elegir">
		<div class="container reveal">
			<h2>POR QUÉ ELEGIR VAS A LLORAR GYM</h2>
			<p>Somos el gimnasio para quienes buscan resultados reales, sin excusas. En <strong>VAS A LLORAR GYM</strong>, te ofrecemos una experiencia intensa para llegar más lejos de lo que jamás pensaste.</p>

			<div class="features">
				<div class="feature reveal" style="background-image:url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/image_57_y48fei.png');">
					<div class="feature-body">
						<h3>Fuerza</h3>
						<p>Fortalece tus músculos y tu determinación.</p>
					</div>
				</div>

				<div class="feature reveal" style="background-image:url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_59_zsfsru.png');">
					<div class="feature-body">
						<h3>Rendimiento</h3>
						<p>Maximiza tu desempeño atlético con nuestras rutinas.</p>
					</div>
				</div>

				<div class="feature reveal" style="background-image:url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_58_myyh3z.png');">
					<div class="feature-body">
						<h3>Resistencia</h3>
						<p>Entrena para soportar las rutinas más intensas.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="trainers" id="entrenadores">
		<div class="container">
			<h2>LOS MEJORES ENTRENADORES, PARA TU MEJOR VERSIÓN</h2>
			<p>Te presentamos a nuestro equipo de profesionales que te guiarán hacia tus metas.</p>
			<div class="trainer-cards">
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDePesas_wm1qsc.png" alt="Entrenador 1">
					<h3>Alex - Fuerza</h3>
					<p>Especialista en hipertrofia y powerlifting.</p>
				</div>
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/freepik__35mm-film-photography-a-female-fitness-instructor-__60087_1_fvyj5u.png" alt="Entrenador 2">
					<h3>María - Rendimiento</h3>
					<p>Optimización de rendimiento y acondicionamiento metabólico.</p>
				</div>
				<div class="trainer-card">
					<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDeCardio_wwkcj0.png" alt="Entrenador 3">
					<h3>Javier - Resistencia</h3>
					<p>Planificación de resistencia y endurance.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="gym-search" id="buscador">
		<h2>Encuentra tu gimnasio más cercano</h2>
		<input id="busqueda" type="text" placeholder="Provincia, ciudad, nombre o dirección…" />
		<button onclick="buscar()">Buscar</button>

		<div class="search-results" id="resultados"></div>

		<div class="map-card" id="mapa-card">
			<div class="map-card__header">
				<div class="map-card__title">
					<h3 id="mapa-nombre">Selecciona un gimnasio</h3>
					<p id="mapa-direccion" class="muted">La dirección aparecerá aquí.</p>
				</div>
				<div class="map-card__actions">
					<button type="button" class="btn-outline" id="btn-abrir-maps" disabled>Abrir en Google Maps</button>
					<button type="button" class="btn-ghost" id="btn-fullscreen" disabled>Pantalla completa</button>
				</div>
			</div>

			<div class="map-card__body">
				<div class="map-skeleton" id="mapa-skeleton" aria-hidden="true"></div>
				<iframe
					class="map-iframe"
					id="mapa-iframe"
					title="Ubicación del gimnasio"
					src="about:blank"
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					allowfullscreen>
				</iframe>
			</div>
		</div>
	</section>

	<div class="map-modal" id="mapa-modal" hidden>
		<div class="map-modal__inner">
			<button class="map-modal__close" id="mapa-modal-cerrar" aria-label="Cerrar">✕</button>
			<iframe
				class="map-modal__iframe"
				id="mapa-modal-iframe"
				title="Mapa a pantalla completa"
				src="about:blank"
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
				allowfullscreen>
			</iframe>
		</div>
	</div>

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
				</div>

			</div>
		</div>
	</footer>

	<script>
		let GIMNASIOS_CACHE = null;
		const $ = (s) => document.querySelector(s);
		const norm = (s) => (s || "").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim();

		async function loadGimnasios() {
			if (GIMNASIOS_CACHE) return GIMNASIOS_CACHE;
			const resp = await fetch("data/gimnasios.json", {
				cache: "no-store"
			});
			if (!resp.ok) throw new Error("No se pudo cargar gimnasios.json");
			GIMNASIOS_CACHE = await resp.json();
			return GIMNASIOS_CACHE;
		}

		const mapEls = {
			card: $("#mapa-card"),
			name: $("#mapa-nombre"),
			addr: $("#mapa-direccion"),
			iframe: $("#mapa-iframe"),
			skeleton: $("#mapa-skeleton"),
			openBtn: $("#btn-abrir-maps"),
			fullBtn: $("#btn-fullscreen"),
			modal: $("#mapa-modal"),
			modalIframe: $("#mapa-modal-iframe"),
			modalClose: $("#mapa-modal-cerrar"),
		};

		function startMapLoading(url) {
			mapEls.skeleton.style.display = "block";
			mapEls.iframe.style.opacity = "0";
			mapEls.iframe.src = url;
		}

		function endMapLoading() {
			mapEls.skeleton.style.display = "none";
			mapEls.iframe.style.opacity = "1";
		}

		mapEls.iframe.addEventListener("load", endMapLoading);

		function mapsEmbedUrl(address) {
			return `https://www.google.com/maps?q=${encodeURIComponent(address)}&output=embed`;
		}

		function mapsExternalUrl(address) {
			return `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}`;
		}

		function mostrarEnIframe(gym) {
			if (!gym?.direccion) return console.error("Sin dirección");
			mapEls.name.textContent = gym?.nombre || "Gimnasio";
			mapEls.addr.textContent = gym.direccion;
			mapEls.openBtn.disabled = false;
			mapEls.fullBtn.disabled = false;

			const url = mapsEmbedUrl(gym.direccion);
			mapEls.openBtn.onclick = () => window.open(mapsExternalUrl(gym.direccion), "_blank", "noopener");
			mapEls.fullBtn.onclick = () => abrirFullscreen(url);

			startMapLoading(url);
		}

		function abrirFullscreen(url) {
			mapEls.modal.removeAttribute("hidden");
			mapEls.modalIframe.src = url;
			document.body.style.overflow = "hidden";
		}

		function cerrarFullscreen() {
			mapEls.modal.setAttribute("hidden", "");
			mapEls.modalIframe.src = "about:blank";
			document.body.style.overflow = "";
		}
		mapEls.modalClose.addEventListener("click", cerrarFullscreen);
		mapEls.modal.addEventListener("click", (e) => {
			if (e.target === mapEls.modal) cerrarFullscreen();
		});
		document.addEventListener("keydown", (e) => {
			if (e.key === "Escape" && !mapEls.modal.hasAttribute("hidden")) cerrarFullscreen();
		});

		function crearGymItem(gym) {
			const item = document.createElement("div");
			item.className = "gym-item";

			const h3 = document.createElement("h3");
			h3.textContent = gym.nombre || "Gimnasio";

			const pProv = document.createElement("p");
			pProv.innerHTML = `<strong>Provincia:</strong> ${gym.provincia || "-"}`;

			const pDir = document.createElement("p");
			pDir.innerHTML = `<strong>Dirección:</strong> ${gym.direccion || "-"}`;

			const pHL = document.createElement("p");
			pHL.innerHTML = `<strong>Horario Lectivo:</strong> ${gym.horario_lectivo || "-"}`;

			const pHF = document.createElement("p");
			pHF.innerHTML = `<strong>Horario Festivo:</strong> ${gym.horario_festivo || "-"}`;

			const btn = document.createElement("button");
			btn.type = "button";
			btn.className = "btn-cta";
			btn.textContent = "Ver en mapa";
			btn.addEventListener("click", () => mostrarEnIframe(gym));

			item.append(h3, pProv, pDir, pHL, pHF, btn);
			return item;
		}

		async function buscar() {
			const resultadosContainer = $("#resultados");
			const query = norm($("#busqueda")?.value);

			resultadosContainer.innerHTML = "";
			if (!query) {
				resultadosContainer.innerHTML = "<p>Por favor, ingrese una provincia, ciudad o nombre.</p>";
				startMapLoading("about:blank");
				return;
			}

			const loading = document.createElement("p");
			loading.textContent = "Buscando...";
			resultadosContainer.appendChild(loading);

			try {
				const gimnasios = await loadGimnasios();
				const resultados = gimnasios.filter((g) => {
					const prov = norm(g.provincia);
					const muni = norm(g.municipio || g.ciudad);
					const nom = norm(g.nombre);
					const dir = norm(g.direccion);
					return prov.includes(query) || (muni && muni.includes(query)) || nom.includes(query) || dir.includes(query);
				});

				resultadosContainer.innerHTML = "";

				if (!resultados.length) {
					resultadosContainer.innerHTML = "<p>No se encontraron gimnasios.</p>";
					startMapLoading("about:blank");
					mapEls.name.textContent = "Sin resultados";
					mapEls.addr.textContent = "—";
					mapEls.openBtn.disabled = true;
					mapEls.fullBtn.disabled = true;
					return;
				}

				const meta = document.createElement("p");
				meta.style.opacity = "0.85";
				meta.style.marginBottom = "8px";
				meta.textContent = `${resultados.length} resultado(s)`;
				resultadosContainer.appendChild(meta);

				const frag = document.createDocumentFragment();
				resultados.forEach((g) => frag.appendChild(crearGymItem(g)));
				resultadosContainer.appendChild(frag);

				mostrarEnIframe(resultados[0]);

			} catch (err) {
				console.error("Error en la búsqueda:", err);
				resultadosContainer.innerHTML = "<p>Error al procesar la búsqueda.</p>";
				startMapLoading("about:blank");
			}
		}

		document.addEventListener('DOMContentLoaded', function() {
			const els = document.querySelectorAll('.reveal');
			const io = new IntersectionObserver((entries) => {
				entries.forEach(e => {
					if (e.isIntersecting) {
						e.target.classList.add('in-view');
						io.unobserve(e.target);
					}
				});
			}, {
				threshold: 0.2
			});
			els.forEach(el => io.observe(el));
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@include('partials.swal')
</body>

</html>