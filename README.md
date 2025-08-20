
<p align="center">
  <img src="https://res.cloudinary.com/dup51jxlj/image/upload/v1741737236/Logo_Letras_solo_3_yiwriy.png" alt="GymWeb Logo">
</p>

# 💪 V.A.L GYM - Web Platform for Gyms 🏋️

**V.A.L GYM** is a **web application built with Laravel and PHP** that allows users to search gyms in their city, register, manage their profile, and book facilities.  
The platform is designed to provide an intuitive and functional user experience.

---

## 📌 Features

- 🔍 **Search gyms** in the selected city.  
- 📝 **User registration and login**.  
- 🎿 **Subscriptions to gyms** through different membership plans.  
- 🏠 **Profile management**, allowing users to edit personal information.  
- 📅 **Booking system** and schedule visualization.  
- 📣 **API integration** to manage and display gym data.  
- 📍 **Map integration** to show gym locations.  
- 📦 **Price view connected to API**, allowing subscriptions to gyms directly.  
- 📓 **Database migrations** and **seeders** included.  
- 🏗 **Laravel MVC architecture**: routes, models, controllers, and views.  

---

## ⚙️ Tech Stack

- **Backend**: Laravel, PHP  
- **Database**: MySQL  
- **Frontend**: Blade (Laravel templates), Bootstrap  
- **API**: Gym management & visualization API  

---

## 🔧 Installation

```bash
# Clone repository
git clone https://github.com/samuel-un/gimnasio-laravel.git

# Enter project folder
cd C:/xampp/htdocs/laravel/gimnasio-laravel

# Install dependencies
composer install

# Configure .env file with database info
cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gimnasio
DB_USERNAME=root
DB_PASSWORD=

# Generate application key
php artisan key:generate

# Run migrations and seeders
php artisan migrate --seed

# Start local server
php artisan serve
```

---

## 👥 Project Members

| Name | Role |
|------|------|
| [Israel Abad](https://github.com/Israelab01) | Developer |
| [Nicolas Burgos](https://github.com/Blurry0507) | Developer |
| [Samuel Utrilla](https://github.com/samuel-un) | Developer |

---

## 📸 Screenshots

### 🖥 Landing Page
(Images hosted on Cloudinary)

### 💰 Price View
(Images hosted on Cloudinary)

### 👤 User Creator
(Images hosted on Cloudinary)

### 🔑 User Access
(Images hosted on Cloudinary)

### ⚙️ User Management
(Images hosted on Cloudinary)

---

## 📊 Methodology

This project was developed using **SCRUM** methodology and **Pair Programming** to ensure collaboration and agile development.

---

## 📋 License

This project is licensed under the **MIT License**.
