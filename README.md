<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741737236/Logo_Letras_solo_3_yiwriy.png" alt="V.A.L GYM Logo" width="280">
</p>

# 💪 V.A.L GYM — Web Platform for Gyms

> **Status:** Active · **Owner:** [Samuel Utrilla](https://github.com/samuel-un) · **Stack:** Laravel (PHP), MySQL, Blade, Bootstrap, SweetAlert2

**Summary:** Web application to **search gyms**, **sign up / sign in**, **manage profile**, **subscribe** to membership plans, and **book** resources/time slots.  
The project **started as a backend‑only academic work (Laravel)** built together with my teammate **[Israel Abad](https://github.com/Israelab01)**.  
**Today the development and maintenance is 100% solo**. I have **added Blade + CSS frontend**, improved UI/UX and user flows, and deployed it to Railway.

---

## 🚀 Live Demo
- **Railway (Backend + App):** https://gimnasio-laravel-production.up.railway.app/

---

## 🧭 Table of Contents
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Architecture & Modules](#-architecture--modules)
- [Installation & Setup](#-installation--setup)
- [Environment Variables](#-environment-variables)
- [Screenshots](#-screenshots)
- [UI Integrations (SweetAlert2)](#-ui-integrations-sweetalert2-example)
- [Roadmap](#-roadmap)
- [History & Credits](#-history--credits)
- [License](#-license)

---

## ✨ Features
- 🔍 **Gym search** by city with a **filterable list**.
- 👤 **Registration / Login** and editable **user profile**.
- 💳 **Subscriptions / plans** with price views.
- 📅 **Booking & schedules** (basic availability management).
- 🗺️ **Map** to locate gyms (frontend‑embedded integration).
- 🧱 **CRUD** for core entities (users, gyms, plans, etc.).
- 🧭 **Navigation & feedback** using **SweetAlert2** (confirmations, success/error).
- 🧰 **Migrations** and **seeders** included.
- 🧭 **Laravel MVC**: routes, controllers, models, and **Blade** views.

---

## 🛠 Tech Stack
**Backend:** Laravel · PHP  
**Database:** MySQL  
**Frontend:** Blade (Laravel), **Bootstrap**, **SweetAlert2** (modals/toasts)  
**Deployment:** Railway

> *SweetAlert2* is used for **delete confirmations**, **success/error messages**, and form alerts, improving UX (e.g., confirm before deleting a resource).

---

## 🧩 Architecture & Modules
- **Users & Authentication:** sign‑up/login, password recovery (*Laravel session‑based auth*).
- **Gyms:** listing, detail, map location.
- **Plans / Subscriptions:** plan catalog and user enrollment.
- **Bookings:** select available resource/time slot (basic level).
- **Administration:** pages for CRUD of key entities (role‑based).

> **Basic roles** (e.g., *admin* / *user*) separate administrative views and actions.

---

## ⚙️ Installation & Setup

### Requirements
- PHP 8.x, Composer
- MySQL 8.x (or compatible)
- Standard Laravel PHP extensions enabled

### Steps (local environment)
```bash
# 1) Clone
git clone https://github.com/samuel-un/gimnasio-laravel.git
cd gimnasio-laravel

# 2) Dependencies
composer install

# 3) Environment variables
cp .env.example .env
# Edit DB_* with your local credentials

# 4) App key
php artisan key:generate

# 5) Migrations + Seeders
php artisan migrate --seed

# 6) Run server
php artisan serve
```

> **Optional (Docker/Sail):** if you use Laravel Sail, you can spin up MySQL/PHP with Docker using `./vendor/bin/sail up -d`, and run the same commands prefixed with `sail`.

---

## 🔐 Environment Variables
Minimum for local development:
```dotenv
APP_NAME="V.A.L GYM"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gimnasio
DB_USERNAME=root
DB_PASSWORD=
```
> For production on **Railway**, also set `APP_URL` and the **managed MySQL** variables provided by the platform.

---

## 📸 Screenshots

### Landing Page
<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358337/Landing1_by1kkv.png" width="850">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358321/Landing2_k3e0gk.png" width="850">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358321/Landing3_vpslbl.png" width="850">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358321/Landing4_lvhtxo.png" width="850">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358321/Landing5_olmzdq.png" width="850">
</p>

## Price View

<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358543/Price1_jfhn47.png" width="850">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358548/Price2_ceixob.png" width="850">
</p>

## User Access

<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358654/User-Access_ahmy3k.png" width="850">
</p>

## User Creator

<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358655/User-Creator_ozy8vj.png" width="850">
</p>

## User Management

<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358843/User-Management_bfawpe.png" width="850">
</p>
<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358843/User-Management2_d0skc1.png" width="850">
</p>
<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358844/User-Management3_ii4zb4.png" width="850">
</p>
<p align="center">
  <img src="https://res.cloudinary.com/dgbngcvkl/image/upload/v1757358843/User-Management4_qtyuwa.png" width="850">
</p>

---

## 🗺️ UI Integrations (SweetAlert2 example)
```html
<!-- CDN example -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
```
```js
// Delete confirmation
document.querySelectorAll('.btn-delete').forEach((btn) => {
  btn.addEventListener('click', (e) => {
	e.preventDefault();
	const form = btn.closest('form');
	Swal.fire({
	  title: 'Delete this item?',
	  text: 'This action cannot be undone.',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Yes, delete',
	  cancelButtonText: 'Cancel'
	}).then((result) => {
	  if (result.isConfirmed) form.submit();
	});
  });
});
```
> **Toasts** are also used for action feedback (create/edit/delete).

---

## 🗺️ Roadmap
- [x] Base migrations/seeders
- [x] Gym search/filtering
- [x] Subscriptions and price view
- [x] SweetAlert2 alerts integration
- [x] Responsive improvements (mobile/tablet)
- [ ] Feature tests (HTTP) and additional validations
- [ ] Basic CI/CD with GitHub Actions
- [ ] Caching for frequent queries

---

## 🧾 History & Credits
- **Initial phase (academic):** backend with **Laravel** and minimal frontend with Blade, developed together with **[Israel Abad](https://github.com/Israelab01)**.
- **Current phase (solo):** enhanced **Blade + CSS**, **UI improvements**, **SweetAlert2 feedback**, and architecture/UX tweaks.

---

## 📄 License
This project is licensed under the **MIT License**.
