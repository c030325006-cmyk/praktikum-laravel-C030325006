<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', function () {
    return 'Halaman Artikel';
});

Route::get('/sapa', function () {
    return view('sapa');
});

Route::get('/sapa-array', function () {
    $data = [
        'nama' => 'Ahmad Nabil',
        'nim' => 'C030325006',
        'prodi' => 'D3 Teknik Informatika'
    ];

    return view('sapa', $data);
});

Route::get('/profil', function () {
    return view('profil')
        ->with('nama', 'Ahmad Nabil')
        ->with('nim', 'C030325006')
        ->with('prodi', 'D3 Teknik Informatika');
});

Route::get('/akademik/statistik', function () {
    return view('akademik.statistik');
});

Route::get('/blade-demo', function () {
    $nama = 'Ahmad Nabil';
    $nim = 'C030325006';
    $prodi = 'D3 Teknik Informatika';

    $html = '<strong>Teks HTML Tebal</strong>';

    $xss = "<script>alert('XSS')</script>";

    return view('blade-demo', compact(
        'nama',
        'nim',
        'prodi',
        'html',
        'xss'
    ));
});

Route::get('/blade-mahasiswa', function () {
    $mahasiswa = \App\Models\Mahasiswa::take(5)->get();

    return view('blade-mahasiswa', compact('mahasiswa'));
});

/*
|--------------------------------------------------------------------------
| Resource Mahasiswa
|--------------------------------------------------------------------------
*/

Route::resource('mahasiswa', MahasiswaController::class);

/*
|--------------------------------------------------------------------------
| Resource Mata Kuliah
|--------------------------------------------------------------------------
*/

Route::resource('matakuliah', MatakuliahController::class)
    ->only(['index', 'show', 'create', 'store']);

/*
|--------------------------------------------------------------------------
| Route Akademik
|--------------------------------------------------------------------------
*/

Route::prefix('akademik')->group(function () {

    Route::get('/mahasiswa', function () {
        $data = Mahasiswa::all();

        return view('mahasiswa.index', compact('data'));
    });

});

Route::get('/halo', function () {
    return 'Halo, Selamat Datang di Laravel!';
});