# CI Task CMS (CodeIgniter 4)

Proyek ini adalah sistem manajemen konten (CMS) dasar atau starter aplikasi yang dibangun menggunakan CodeIgniter 4.

## Stack Teknologi yang Digunakan
- **Framework:** CodeIgniter 4 (PHP)
- **Dependency Manager:** Composer
- **Environment:** PHP 8.2 atau lebih baru
- **Database:** PostgreSQL / MySQL (sesuai konfigurasi `.env`)

## Instalasi & Persiapan
1. Pastikan PHP 8.2+ dan Composer sudah terinstal di sistem Anda.
2. Instal semua dependensi via Composer dengan menjalankan:
   ```bash
   composer install
   ```
3. Salin/duplikasi file environment template `env` menjadi `.env`:
   ```bash
   cp env .env
   ```
4. Buka file `.env` yang baru dibuat dan masukkan kata sandi PostgreSQL Anda pada kolom:
   ```ini
   database.default.password = PASSWORD_POSTGRES_ANDA
   ```
   *(Konfigurasi driver PostgreSQL, port `5432`, dan nama database `ci-task` sudah terkonfigurasi secara otomatis dari template).*
5. Buat database baru bernama `ci-task` di PostgreSQL Anda, lalu impor skema basis data awal dari file [database/ci-task.sql](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/ci-task-cms/database/ci-task.sql).

## Cara Kerja & Penggunaan Aplikasi
CodeIgniter 4 menggunakan pola arsitektur MVC (Model-View-Controller). 
- Permintaan dari pengguna (HTTP Request) akan masuk melalui `public/index.php`.
- Router kemudian mengarahkan permintaan tersebut ke Controller yang sesuai.
- Controller dapat berinteraksi dengan Model untuk mengambil atau menyimpan data dari database.
- Hasil dari pemrosesan tersebut akan dikirim ke View untuk ditampilkan kepada pengguna.
Titik masuk utama aplikasi berada pada folder `public/`, untuk alasan keamanan agar file inti framework tidak terekspos.

Jalankan server pengembangan lokal dengan perintah:
```bash
php spark serve
```
Aplikasi kemudian dapat diakses melalui browser pada alamat default `http://localhost:8080/`.

## Spesifikasi Laptop (Saat Ini)
Proyek ini dikembangkan/dijalankan dengan spesifikasi mesin berikut:
- **Prosesor:** 12th Gen Intel(R) Core(TM) i7-12700H (2.30 GHz)
- **RAM:** 16,0 GB
- **Sistem Operasi:** Windows 11 (64-bit operating system, x64-based processor)
