# ♻️ Sadar Sampah AI

Sadar Sampah AI merupakan aplikasi berbasis web yang memanfaatkan Artificial Intelligence (AI) untuk mengidentifikasi jenis sampah melalui gambar. Sistem ini membantu pengguna mengenali kategori sampah serta memberikan informasi dan rekomendasi pengelolaan yang tepat.

---

# Fitur

- Login & Register
- Dashboard
- Deteksi Sampah Menggunakan AI
- Riwayat Deteksi
- Knowledge Base Kategori Sampah
- Profil Pengguna
- About
- Responsive UI
- TensorFlow Lite Integration
- Flask API Integration

---

# Teknologi

## Backend

- Laravel 12
- PHP 8.2+
- MySQL

## AI

- Python
- Flask
- TensorFlow Lite

## Frontend

- Bootstrap 5
- Bootstrap Icons
- JavaScript

---

# Struktur Project

```
Sadar-Sampah-AI/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── images/
│   └── storage/
├── resources/
│   └── views/
├── routes/
├── storage/
├── flask-api/
│   ├── routes/
│   ├── services/
│   ├── uploads/
│   ├── model.tflite
│   ├── labels.txt
│   └── app.py
└── README.md
```

---

# Requirement

Pastikan sudah menginstall:

- PHP 8.2+
- Composer
- Node.js
- NPM
- Python 3.10+
- MySQL
- Git

---

# Clone Repository

```bash
git clone https://github.com/USERNAME/Sadar-Sampah-AI.git

cd Sadar-Sampah-AI
```

---

# Install Laravel

```bash
composer install
```

---

# Install Frontend

```bash
npm install
```

---

# Build Asset

```bash
npm run build
```

atau saat development

```bash
npm run dev
```

---

# Konfigurasi Environment

Copy file:

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Edit bagian database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sadar_sampah_ai
DB_USERNAME=root
DB_PASSWORD=
```

Tambahkan URL Flask

```env
FLASK_API=http://127.0.0.1:5000
```

---

# Database

Import file SQL ke MySQL.

Atau jalankan migration apabila project menggunakan migration.

```bash
php artisan migrate
```

---

# Storage Link

Jalankan

```bash
php artisan storage:link
```

---

# Install Flask

Masuk ke folder

```bash
cd flask-api
```

Install dependency

```bash
pip install -r requirements.txt
```

Apabila belum memiliki file requirements

```bash
pip install flask
pip install tensorflow
pip install pillow
pip install numpy
pip install opencv-python
pip freeze > requirements.txt
```

---

# Menjalankan Flask API

Masuk ke folder

```bash
cd flask-api
```

Jalankan

```bash
python app.py
```

Apabila berhasil akan berjalan di

```
http://127.0.0.1:5000
```

---

# Menjalankan Laravel

Kembali ke folder project

```bash
php artisan serve
```

Laravel berjalan di

```
http://127.0.0.1:8000
```

---

# Cara Menjalankan

Urutan menjalankan project

1. Jalankan MySQL
2. Jalankan Flask API
3. Jalankan Laravel
4. Buka browser
5. Login
6. Upload gambar
7. AI melakukan prediksi
8. Hasil ditampilkan pada halaman deteksi

---

# Akun Default

Silakan sesuaikan dengan database yang digunakan.

Contoh:

Admin

```
Username : admin
Password : password
```

---

# Model AI

Model menggunakan TensorFlow Lite.

```
model.tflite
```

Label disimpan pada

```
labels.txt
```

---

# Folder Penting

```
flask-api/routes/
```

Route Flask API.

```
flask-api/services/
```

Logika preprocessing dan prediksi AI.

```
resources/views/
```

Tampilan Laravel.

```
app/Http/Controllers/
```

Controller Laravel.

---

# Catatan

- Pastikan Flask API aktif sebelum menggunakan fitur deteksi.
- Pastikan file model.tflite tersedia.
- Pastikan labels.txt tersedia.
- Jalankan php artisan storage:link jika gambar tidak muncul.
- Pastikan konfigurasi FLASK_API pada file .env sesuai.

---

# Kontributor

- Ryan Ryzer
- Tim Pengembang Sadar Sampah AI

---

# Lisensi

Project ini dibuat oleh Ryan, Angga, Johan
