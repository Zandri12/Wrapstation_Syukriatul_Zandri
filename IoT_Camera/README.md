# IoT Camera - Advanced Interface

Aplikasi kamera IoT simulasi dengan tampilan antarmuka (HUD) tingkat lanjut yang menampilkan informasi realtime seperti kamera profesional.

## Stack Teknologi yang Digunakan
- **Bahasa Pemrograman:** Python
- **Computer Vision:** OpenCV (`cv2`) untuk menangkap frame kamera dan menggambar antarmuka (HUD).
- **Perhitungan Matriks:** NumPy untuk mengkalkulasi tingkat kecerahan gambar secara *real-time*.
- **Audio:** `winsound` (Windows) untuk membunyikan suara *shutter* saat mengambil gambar.

## Instalasi & Persiapan
1. Pastikan Python 3.8+ sudah terinstal di komputer.
2. Instal semua library yang dibutuhkan dengan menjalankan perintah berikut di terminal:
   ```bash
   pip install -r requirements.txt
   ```

## Cara Kerja & Penggunaan Aplikasi
Aplikasi ini berjalan dengan mengakses perangkat keras kamera laptop atau webcam melalui modul OpenCV.
- Setiap *frame* yang ditangkap oleh kamera akan diproses dan ditumpuk dengan gambar HUD yang berisi *grid*, FPS *counter*, ukuran resolusi, serta *exposure meter* yang menghitung rata-rata kecerahan gambar (*mean brightness*).
- Jalankan aplikasi dengan perintah:
   ```bash
   python camera_app.py
   ```
- Aplikasi mendengarkan input keyboard dari pengguna:
  - Tekan **[C]** untuk mengambil satu foto (*capture*).
  - Tekan dan tahan **[B]** untuk mengambil rentetan foto (*burst hold*).
  - Tekan **[Q]** untuk keluar dari aplikasi.
- Foto-foto yang diambil akan disimpan secara otomatis ke dalam folder `captures`.

## Spesifikasi Laptop (Saat Ini)
Proyek ini dikembangkan/dijalankan dengan spesifikasi mesin berikut:
- **Prosesor:** 12th Gen Intel(R) Core(TM) i7-12700H (2.30 GHz)
- **RAM:** 16,0 GB
- **Sistem Operasi:** Windows 11 (64-bit operating system, x64-based processor)
