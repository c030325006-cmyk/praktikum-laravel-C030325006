# Praktikum Laravel - C030325006

## Sistem Informasi Akademik

---

## 1. Identitas

**Nama:** Ahmad Nabil

**NIM:** C030325006

**Mata Kuliah:** Pemrograman Web

**Program Studi:** D3 Teknik Informatika

**Jurusan:** Elektro

**Politeknik Negeri Banjarmasin

---

## 2. Deskripsi Proyek

Project ini merupakan Final Project dari Praktikum Pemrograman Web menggunakan Laravel 13.

Project dikembangkan dalam bentuk mini **Sistem Informasi Akademik** yang mengintegrasikan materi praktikum mengenai:

- Routing
- Controller
- Model
- View
- Blade Templating Engine
- Resource Route
- Route Model Binding
- Passing Data dari Controller ke View
- Blade Control Structure
- Master Layout
- Partial
- Named Route
- Navigasi antar halaman

Project memiliki dua modul utama, yaitu:

1. Modul Mahasiswa
2. Modul Mata Kuliah

Kedua modul tersebut dapat diakses melalui halaman web dan saling terhubung menggunakan navigasi berbasis named route.

---

# 3. Modul Sistem

## 3.1 Modul Mahasiswa

Modul Mahasiswa digunakan untuk menampilkan dan mengelola data mahasiswa.

Fitur yang tersedia:

- Menampilkan daftar mahasiswa.
- Menampilkan detail mahasiswa.
- Membuat data mahasiswa.
- Mengubah data mahasiswa.
- Menghapus data mahasiswa.
- Menggunakan Resource Route.
- Menggunakan Route Model Binding.
- Menggunakan Controller untuk mengambil dan mengirim data.
- Menggunakan Blade sebagai View.
- Menggunakan named route untuk navigasi.

### Halaman utama

```text
http://127.0.0.1:8000/mahasiswa
```

### Halaman detail

```text
http://127.0.0.1:8000/mahasiswa/{mahasiswa}
```

---

## 3.2 Modul Mata Kuliah

Modul Mata Kuliah digunakan untuk menampilkan data mata kuliah.

Fitur yang tersedia:

- Menampilkan daftar mata kuliah.
- Menampilkan detail mata kuliah.
- Menampilkan kode mata kuliah.
- Menampilkan nama mata kuliah.
- Menampilkan jumlah SKS.
- Menampilkan semester.
- Menampilkan keterangan berdasarkan jumlah SKS.
- Menggunakan Resource Route.
- Menggunakan Route Model Binding.
- Menggunakan Blade `@forelse`.
- Menggunakan `$loop`.
- Menggunakan kondisi `@if`.
- Menggunakan named route untuk navigasi.

### Halaman utama

```text
http://127.0.0.1:8000/matakuliah
```

### Halaman detail

```text
http://127.0.0.1:8000/matakuliah/{matakuliah}
```

---

# 4. Database dan Relasi

Project menggunakan database MySQL/MariaDB sebagai penyimpanan data.

Salah satu relasi yang digunakan pada project adalah relasi antara data dosen dan mata kuliah.

Tabel yang digunakan antara lain:

- `users`
- `matakuliahs`
- `mahasiswas`

Pada tabel `matakuliahs`, kolom `dosen_id` digunakan sebagai foreign key yang menghubungkan mata kuliah dengan data dosen pada tabel `users`.

Relasi Eloquent yang digunakan:

- Dosen/User memiliki banyak mata kuliah (`hasMany`).
- Mata kuliah dimiliki oleh satu dosen (`belongsTo`).

Relasi tersebut memungkinkan data dosen yang berhubungan dengan mata kuliah ditampilkan melalui Eloquent ORM.

---

# 5. Model

Model digunakan sebagai penghubung antara aplikasi Laravel dengan database.

Model yang digunakan dalam project antara lain:

```text
app/Models/User.php
app/Models/Mahasiswa.php
app/Models/Matakuliah.php
```

Model `Mahasiswa` digunakan untuk mengakses data mahasiswa.

Model `Matakuliah` digunakan untuk mengakses data mata kuliah.

Model `User` digunakan untuk data pengguna/dosen yang berhubungan dengan mata kuliah.

---

# 6. Controller

Controller digunakan untuk mengatur proses aplikasi dan mengambil data dari Model sebelum dikirimkan ke View.

Controller utama yang digunakan dalam Final Project:

```text
app/Http/Controllers/MahasiswaController.php
app/Http/Controllers/MatakuliahController.php
```

### MahasiswaController

Controller Mahasiswa menangani proses:

- Menampilkan daftar mahasiswa.
- Menampilkan detail mahasiswa.
- Membuat data mahasiswa.
- Menyimpan data mahasiswa.
- Mengubah data mahasiswa.
- Menghapus data mahasiswa.

### MatakuliahController

Controller Mata Kuliah menangani proses:

- Menampilkan daftar mata kuliah.
- Menampilkan detail mata kuliah.
- Menampilkan halaman pembuatan data.
- Menyimpan data mata kuliah.

---

# 7. Routing

Project menggunakan Laravel Routing untuk menentukan halaman yang dapat diakses melalui URL.

## 7.1 Resource Route Mahasiswa

Modul Mahasiswa menggunakan Resource Route:

```php
Route::resource('mahasiswa', MahasiswaController::class);
```

Route tersebut menghasilkan beberapa route:

```text
GET|HEAD    mahasiswa
POST        mahasiswa
GET|HEAD    mahasiswa/create
GET|HEAD    mahasiswa/{mahasiswa}
PUT|PATCH   mahasiswa/{mahasiswa}
DELETE      mahasiswa/{mahasiswa}
GET|HEAD    mahasiswa/{mahasiswa}/edit
```

Named route yang digunakan antara lain:

```text
mahasiswa.index
mahasiswa.create
mahasiswa.store
mahasiswa.show
mahasiswa.edit
mahasiswa.update
mahasiswa.destroy
```

---

## 7.2 Resource Route Mata Kuliah

Modul Mata Kuliah menggunakan Resource Route yang dibatasi menggunakan `only()`:

```php
Route::resource('matakuliah', MatakuliahController::class)
    ->only(['index', 'show', 'create', 'store']);
```

Route yang digunakan:

```text
GET|HEAD    matakuliah
POST        matakuliah
GET|HEAD    matakuliah/create
GET|HEAD    matakuliah/{matakuliah}
```

Named route:

```text
matakuliah.index
matakuliah.create
matakuliah.store
matakuliah.show
```

---

# 8. Route Model Binding

Project menggunakan Route Model Binding untuk mengambil data berdasarkan ID secara otomatis.

Contoh pada `MahasiswaController`:

```php
public function show(Mahasiswa $mahasiswa)
{
    return view('mahasiswa.show', compact('mahasiswa'));
}
```

Contoh pada `MatakuliahController`:

```php
public function show(Matakuliah $matakuliah)
{
    return view('matakuliah.show', compact('matakuliah'));
}
```

Dengan Route Model Binding, Laravel secara otomatis mencari data berdasarkan parameter yang diberikan pada URL.

Jika data tidak ditemukan, Laravel akan menampilkan halaman 404.

---

# 9. View dan Blade

Project menggunakan Blade sebagai template engine Laravel.

Struktur View utama:

```text
resources/views/
│
├── layouts/
│   └── app.blade.php
│
├── partials/
│   └── navbar.blade.php
│
├── mahasiswa/
│   ├── index.blade.php
│   └── show.blade.php
│
└── matakuliah/
    ├── index.blade.php
    └── show.blade.php
```

---

# 10. Master Layout

Project menggunakan Master Layout untuk menghindari penulisan struktur HTML yang sama berulang kali.

File Master Layout:

```text
resources/views/layouts/app.blade.php
```

Master Layout menggunakan:

```blade
@yield('title')
@yield('content')
```

Halaman Mahasiswa dan Mata Kuliah menggunakan:

```blade
@extends('layouts.app')
```

dan:

```blade
@section('title')
```

serta:

```blade
@section('content')
```

Dengan Master Layout, struktur halaman menjadi lebih teratur dan mudah dikembangkan.

---

# 11. Partial Navbar

Navbar dipisahkan menjadi file partial:

```text
resources/views/partials/navbar.blade.php
```

Navbar kemudian dipanggil pada Master Layout menggunakan:

```blade
@include('partials.navbar')
```

Navbar menyediakan navigasi menuju:

- Mahasiswa
- Mata Kuliah

Navigasi menggunakan named route Laravel.

Contoh:

```blade
<a href="{{ route('mahasiswa.index') }}">
    Mahasiswa
</a>
```

dan:

```blade
<a href="{{ route('matakuliah.index') }}">
    Mata Kuliah
</a>
```

---

# 12. Blade Control Structure

Project menggunakan beberapa fitur control structure pada Blade.

## 12.1 `@forelse`

`@forelse` digunakan untuk melakukan perulangan data mata kuliah sekaligus menangani kondisi ketika data kosong.

Contoh:

```blade
@forelse ($matakuliahs as $mk)

    {{ $mk->nama_mk }}

@empty

    Belum ada data mata kuliah.

@endforelse
```

---

## 12.2 `$loop`

Project menggunakan beberapa properti `$loop`.

### `$loop->iteration`

Digunakan untuk menampilkan nomor urut data.

```blade
{{ $loop->iteration }}
```

### `$loop->first`

Digunakan untuk mengetahui apakah data merupakan data pertama.

```blade
$loop->first
```

### `$loop->last`

Digunakan untuk mengetahui apakah data merupakan data terakhir.

```blade
$loop->last
```

---

# 13. Kondisi `@if`

Kondisi `@if` digunakan untuk memberikan keterangan berdasarkan jumlah SKS mata kuliah.

Contoh:

```blade
@if ($mk->sks > 3)
    <strong>SKS Besar</strong>
@else
    Normal
@endif
```

Jika jumlah SKS lebih dari 3, maka akan ditampilkan keterangan:

```text
SKS Besar
```

Jika jumlah SKS tidak lebih dari 3, maka akan ditampilkan:

```text
Normal
```

---

# 14. Navigasi Antar Modul

Project menyediakan navigasi antara modul Mahasiswa dan Mata Kuliah.

Dari halaman Mahasiswa dapat menuju:

```text
/matakuliah
```

Dari halaman Mata Kuliah dapat kembali menuju:

```text
/mahasiswa
```

Navigasi menggunakan named route agar URL tidak ditulis secara langsung pada setiap link.

---

# 15. Daftar Route Utama

Berikut route utama yang digunakan dalam project.

## Mahasiswa

```text
mahasiswa.index
mahasiswa.store
mahasiswa.create
mahasiswa.show
mahasiswa.update
mahasiswa.destroy
mahasiswa.edit
```

## Mata Kuliah

```text
matakuliah.index
matakuliah.store
matakuliah.create
matakuliah.show
```

---

# 16. Teknologi yang Digunakan

Project dibuat menggunakan:

- Laravel 13
- PHP 8.4
- MySQL / MariaDB
- Blade Template Engine
- Eloquent ORM
- HTML
- Composer
- XAMPP
- Visual Studio Code

---

# 17. Cara Menjalankan Project

## 17.1 Clone Repository

```bash
git clone https://github.com/c030325006-cmyk/praktikum-laravel-C030325006.git
```

## 17.2 Masuk ke Folder Project

```bash
cd praktikum-laravel-C030325006
```

## 17.3 Install Dependency

```bash
composer install
```

Jika project menggunakan dependency frontend yang diperlukan, jalankan:

```bash
npm install
```

## 17.4 Membuat File `.env`

Salin:

```text
.env.example
```

menjadi:

```text
.env
```

Kemudian sesuaikan konfigurasi database.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=praktikum_laravel_C030325006
DB_USERNAME=root
DB_PASSWORD=
```

## 17.5 Generate Application Key

```bash
php artisan key:generate
```

## 17.6 Menjalankan Migration

Jika database belum dibuat:

```bash
php artisan migrate
```

## 17.7 Menjalankan Server Laravel

```bash
php artisan serve
```

Setelah server berjalan, buka:

```text
http://127.0.0.1:8000
```

---

# 18. Halaman yang Dapat Diakses

## Mahasiswa

Daftar mahasiswa:

```text
http://127.0.0.1:8000/mahasiswa
```

Detail mahasiswa:

```text
http://127.0.0.1:8000/mahasiswa/1
```

## Mata Kuliah

Daftar mata kuliah:

```text
http://127.0.0.1:8000/matakuliah
```

Detail mata kuliah:

```text
http://127.0.0.1:8000/matakuliah/1
```

---

# 19. Dokumentasi Praktikum

Dokumentasi project meliputi:

- Screenshot routing.
- Screenshot `php artisan route:list`.
- Screenshot halaman daftar Mahasiswa.
- Screenshot halaman detail Mahasiswa.
- Screenshot halaman daftar Mata Kuliah.
- Screenshot halaman detail Mata Kuliah.
- Screenshot penggunaan Blade `@forelse`.
- Screenshot penggunaan `$loop`.
- Screenshot penggunaan kondisi `@if`.
- Screenshot Master Layout.
- Screenshot Navbar Partial.
- Screenshot navigasi antar modul.
- Screenshot proses Git dan GitHub.

---

# 20. Repository GitHub

Repository project:

https://github.com/c030325006-cmyk/praktikum-laravel-C030325006.git

---

# 21. Catatan Pengumpulan

Untuk file ZIP pengumpulan, folder berikut tidak disertakan:

```text
vendor/
node_modules/
```

File environment berikut juga tidak disertakan:

```text
.env
```

File berikut tetap disertakan karena diperlukan sebagai contoh konfigurasi:

```text
.env.example
```

Dependency Laravel dapat dipasang kembali menggunakan:

```bash
composer install
```

Jika diperlukan dependency frontend:

```bash
npm install
```

File `.env` dapat dibuat kembali dari:

```text
.env.example
```

---

# 22. Kesimpulan

Final Project ini merupakan implementasi Sistem Informasi Akademik sederhana menggunakan Laravel 13.

Project memiliki dua modul utama, yaitu Mahasiswa dan Mata Kuliah.

Pada project ini diterapkan beberapa konsep Laravel, yaitu Routing, Resource Route, Controller, Model, View, Eloquent ORM, Route Model Binding, Blade Templating Engine, `@forelse`, `$loop`, `@if`, Master Layout, Partial, dan Named Route.

Penggunaan Master Layout dan Partial membuat struktur tampilan menjadi lebih terorganisir, sedangkan penggunaan Controller, Model, dan View membuat proses pengolahan dan penyajian data menjadi lebih terstruktur.

Project ini dibuat sebagai implementasi materi Praktikum Pemrograman Web menggunakan Laravel 13.