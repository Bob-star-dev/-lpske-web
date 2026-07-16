# Panduan Setup Database (XAMPP di Linux)

Dokumen ini menjelaskan cara menyiapkan database **`lpske`** menggunakan **XAMPP for Linux**
(terpasang di `/opt/lampp`). File SQL siap impor tersedia di **`database/sql/lpske.sql`**.

---

## 1. Jalankan MySQL/MariaDB

XAMPP versi Linux tidak punya control panel grafis; jalankan lewat terminal:

```bash
# Jalankan hanya MySQL
sudo /opt/lampp/lampp startmysql

# atau jalankan semua service (Apache + MySQL + ProFTPD)
sudo /opt/lampp/lampp start
```

Cek MySQL sudah berjalan dan lihat port-nya (umumnya **3306**):

```bash
ss -ltnp | grep 3306
```

> **Penting soal port:** nilai `DB_PORT` di file `.env` **harus sama** dengan port MySQL yang
> aktif di atas. Jika MySQL kamu jalan di 3306, maka `.env` harus `DB_PORT=3306`.

---

## 2. Impor database `lpske`

File `database/sql/lpske.sql` sudah berisi perintah `CREATE DATABASE` + seluruh tabel + data
(termasuk akun login). Cukup jalankan:

```bash
/opt/lampp/bin/mysql -u root < database/sql/lpske.sql
```

Jika user root MySQL kamu memakai password, tambahkan `-p`:

```bash
/opt/lampp/bin/mysql -u root -p < database/sql/lpske.sql
```

### Alternatif: buat manual lalu impor

```bash
# 1. Buat database kosong
/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS lpske CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 2. Impor data ke dalamnya
/opt/lampp/bin/mysql -u root lpske < database/sql/lpske.sql
```

### Alternatif: lewat phpMyAdmin

1. Jalankan Apache juga: `sudo /opt/lampp/lampp start`
2. Buka `http://localhost/phpmyadmin`
3. Buat database bernama `lpske` (collation `utf8mb4_unicode_ci`)
4. Tab **Import** → pilih file `database/sql/lpske.sql` → **Go**

---

## 3. Verifikasi

```bash
# Lihat daftar database
/opt/lampp/bin/mysql -u root -e "SHOW DATABASES;"

# Lihat tabel di dalam lpske
/opt/lampp/bin/mysql -u root -e "USE lpske; SHOW TABLES;"

# Cek akun yang tersedia
/opt/lampp/bin/mysql -u root -e "SELECT id, name, email, role FROM lpske.users;"
```

Kalau koneksi dari Laravel berhasil, perintah ini akan menampilkan status migration:

```bash
php artisan migrate:status
```

---

## 4. (Opsional) Membuat database dari nol tanpa file SQL

Kalau ingin membangun struktur dari migration Laravel, bukan dari file SQL:

```bash
# Buat database kosong dulu
/opt/lampp/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS lpske CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Jalankan migration + seeder (membuat akun default)
php artisan migrate --seed
```

> Cara ini membuat akun default dari seeder: `admin@lpske.com / admin123`,
> `asisten@lpske.com / asisten123`, `anggota@lpske.com / anggota123`.

---

## 5. Membuat ulang file SQL (backup / ekspor)

Kalau kamu mengubah data dan ingin memperbarui file `database/sql/lpske.sql`:

```bash
/opt/lampp/bin/mysqldump -u root --databases lpske \
  --add-drop-database --default-character-set=utf8mb4 \
  > database/sql/lpske.sql
```

---

## Troubleshooting

| Masalah | Penyebab & Solusi |
|---|---|
| `SQLSTATE[HY000] [2002] Connection refused` | MySQL belum jalan → `sudo /opt/lampp/lampp startmysql` |
| `Connection refused` padahal MySQL jalan | Port di `.env` salah. Cek dengan `ss -ltnp \| grep 3306` lalu samakan `DB_PORT` |
| `Access denied for user 'root'` | Password root salah. XAMPP default root **tanpa password** (`DB_PASSWORD=` kosong) |
| `Unknown database 'lpske'` | Database belum diimpor → ulangi langkah 2 |
| Perubahan `.env` tidak terbaca | Jalankan `php artisan config:clear` |
