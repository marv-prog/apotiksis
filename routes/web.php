<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\KategoriController;

// Panggil file landing.blade.php di dalam folder user
Route::get('/', function () {
    return view('user.landing');
});

// Halaman dashboard untuk Role Admin (Lewat Controller)
Route::get('/admin/dashboard', [ObatController::class, 'index']);

// Halaman untuk menampilkan form tambah data obat
Route::get('/admin/obat/create', [ObatController::class, 'create']);

// Halaman Utama Daftar Obat
Route::get('/admin/obat', [ObatController::class, 'index']);

// Route untuk menyimpan data obat baru
Route::post('/admin/obat', [ObatController::class, 'store']);

// Route untuk menampilkan halaman edit
Route::get('/admin/obat/{id}/edit', [ObatController::class, 'edit']);

// Route untuk memproses update data
Route::put('/admin/obat/{id}', [ObatController::class, 'update']);

// Route untuk menghapus data obat
Route::delete('/admin/obat/{id}', [ObatController::class, 'destroy']);

// Route untuk halaman kategori
Route::get('/admin/kategori', [KategoriController::class, 'index']);