# Wrapstation - Syukriatul Zandri

Repository ini berisi penyelesaian seluruh tugas teknis untuk posisi kandidat di **Wrapstation**. Repositori ini dibagi menjadi 3 modul utama:

---

## 📂 Struktur Modul & Dependensi

| Nama Modul | Lokasi Folder | Dependensi Utama | Panduan Detail |
| :--- | :--- | :--- | :--- |
| **1. AI Training (Fruit Detection)** | [`/Fruit_Detection`](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/Fruit_Detection) | `ultralytics` (YOLOv8), `opencv-python` | [Baca README Modul 1](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/Fruit_Detection/README.md) |
| **2. IoT & Embedded Systems** | [`/IoT_Camera`](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/IoT_Camera) | `opencv-python`, `numpy` | [Baca README Modul 2](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/IoT_Camera/README.md) |
| **3. CodeIgniter (CMS)** | [`/ci-task-cms`](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/ci-task-cms) | PHP >= 8.2, `codeigniter4/framework` | [Baca README Modul 3](file:///c:/Users/Mustafa/Downloads/Zandri/Wrapstation_Syukriatul_Zandri/ci-task-cms/README.md) |

---

## 🛠️ Langkah Cepat Pengujian

### 1. Deteksi Buah (AI)
Masuk ke folder `Fruit_Detection/`, lalu jalankan deteksi langsung dengan model `best.pt` yang sudah terlatih:
```bash
cd Fruit_Detection
pip install -r requirements.txt
python inference.py
```

### 2. Aplikasi Kamera IoT
Masuk ke folder `IoT_Camera/` lalu jalankan visualisasi GUI kamera:
```bash
cd IoT_Camera
pip install -r requirements.txt
python camera_app.py
```
*(Tekan `C` untuk ambil gambar, tahan `B` untuk burst, dan `Q` untuk keluar).*

### 3. CMS CodeIgniter 4
Masuk ke folder `ci-task-cms/`, persiapkan environment database, lalu jalankan server:
```bash
cd ci-task-cms
composer install
cp env .env  # sesuaikan password postgres Anda di berkas .env
php spark serve
```
*(Jangan lupa impor berkas skema awal dari `database/ci-task.sql` ke dalam PostgreSQL).*
