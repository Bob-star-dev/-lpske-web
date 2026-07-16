# LPSKE — Website Laboratorium

Aplikasi web untuk **LPSKE (Laboratorium)** yang dibangun dengan **Laravel 12** dan **Filament 3**.
Terdiri dari sebuah **landing page publik** untuk pengunjung dan **tiga panel admin terpisah**
(Admin, Asisten, Anggota) untuk mengelola konten website, inventaris alat, peminjaman lab,
logbook, presensi, dan perizinan.

> Untuk langkah menyiapkan database dengan XAMPP secara detail, lihat file **[DATABASE.md](DATABASE.md)**.

---

## Kebutuhan Sistem

| Software | Versi minimal | Catatan |
|---|---|---|
| PHP | 8.2+ | Ekstensi wajib: `pdo_mysql`, `mbstring`, `xml`, `curl`, `zip`, `gd`, `bcmath` |
| Composer | 2.x | |
| Node.js | 18+ (disarankan 20/22) | untuk Vite + Tailwind |
| MySQL / MariaDB | 10.4+ | disediakan lewat XAMPP |
| XAMPP for Windows | — | terpasang di `C:\xampp` (sudah termasuk PHP & MySQL) |

> **Catatan Windows:** XAMPP sudah menyertakan **PHP** (di `C:\xampp\php`) dan **MySQL**, tapi
> **tidak** menyertakan **Composer** dan **Node.js** — keduanya diinstall terpisah:
> [Composer](https://getcomposer.org/download/) dan [Node.js](https://nodejs.org/).
> Semua perintah di bawah dijalankan lewat **Command Prompt (CMD)** atau **PowerShell**.

---

## Cara Setup Project (untuk penerima project / dari nol)

Ikuti langkah ini **berurutan**. Semua perintah dijalankan dari dalam folder project
(folder yang berisi file `artisan`).

### Ringkasan cepat (untuk yang sudah paham)

```bat
composer install                 :: install dependency PHP
npm install                      :: install dependency JS
copy .env.example .env           :: buat file .env
php artisan key:generate         :: isi APP_KEY
:: nyalakan Apache + MySQL lewat XAMPP Control Panel (klik Start)
C:\xampp\mysql\bin\mysql.exe -u root < database\sql\lpske.sql   :: impor database
php artisan storage:link         :: symlink storage
php artisan serve                :: jalankan (buka http://localhost:8000)
```

Penjelasan tiap langkah ada di bawah.

### 1. Install dependency

```bash
composer install
npm install
```

`composer install` membuat folder `vendor/` (dependency Laravel/Filament).
`npm install` membuat folder `node_modules/` (untuk Vite & Tailwind). Kedua folder ini
**tidak ikut** saat project dikirim, jadi wajib dijalankan di komputer penerima.

### 2. Buat file `.env`

Ini **langkah wajib sebelum `php artisan serve`**. Project tidak menyertakan file `.env`
(berisi konfigurasi & kunci rahasia), tapi menyertakan contohnya yaitu `.env.example`.
Salin contoh tersebut menjadi `.env` (lewat CMD/PowerShell):

```bat
copy .env.example .env
```

> Atau lewat File Explorer: copy-paste file `.env.example`, lalu ubah nama salinannya menjadi
> `.env` (tanpa nama depan, hanya `.env`). Pastikan "File name extensions" aktif agar tidak
> tersimpan sebagai `.env.txt`.

### 3. Buat APP_KEY

File `.env` yang baru disalin punya `APP_KEY=` yang masih kosong. Isi otomatis dengan:

```bash
php artisan key:generate
```

> Kalau langkah ini dilewati, aplikasi akan error seperti
> *"No application encryption key has been specified."*

### 4. Sesuaikan konfigurasi database di `.env`

Buka file `.env`, pastikan bagian database sesuai dengan XAMPP di komputer penerima.
Nilai default sudah benar untuk XAMPP standar (root tanpa password):

```env
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lpske
DB_USERNAME=root
DB_PASSWORD=
```

> **Yang paling sering bikin error: `DB_PORT`.** Nilainya harus sama dengan port MySQL yang
> benar-benar aktif (lihat langkah 5). Kalau MySQL jalan di port lain, ubah baris ini.
> Setelah mengubah `.env`, jalankan `php artisan config:clear`.

### 5. Nyalakan MySQL XAMPP

Buka **XAMPP Control Panel** (`C:\xampp\xampp-control.exe`), lalu klik **Start** pada baris
**MySQL** (dan **Apache** juga kalau ingin memakai phpMyAdmin). Tombol berubah hijau = sudah jalan.

Cek MySQL sudah listening dan lihat portnya (biasanya **3306**) lewat CMD:

```bat
netstat -ano | findstr 3306
```

### 6. Impor database

Impor struktur + data awal (termasuk akun login). Detail lengkap & cara lewat phpMyAdmin ada di
**[DATABASE.md](DATABASE.md)**.

```bat
C:\xampp\mysql\bin\mysql.exe -u root < database\sql\lpske.sql
```

### 7. Symlink storage (agar gambar/upload tampil)

```bash
php artisan storage:link
```

### 8. Jalankan aplikasi

Untuk sekadar menjalankan, cukup **satu perintah**:

```bash
php artisan serve
```

Buka **http://localhost:8000**.

> **Catatan tampilan (Vite):** CSS & JS halaman dibangun oleh Vite. Ada dua pilihan:
> - **Mode development** — jalankan `npm run dev` di terminal kedua (hot-reload saat kode diubah).
> - **Sekadar menjalankan** — build aset sekali saja dengan `npm run build`, setelah itu cukup
>   `php artisan serve` tanpa perlu terminal kedua.
>
> ```bash
> # Terminal 1 — backend
> php artisan serve
>
> # Terminal 2 — frontend (opsional, hanya untuk mode development)
> npm run dev
> ```

---

## Akun Login

Aplikasi punya **tiga halaman login terpisah**, satu untuk tiap peran. Sebuah akun **hanya bisa
login lewat halaman yang sesuai perannya** — misalnya akun anggota tidak bisa masuk lewat `/admin`
walaupun email & password benar. (Logika ini ada di `app/Auth/RoleUserProvider.php`, yang
menambahkan syarat `role` saat proses login.)

Tiga halaman login sesuai peran:

| Peran | Halaman login |
|---|---|
| **Admin** | http://localhost:8000/admin |
| **Asisten** | http://localhost:8000/asisten |
| **Anggota** | http://localhost:8000/anggota |

> **Kredensial (email & password) tidak dicantumkan di sini demi keamanan** — hubungi pemilik
> project untuk mendapatkan akun login. Akun sudah tersimpan di dalam database `lpske` yang diimpor.
>
> Kalau perlu membuat akun default sendiri (admin / asisten / anggota), jalankan seeder:
> ```bash
> php artisan db:seed --class=AdminSeeder
> ```
> Detail email & password default ada di file `database/seeders/AdminSeeder.php`.

---

## Struktur Halaman & Fitur

### A. Halaman Publik (tanpa login)

Diakses siapa saja lewat browser, dilayani oleh `LandingController` (`routes/web.php`).

| Halaman | URL | Isi / Fitur |
|---|---|---|
| Beranda / Landing | `/` | Halaman utama: profil lab, tim, ringkasan konten |
| Asisten Laboratorium | `/asisten-laboratorium` | Daftar asisten lab |
| Asisten per Angkatan | `/asisten-laboratorium/angkatan/{angkatan}` | Daftar asisten difilter per angkatan |
| Kepala Laboratorium | `/kepala-laboratorium` | Profil kepala lab |
| Dosen Laboratorium | `/dosen-laboratorium` | Profil dosen lab |
| Prestasi & Kegiatan | `/prestasi-kegiatan` dan `/prestasi-kegiatan/{id}` | Dokumentasi prestasi & kegiatan (daftar + detail) |
| Kolaborator | `/kolaborator` | Daftar mitra/kolaborator |
| Alumni Story | `/alumni` | Kisah/cerita alumni |
| Recent Logbook | `/recent-logbook` | Endpoint data logbook terbaru |

### B. Panel Admin — `/admin`

Panel manajemen penuh (Filament). Fitur (dikelompokkan sesuai menu navigasi):

- **Manajemen Website**
  - **Tim** — kelola anggota tim yang tampil di website
  - **Alumni Story** — kelola cerita alumni
  - **Dokumentasi: Prestasi & Kegiatan** — kelola prestasi & kegiatan
- **Kelola Akun**
  - **Asisten** — kelola akun berperan asisten
  - **Anggota** — kelola akun berperan anggota
- **Inventaris**
  - **Manajemen Alat & Barang** — data inventaris alat/barang lab
  - **Manajemen Peminjaman** — kelola peminjaman alat/barang
- **Manajemen Lab**
  - **Peminjaman Lab** — kelola peminjaman ruang/lab
- **Asisten**
  - **Logbook** — pantau logbook asisten
  - **Presensi** — pantau presensi asisten
- **Anggota**
  - **Perizinan** — kelola perizinan anggota

### C. Panel Asisten — `/asisten`

Panel khusus asisten lab. Fitur:

- **Logbook** — mengisi & mengelola logbook kegiatan
- **Presensi** — mencatat presensi

### D. Panel Anggota — `/anggota`

Panel khusus anggota. Fitur:

- **Daftar Alat & Barang** — melihat inventaris alat/barang
- **Peminjaman Saya** — mengajukan & memantau peminjaman alat/barang
- **Peminjaman Lab** — mengajukan peminjaman ruang/lab
- **Perizinan** — mengajukan perizinan

---

## Struktur Teknis Singkat

- **Framework:** Laravel 12 (PHP 8.2+)
- **Admin panel:** Filament 3 — 3 panel (`AdminPanelProvider`, `AsistenPanelProvider`, `AnggotaPanelProvider` di `app/Providers/Filament/`)
- **Auth berbasis peran:** guard `admin`, `asisten`, `anggota` (`config/auth.php`) + `RoleUserProvider` + middleware `AdminMiddleware` / `AsistenMiddleware` / `AnggotaMiddleware`
- **Frontend publik:** Blade + Tailwind CSS 4 + Vite (`resources/views/`)
- **Database:** MySQL/MariaDB — tabel utama: `users`, `teams`, `inventory_items`, `peminjaman`, `peminjaman_lab`, `logbooks`, `presensis`, `perizinans`, `prestasi_kegiatan`, `alumni_story`

---

## Perintah yang Sering Dipakai

```bash
php artisan serve          # jalankan server (port 8000)
npm run dev                # jalankan Vite (development)
npm run build              # build aset untuk production
php artisan migrate        # jalankan migration
php artisan db:seed        # jalankan seeder
php artisan storage:link   # symlink storage ke public
php artisan config:clear   # bersihkan cache config (setelah ubah .env)
```
