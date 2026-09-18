# Praktikum Laravel - C030325006

## Identitas

* **Nama:** Ahmad Nabil
* **NIM:** C030325006
* **Mata Kuliah:** Pemrograman Web

## Deskripsi Proyek

Proyek ini merupakan Tugas Besar Integrasi dari Praktikum Web Laravel 13. Proyek menggabungkan materi Praktikum 1–5 menjadi sebuah mini aplikasi **Manajemen Data Akademik**.

Aplikasi menampilkan data dosen dan data mata kuliah yang saling berelasi menggunakan **Eloquent ORM** Laravel.

## Fitur Utama

* Menampilkan data dosen.
* Menampilkan data mata kuliah.
* Menampilkan relasi antara dosen dan mata kuliah.
* Menggunakan migration untuk membuat struktur database.
* Menggunakan Model dan relasi Eloquent.
* Menggunakan Factory dan Seeder untuk membuat data dummy.
* Menggunakan Artisan Command untuk membuat Controller dan Request.
* Menampilkan data melalui halaman web Laravel.

## Relasi Database

Proyek menggunakan dua tabel utama yang saling berelasi:

* **users** sebagai data dosen.
* **matakuliahs** sebagai data mata kuliah.

Relasi yang digunakan:

* Satu dosen dapat memiliki banyak mata kuliah (**hasMany**).
* Satu mata kuliah dimiliki oleh satu dosen (**belongsTo**).

Kolom `dosen_id` pada tabel `matakuliahs` digunakan sebagai foreign key yang mengarah ke tabel `users`.

## Data Dummy

Factory dan Seeder digunakan untuk menghasilkan data dummy.

Data yang dibuat:

* 20 data dosen.
* 20 data mata kuliah.

Seeder utama memanggil `MatakuliahSeeder` untuk menjalankan proses pengisian data secara otomatis.

## Artisan Command yang Digunakan

Beberapa perintah Artisan yang digunakan dalam proses pembuatan proyek:

```bash
php artisan make:controller AkademikController
php artisan make:controller AkademikResourceController --resource
php artisan make:request StoreAkademikRequest
```

Perintah tersebut digunakan untuk membuat Controller, Resource Controller, dan Form Request.

Perintah lain yang digunakan untuk database dan menjalankan aplikasi:

```bash
php artisan migrate:fresh --seed
php artisan serve
```

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/c030325006-cmyk/praktikum-laravel-C030325006.git
```

### 2. Masuk ke Folder Project

```bash
cd praktikum-laravel-C030325006
```

### 3. Install Dependency

```bash
composer install
```

### 4. Buat File Environment

Salin `.env.example` menjadi `.env`, kemudian sesuaikan konfigurasi database.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=praktikum_laravel_C030325006
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migration dan Seeder

```bash
php artisan migrate:fresh --seed
```

Perintah tersebut akan membuat struktur database sekaligus mengisi data dummy.

### 7. Jalankan Server Laravel

```bash
php artisan serve
```

Kemudian buka:

```text
http://127.0.0.1:8000/akademik
```

## Halaman Final

Halaman `/akademik` menampilkan:

1. Data Dosen.
2. Data Mata Kuliah.
3. Nama dosen yang berelasi dengan setiap mata kuliah.

## Bukti Dokumentasi

Dokumentasi proyek meliputi:

* Screenshot migration.
* Screenshot proses Factory dan Seeder.
* Screenshot hasil `php artisan migrate:fresh --seed`.
* Screenshot penggunaan minimal tiga perintah Artisan `make`.
* Screenshot hasil pengecekan data melalui Tinker.
* Screenshot halaman web final `/akademik`.
* Screenshot proses commit dan push ke GitHub.

## Repository GitHub

Repository proyek:

https://github.com/c030325006-cmyk/praktikum-laravel-C030325006.git

## Catatan Pengumpulan

Folder `vendor/`, `node_modules/`, dan file `.env` tidak disertakan dalam file ZIP pengumpulan.

Dependency dapat dipasang kembali menggunakan:

```bash
composer install
```

Kemudian konfigurasi `.env` dapat dibuat dari `.env.example`.
