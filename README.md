# 🛒 PROJECT ecommerce (PBTGM)

> Aplikasi e-commerce berbasis web yang dibangun dengan **Laravel 13**, **Tailwind CSS**, dan **Alpine.js**, dilengkapi sistem autentikasi dan manajemen role pengguna (Admin & User).

---

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Tech Stack](#-tech-stack)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi Database](#-konfigurasi-database)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Akun Default (Seeder)](#-akun-default-seeder)
- [Struktur Route](#-struktur-route)
- [Struktur Folder](#-struktur-folder)
- [Perintah Artisan](#-perintah-artisan)

---

## 📖 Tentang Project

**PROJECT ecommerce (PBTGM)** adalah aplikasi web e-commerce sebagai bagian dari praktek pengembangan web. Aplikasi ini memiliki fitur:

- ✅ Autentikasi lengkap (Login, Register, Forgot Password) via **Laravel Breeze**
- ✅ Role-based access control (**Admin** & **User**)
- ✅ Redirect otomatis ke dashboard berdasarkan role saat login
- ✅ Middleware proteksi route per role
- ✅ Manajemen profil pengguna

---

## 🧰 Tech Stack

| Layer | Teknologi |
|---|---|
| Backend Framework | Laravel 13 (PHP 8.3) |
| Starter Kit | Laravel Breeze |
| Frontend CSS | Tailwind CSS v3 |
| Frontend JS | Alpine.js v3 |
| Build Tool | Vite |
| Database | MySQL (via Laragon) |
| Testing | PestPHP |

---

## ⚙️ Persyaratan Sistem

Sebelum instalasi, pastikan sudah terinstal:

- **PHP** >= 8.3
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm**
- **MySQL** (atau Laragon)
- **Git**

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone <url-repository> pbtgm-ecommerce
cd pbtgm-ecommerce
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi Node.js

```bash
npm install
```

### 4. Salin File Environment

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 🗄️ Konfigurasi Database

### Edit file `.env`

Buka file `.env` dan sesuaikan konfigurasi database:

```env
APP_NAME="PBTGM Ecommerce"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce-db
DB_USERNAME=root
DB_PASSWORD=
```

> **Jika menggunakan Laragon**, pastikan database `ecommerce-db` sudah dibuat terlebih dahulu di phpMyAdmin atau HeidiSQL.

### Jalankan Migrasi

```bash
php artisan migrate
```

### Jalankan Seeder (Data Akun Default)

```bash
php artisan db:seed --class=UserSeeder
```

Atau jalankan semua seeder sekaligus:

```bash
php artisan db:seed
```

> ⚠️ Jika seeder pernah dijalankan sebelumnya dan muncul error `Duplicate entry`, berarti akun sudah ada di database. Tidak perlu dijalankan ulang.

Untuk **reset database dan jalankan ulang dari awal**:

```bash
php artisan migrate:fresh --seed
```

---

## ▶️ Menjalankan Aplikasi

### Jalankan semua service sekaligus (Recommended)

```bash
composer run dev
```

Perintah ini menjalankan secara bersamaan:
- `php artisan serve` — Server Laravel
- `npm run dev` — Vite (asset bundler)
- `php artisan queue:listen` — Queue worker
- `php artisan pail` — Log viewer

### Atau jalankan secara terpisah

**Terminal 1 — Laravel Server:**
```bash
php artisan serve
```

**Terminal 2 — Vite (CSS & JS):**
```bash
npm run dev
```

Akses aplikasi di: **http://127.0.0.1:8000**

---

## 👤 Akun Default (Seeder)

Setelah menjalankan seeder, tersedia akun berikut:

| Role | Email | Password |
|---|---|---|
| 🔴 Admin | `admin@gmail.com` | `password` |
| 🔵 User | `user@gmail.com` | `password` |

---

## 🗺️ Struktur Route

```
GET  /                    → Halaman welcome (publik)
GET  /login               → Halaman login
POST /login               → Proses login
POST /logout              → Logout

GET  /dashboard           → Redirect otomatis berdasarkan role
                            ├── admin → /admin/dashboard
                            └── user  → /user/dashboard

GET  /admin/dashboard     → Dashboard Admin  [middleware: auth, admin]
GET  /user/dashboard      → Dashboard User   [middleware: auth, user]

GET    /profile           → Lihat & edit profil [middleware: auth]
PATCH  /profile           → Update profil
DELETE /profile           → Hapus akun
```

---

## 📁 Struktur Folder

```
pbtgm-ecommerce/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/              # Controller autentikasi (Breeze)
│   │   │   ├── AdminController.php
│   │   │   ├── UserController.php
│   │   │   ├── DashboardController.php
│   │   │   └── ProfileController.php
│   │   └── Middleware/
│   │       ├── AdminMiddleware.php  # Proteksi route admin
│   │       └── UserMiddleware.php   # Proteksi route user
│   └── Models/
│       └── User.php               # Model user dengan field 'role'
│
├── database/
│   ├── migrations/                # Skema tabel database
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── UserSeeder.php         # Seed akun admin & user
│
├── resources/
│   └── views/
│       ├── admin/
│       │   └── dashboard.blade.php  # Tampilan dashboard admin
│       ├── users/
│       │   └── users.blade.php      # Tampilan dashboard user
│       ├── layouts/                 # Layout utama & navigasi
│       ├── auth/                    # Halaman login, register, dll
│       └── profile/                 # Halaman profil
│
└── routes/
    ├── web.php                    # Route utama aplikasi
    └── auth.php                   # Route autentikasi (Breeze)
```

---

## 🛠️ Perintah Artisan

| Perintah | Fungsi |
|---|---|
| `php artisan migrate` | Jalankan semua migrasi database |
| `php artisan migrate:fresh` | Hapus semua tabel & migrasi ulang |
| `php artisan migrate:fresh --seed` | Reset DB + jalankan semua seeder |
| `php artisan db:seed` | Jalankan semua seeder |
| `php artisan db:seed --class=UserSeeder` | Jalankan seeder spesifik |
| `php artisan route:list` | Lihat semua route yang terdaftar |
| `php artisan make:controller NamaController` | Buat controller baru |
| `php artisan make:model NamaModel -m` | Buat model + migration |
| `php artisan make:middleware NamaMiddleware` | Buat middleware baru |
| `php artisan cache:clear` | Bersihkan cache aplikasi |
| `php artisan config:clear` | Bersihkan cache konfigurasi |
| `php artisan view:clear` | Bersihkan cache view |
| `npm run build` | Build asset untuk production |

---

## 📝 Catatan Tambahan

- Middleware `admin` dan `user` sudah terdaftar di `bootstrap/app.php`
- Setiap user memiliki field `role` dengan nilai default `'user'`
- Login otomatis diarahkan ke dashboard yang sesuai dengan role masing-masing
- Untuk production, jalankan `npm run build` dan set `APP_DEBUG=false` di `.env`

---

<div align="center">
  <p>Dibuat sebagai bagian dari Praktek PBTGM</p>
  <p><strong>PROJECT ecommerce (PBTGM)</strong> &mdash; Laravel 13 &bull; Tailwind CSS &bull; Alpine.js</p>
</div>
