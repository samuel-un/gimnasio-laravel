<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741737236/Logo_Letras_solo_3_yiwriy.png" alt="GymWeb">
</p>

<h1>💪 V.A.L GYM- Plataforma WEB para nuestros Gimnasios 🏋️</h1>

V.A.L GYM es una aplicación web desarrollada en **Laravel y PHP** que permite a los usuarios buscar gimnasios en su ciudad, registrarse, gestionar su perfil y reservar instalaciones. La plataforma está diseñada para ofrecer una experiencia intuitiva y funcional.

<h1>📌 Características</h1>

-   🔍 **Búsqueda de gimnasios** en la ciudad.
-   📝 **Registro e inicio de sesión** de usuarios.
-   🎿 **Suscripción a gimnasios** mediante diferentes bonos.
-   🏠 **Gestor de perfil**, permitiendo modificar datos personales.
-   📅 **Reserva y consulta de horarios** de las instalaciones.
-   📣 **Uso de API** para gestionar los datos de todos los gimnasios disponibles.
-   📍 **Visualización de la ubicación** del gimnasio seleccionado en el mapa.
-   📦 **Consumo de la API en la vista de precios**, permitiendo suscribirse a cualquier gimnasio.
-   📓 **Implementación de migraciones** para la base de datos.
-   ✨ **Seeders** para poblar la base de datos.
-   🏗 **Desarrollo en Laravel**, utilizando rutas, modelos, controladores y vistas.

<h1>⚙️ Tecnologías Utilizadas</h1>

-   Laravel
-   PHP
-   MySQL
-   Blade (Motor de plantillas de Laravel)
-   Bootstrap (para la interfaz de usuario)
-   API para la gestión y visualización de gimnasios

<h1>🔧 Instalación</h1>

```bash
# Clonar el repositorio
git clone https://github.com/samuel-un/gimnasio-laravel.git

# Acceder al proyecto
cd C:/xampp/htdocs/laravel/gimnasio-laravel

# Instalar dependencias
composer install

# Configurar el archivo .env con los datos de la base de datos
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gimnasio
DB_USERNAME=root
DB_PASSWORD=

# Genera una nueva clave de aplicación y la guarda en el archivo .env
php artisan key:generate

# Ejecutar migraciones y seeders
php artisan migrate --seed

# Levantar el servidor
php artisan serve
```

<h1>👥 Miembros del Proyecto</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Rol</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="https://github.com/Israelab01">Israel Abad</a></td>
      <td>Developer</td>
    </tr>
    <tr>
      <td><a href="https://github.com/Blurry0507">Nicolas Burgos</a></td>
      <td>Developer</td>
    </tr>
    <tr>
      <td><a href="https://github.com/samuel-un">Samuel Utrilla</a></td>
      <td>Developer</td>
    </tr>
  </tbody>
</table>
<h1>📸 Capturas</h1>

## Landing Page

<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093706_rqu8c2.png" width="850">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093738_u5xmvp.png" width="850">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093748_l954ba.png" width="850">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093810_nd726v.png" width="850">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093817_cdaa9d.png" width="850">
</p>

## Price View

<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855279/Captura_de_pantalla_2025-03-13_094035_k526bq.png" width="850">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855279/Captura_de_pantalla_2025-03-13_094044_uyiagh.png" width="850">
</p>

## User Creator

<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855279/Captura_de_pantalla_2025-03-13_093839_ug3ndt.png" width="850">
</p>

## User Access

<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741855278/Captura_de_pantalla_2025-03-13_093830_lu4aim.png" width="850">
</p>

## User Management

<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741860595/Captura_de_pantalla_2025-03-13_110909_ayt4fx.png" width="850">
</p>
<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741860596/Captura_de_pantalla_2025-03-13_110917_tsidpg.png" width="850">
</p>
<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741860596/Captura_de_pantalla_2025-03-13_110924_gtbkr7.png" width="850">
</p>
<img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741860596/Captura_de_pantalla_2025-03-13_110939_vjzgc5.png" width="850">
</p>

<h1>📊 Metodología</h1>

En este proyecto hemos trabajado con la metodología **SCRUM** y **Programación en Pareja** para una mejor colaboración y desarrollo.

<h1>📋 Licencia</h1>

Este proyecto se encuentra bajo la licencia **MIT**.
