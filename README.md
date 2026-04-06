# Explore Vista Bali

**Explore Vista Bali** adalah platform web pariwisata yang dirancang untuk memudahkan wisatawan dalam mengeksplorasi keindahan Bali. Platform ini menyediakan berbagai layanan mulai dari pemesanan paket tour, transportasi (shuttle), hingga penyewaan kendaraan, yang semuanya dikelola melalui panel admin yang modern dan intuitif.

---

## 🚀 Tech Stack

Project ini dibangun menggunakan teknologi terbaru untuk memastikan performa yang cepat dan pengalaman pengguna yang mulus:

### Backend
- **[Laravel 12](https://laravel.com/)**: PHP Framework versi terbaru untuk skalabilitas dan keamanan.
- **[PHP 8.2+](https://www.php.net/)**: Bahasa pemrograman utama dengan fitur modern.
- **[Filament v4](https://filamentphp.com/)**: Panel admin berbasis TALL stack (Tailwind, Alpine, Laravel, Livewire) untuk manajemen data yang efisien.
- **Spatie Media Library**: Untuk manajemen aset gambar dan dokumen secara profesional.

### Frontend
- **[Blade Templating](https://laravel.com/docs/blade)**: Sistem templating bawaan Laravel.
- **[Tailwind CSS 4](https://tailwindcss.com/)**: Framework CSS utility-first untuk desain yang modern dan responsif.
- **[Alpine.js](https://alpinejs.dev/)**: Framework JavaScript ringan untuk interaktivitas di sisi client.
- **[Vite](https://vitejs.dev/)**: Build tool modern untuk proses development yang lebih cepat.

### Tools Lainnya
- **FullCalendar**: Integrasi kalender untuk jadwal paket atau ketersediaan.
- **Flatpickr**: Date & time picker yang user-friendly.
- **WhatsApp Integration**: Integrasi direct messaging untuk kemudahan komunikasi pelanggan.

---

## 🛠️ Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan project ini di lingkungan lokal Anda:

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd explore-vista-bali
   ```

2. **Instal Dependensi Backend (PHP)**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend (Node.js)**
   ```bash
   npm install
   ```

4. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database & Seeding**
   ```bash
   php artisan migrate --seed
   ```

7. **Simbolik Link Storage**
   ```bash
   php artisan storage:link
   ```

8. **Menjalankan Project**
   Buka dua terminal dan jalankan perintah berikut:
   
   Terminal 1 (Vite/Frontend):
   ```bash
   npm run dev
   ```
   
   Terminal 2 (Local Server):
   ```bash
   php artisan serve
   ```

9. **Akses Dashboard Admin**
   Buka browser dan akses `http://localhost:8000/admin`.

---

## ✨ Core Features

### 🌴 Destinasi & Paket Tour
- **Manajemen Paket Tour**: Admin dapat mengelola kategori tour, harga, dan durasi.
- **Booking Online**: Pengguna dapat melihat detail paket dan melakukan pemesanan langsung.

### 🚗 Transportasi & Sewa Kendaraan
- **Sistem Shuttle**: Pemesanan layanan jemput-antar bandara atau antar destinasi khusus.
- **Vehicle Rental**: Katalog penyewaan kendaraan (motor/mobil) dengan spesifikasi lengkap.

### 📸 Konten & Galeri
- **Blog pariwisata**: Artikel informatif seputar tips traveling di Bali.
- **Galeri Foto**: Dokumentasi visual destinasi dan aktivitas tour.
- **Testimoni & Komentar**: Fitur bagi pelanggan untuk memberikan feedback atau pengalaman mereka.

### ⚙️ Sistem Admin & Manajemen
- **User Roles**: Pengelolaan agen dan administrator.
- **Media Library**: Manajemen aset gambar untuk paket tour dan blog secara terpusat.
- **WhatsApp Gateway**: Fitur "Satu Klik" untuk menghubungkan pelanggan langsung ke tim support via WhatsApp.
- **Responsive Layout**: Antarmuka yang optimal baik di desktop maupun perangkat mobile.
