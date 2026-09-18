<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AkademikController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', function () {
    return 'Halaman Artikel';
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);

Route::post('/matakuliah', [MatakuliahController::class, 'store'])
    ->name('matakuliah.store');

Route::get('/akademik', [AkademikController::class, 'index']);