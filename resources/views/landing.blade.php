<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vas a Llorar GYM - Landing</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
  <!-- Asegúrate de incluir aquí las librerías de iconos, por ejemplo Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <!-- ENCABEZADO Y NAVEGACIÓN -->
  <header>
    <nav>
      <div class="nav-left">
        <img
          src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1740490225/Landing-page%20GYM/logo-letras.png"
          alt="Logo Vas a Llorar GYM"
          class="gym-logo"
        />
      </div>
      <div class="nav-right">
        <ul class="nav-menu">
          <li><a href="#precios">PRECIOS</a></li>
          <li><a href="#conocenos">CONÓCENOS</a></li>
          <li><a href="#busca-club">BUSCA TU CLUB</a></li>
        </ul>
        <a href="/user-access" class="client-access">
          <span>ÁREA CLIENTES</span>
          <img
            src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/cuenta_2_s4gs1a.png"
            alt="Icono Perfil"
            class="profile-icon"
          />
        </a>
      </div>
    </nav>
  </header>

  <!-- SECCIÓN HERO -->
  <section class="hero" id="hero">
    <div class="hero-content">
      <h1>LLORA HOY, PERO SONRÍE MAÑANA</h1>
      <p>¡Bienvenido a tu nuevo reto de entrenamiento!</p>
      <a href="#por-que-elegir" class="btn-cta">Conoce más</a>
    </div>
  </section>

  <!-- SECCIÓN: POR QUÉ ELEGIR VAS A LLORAR GYM -->
  <section class="why-choose" id="por-que-elegir">
    <div class="container">
      <h2>POR QUÉ ELEGIR VAS A LLORAR GYM</h2>
      <p>
        Somos el gimnasio para quienes buscan resultados reales, sin excusas. En
        <strong>VAS A LLORAR GYM</strong>, te ofrecemos una experiencia intensa
        para llegar más lejos de lo que jamás pensaste.
      </p>
      <div class="features">
        <div class="feature" style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180217/image_57_y48fei.png');">
          <h3>Fuerza</h3>
          <p>Fortalece tus músculos y tu determinación.</p>
        </div>
        <div class="feature" style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_59_zsfsru.png');">
          <h3>Rendimiento</h3>
          <p>Maximiza tu desempeño atlético con nuestras rutinas.</p>
        </div>
        <div class="feature" style="background-image: url('https://res.cloudinary.com/dup51jxlj/image/upload/v1741180179/image_58_myyh3z.png');">
          <h3>Resistencia</h3>
          <p>Entrena para soportar las rutinas más intensas.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN: LOS MEJORES ENTRENADORES -->
  <section class="trainers" id="entrenadores">
    <div class="container">
      <h2>LOS MEJORES ENTRENADORES, PARA TU MEJOR VERSIÓN</h2>
      <p>
        Te presentamos a los profesionales que te acompañarán en tu camino al
        éxito. Consulta sus horarios y entrena con ellos.
      </p>
      <div class="trainer-cards">
        <div class="trainer-card">
          <img
            src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDePesas_wm1qsc.png"
            alt="Entrenador 1"
          />
          <h3>Mati Vela</h3>
          <p>
            Especialista en crossfit y musculación. ¡Te guiará a la cima!
          </p>
        </div>
        <div class="trainer-card">
          <img 
            src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/EntrenadorDeCardio_wwkcj0.png"
            alt="Entrenador 2"
          />
          <h3>John Smith</h3>
          <p>Entrenador de alto rendimiento y enfoque integral.</p>
        </div>
        <div class="trainer-card">
          <img
            src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741180640/freepik__35mm-film-photography-a-female-fitness-instructor-__60087_1_fvyj5u.png"
            alt="Entrenador 3"
          />
          <h3>Jane Doe</h3>
          <p>Instructora de yoga y pilates para un equilibrio total.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
  <!-- BARRA SUPERIOR -->
  <div class="top-bar">
    <div class="footer-container">
      <!-- Texto de "SÍGUENOS EN" -->
      <span class="follow-us">SÍGUENOS EN</span>
      
      <!-- Íconos de redes sociales -->
      <div class="social-icons">
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank"><i class="fab fa-x-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
      </div>
    </div>
  </div>

  <!-- SECCIÓN CENTRAL (3 columnas) -->
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

  <!-- BARRA INFERIOR -->
  <div class="bottom-bar">
    <div class="footer-container">
      <!-- Texto "CREADO POR" -->
      <span class="created-by"><b>CREADO POR</b></span>
      
      <!-- Contenedor de creadores -->
      <div class="creators">
        <!-- Primer creador -->
        <div class="creator">
          <a href="#" target="_blank"><i class="fab fa-github"></i></a>
          <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          <span>Israe A.B</span>
        </div>
        <!-- Segundo creador -->
        <div class="creator">
          <a href="#" target="_blank"><i class="fab fa-github"></i></a>
          <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          <span>Nicolas B.C</span>
        </div>
        <!-- Tercer creador -->
        <div class="creator">
          <a href="#" target="_blank"><i class="fab fa-github"></i></a>
          <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          <span>Samuel U.N</span>
        </div>
      </div>
    </div>
  </div>
</footer>


</body>
</html>
