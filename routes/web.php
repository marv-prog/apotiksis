<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\AuthController;

// ==========================================
//          ROUTE SISI USER / PEMBELI
// ==========================================

// Halaman Utama / Katalog Pembeli
Route::get('/', [CustomerController::class, 'index'])->name('user.landing');

// Route Filter Kategori (Biar tombol kategori di navbar/sidebar jalan)
Route::get('/kategori/{id}', [CustomerController::class, 'filterKategori'])->name('user.kategori.filter');

// Halaman Detail Obat
Route::get('/obat/{id}', [CustomerController::class, 'showObat'])->name('user.obat.detail');

// Pengaman jika halaman obat diakses tanpa ID
Route::get('/obat', [CustomerController::class, 'index']);

// Halaman Utama Tampilan Keranjang Belanja (Step 1)
Route::get('/keranjang', [CustomerController::class, 'viewKeranjang'])->name('user.keranjang.index');

// Aksi menambahkan obat ke dalam keranjang
Route::post('/keranjang/tambah/{id}', [CustomerController::class, 'tambahKeranjang'])->name('user.keranjang.tambah');

// Halaman Input Alamat / Metode Pengiriman (Step 2)
Route::get('/keranjang/alamat', [CustomerController::class, 'viewAlamat'])->name('user.keranjang.alamat');

// Proses simpan alamat ke session, lalu lempar ke halaman bayar
Route::post('/keranjang/simpan-alamat', [CustomerController::class, 'simpanAlamatSession'])->name('user.keranjang.simpan_alamat');

// Halaman Pilihan Metode Pembayaran (Step 3)
Route::get('/keranjang/pembayaran', [CustomerController::class, 'viewPembayaran'])->name('user.keranjang.pembayaran');

// Proses memasukkan semua data dari session ke database transaksi asli
Route::post('/keranjang/checkout', [CustomerController::class, 'checkoutTransaksi'])->name('user.keranjang.checkout');

// >>> DI SINI RUTE BARU DETAIL NOTA TRANSAKSI NYA <<<
Route::get('/keranjang/detail-transaksi/{id}', [CustomerController::class, 'detailTransaksi'])->name('user.keranjang.detail_transaksi');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
//          ROUTE SISI ADMIN (CRUD OBAT)
// ==========================================

// Halaman dashboard untuk Role Admin
Route::get('/admin/dashboard', [ObatController::class, 'index']);

// Halaman Utama Daftar Obat di Admin
Route::get('/admin/obat', [ObatController::class, 'index']);

// Halaman untuk menampilkan form tambah data obat
Route::get('/admin/obat/create', [ObatController::class, 'create']);

// Route untuk menyimpan data obat baru
Route::post('/admin/obat', [ObatController::class, 'store']);

// Route untuk menampilkan halaman edit obat
Route::get('/admin/obat/{id}/edit', [ObatController::class, 'edit']);

// Route untuk memproses update data obat
Route::put('/admin/obat/{id}', [ObatController::class, 'update']);

// Route untuk menghapus data obat
Route::delete('/admin/obat/{id}', [ObatController::class, 'destroy']);

// Route untuk menampilkan detail obat di sisi admin
Route::get('/admin/obat/{id}', [ObatController::class, 'show']);


// ==========================================
//        ROUTE SISI ADMIN (CRUD KATEGORI)
// ==========================================

// Halaman Utama Daftar Kategori
Route::get('/admin/kategori', [KategoriController::class, 'index']);

// Halaman untuk menampilkan form tambah kategori
Route::get('/admin/kategori/create', [KategoriController::class, 'create']);

// Route untuk menyimpan data kategori baru
Route::post('/admin/kategori', [KategoriController::class, 'store']);

// Route untuk menampilkan halaman edit kategori
Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit']);

// Route untuk memproses update data kategori
Route::put('/admin/kategori/{id}', [KategoriController::class, 'update']);

// Route untuk menghapus data kategori
Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy']);