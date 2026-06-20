# Object Detection - Fruit Detection

Proyek ini adalah penyelesaian tugas untuk membangun sistem Object Detection menggunakan YOLO yang mampu mendeteksi dan mengklasifikasikan gambar buah.

## Stack Teknologi yang Digunakan
- **Bahasa Pemrograman:** Python 3.8+
- **Deep Learning Framework:** YOLO (Ultralytics)
- **Computer Vision:** OpenCV (`cv2`)

## Instalasi & Persiapan
1. Pastikan Python 3.8+ sudah terinstal.
2. Instal pustaka dependensi menggunakan file `requirements.txt`:
   ```bash
   pip install -r requirements.txt
   ```

## Cara Kerja & Penggunaan Aplikasi
Aplikasi ini menggunakan model deteksi objek YOLO (You Only Look Once) untuk mengenali buah-buahan dalam sebuah gambar.
1. **Training Model (`train.py`):** Skrip ini membaca konfigurasi dataset dari `dataset/data.yaml` dan melatih model YOLO pada data gambar tersebut. Hasil akhir dari proses ini adalah file weights (`.pt`) yang menyimpan 'pengetahuan' model tentang bentuk buah-buahan.
   Jalankan training dengan:
   ```bash
   python train.py
   ```
2. **Inference / Deteksi (`inference.py`):** Skrip ini memuat model yang telah dilatih dan memproses gambar-gambar baru. OpenCV digunakan untuk menampilkan gambar ke layar beserta *bounding box* (kotak pembatas) dan label probabilitas prediksi buah tersebut.
   Jalankan inference dengan:
   ```bash
   python inference.py
   ```

## Spesifikasi Laptop (Saat Ini)
Proyek ini dikembangkan/dijalankan dengan spesifikasi mesin berikut:
- **Prosesor:** 12th Gen Intel(R) Core(TM) i7-12700H (2.30 GHz)
- **RAM:** 16,0 GB
- **Sistem Operasi:** Windows 11 (64-bit operating system, x64-based processor)
