# ✈️ Flight Booking API (Laravel)

A RESTful API for managing flight bookings, users, and reservations, built with Laravel.

---

## 🚀 Features

* User registration & login (Token-based authentication)
* Manage flights (CRUD)
* Manage bookings
* Manage reservations
* Clean API structure using Laravel best practices
* Database seeding with realistic fake data

---

## 🛠️ Tech Stack

* Laravel 10 / 12
* PHP
* MySQL
* Eloquent ORM
* Faker (for seeding)

---

## 📦 Installation

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_USERNAME/flight-booking-api.git
cd flight-booking-api
```

### 2. Install dependencies

```bash
composer install
```

### 3. Setup environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure database

Edit `.env` file:

```env
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run migrations & seeders

```bash
php artisan migrate --seed
```

### 6. Run the server

```bash
php artisan serve
```

---

## 🔐 Authentication

This API uses **simple token-based authentication** (no Passport).

### Register

`POST /api/register`

### Login

`POST /api/login`

### Logout

`POST /api/logout`

---

## 📚 API Endpoints

### Auth

* `POST /api/register`
* `POST /api/login`
* `POST /api/logout`

### Users

* `GET /api/users`

### Flights

* `GET /api/flights`
* `POST /api/flights`
* `GET /api/flights/{id}`
* `PUT /api/flights/{id}`
* `DELETE /api/flights/{id}`

### Bookings

* `GET /api/booking`
* `POST /api/booking`

### Reservations

* `GET /api/reservations`
* `POST /api/reservations`

---

## 🧪 Testing (Optional)

You can test endpoints using:

* Postman
* Thunder Client (VS Code)

---

## 📌 Notes

* This project was migrated and upgraded from an older Laravel version.
* Authentication system was simplified (removed Passport).
* Focused on clean backend API design.

---

## 👨‍💻 Author

Mohammad

---

## ⭐ If you like this project

Give it a star on GitHub ⭐


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
