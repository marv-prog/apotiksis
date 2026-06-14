<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TransaksiController; // <-- MENAMBAHKAN CONTROLLER TRANSAKSI ADMIN
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\TransactionController; // <-- MENAMBAHKAN CONTROLLER TRANSAKSI USER
use Illuminate\Foundation\Auth\EmailVerificationRequest; // Bawaan Laravel untuk verifikasi email
use Illuminate\Http\Request;


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

// FIX: Rute Update Jumlah dan Hapus Item Keranjang (Sudah disederhanakan agar seragam)
Route::post('/keranjang/update', [CustomerController::class, 'updateKeranjang'])->name('user.keranjang.update');
Route::delete('/keranjang/hapus/{id}', [CustomerController::class, 'hapusKeranjang'])->name('user.keranjang.hapus');

// Halaman Input Alamat / Metode Pengiriman (Step 2)
Route::get('/keranjang/alamat', [CustomerController::class, 'viewAlamat'])->name('user.keranjang.alamat');

// Proses simpan alamat ke session, lalu lempar ke halaman bayar
Route::post('/keranjang/simpan-alamat', [CustomerController::class, 'simpanAlamatSession'])->name('user.keranjang.simpan_alamat');

// Halaman Pilihan Metode Pembayaran (Step 3)
Route::get('/keranjang/pembayaran', [CustomerController::class, 'viewPembayaran'])->name('user.keranjang.pembayaran');

// Proses memasukkan semua data dari session ke database transaksi asli
Route::post('/keranjang/checkout', [CustomerController::class, 'checkoutTransaksi'])->name('user.keranjang.checkout');

// >>> RUTE BARU DETAIL NOTA TRANSAKSI NYA <<<
Route::get('/keranjang/detail-transaksi/{id}', [CustomerController::class, 'detailTransaksi'])->name('user.keranjang.detail_transaksi');

// >>> RUTE BARU UNTUK MENAMPILKAN HALAMAN QRIS PEMBELI <<<
Route::get('/keranjang/payment-qris/{id}', [CustomerController::class, 'paymentQris'])->name('user.keranjang.payment_qris');


// ==========================================
//          ROUTE AUTENTIKASI (LOGIN & REGISTER)
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); // <-- Tambahan rute buka form daftar
Route::post('/register', [AuthController::class, 'register'])->name('register');   // <-- Tambahan rute proses simpan daftar
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
//        ROUTE VERIFIKASI EMAIL ASLI
// ==========================================
// Tampilan halaman peringatan "Silakan cek inbox email kamu"
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Proses otomatis saat user mengklik link verifikasi di dalam emailnya
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('user.landing')->with('success', 'Email berhasil diverifikasi!');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Aksi tombol untuk kirim ulang email verifikasi jika tidak masuk
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi baru telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// ==========================================
//          ROUTE SISI ADMIN 
// ==========================================

// Halaman dashboard untuk Role Admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

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

// --- FIX: Rute Data User sekarang menggunakan URL /admin/user dan nama rute admin.user.---
Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user.index');
Route::delete('/admin/user/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');


// ==========================================
//      ROUTE BARU LAPORAN TRANSAKSI ADMIN 
// ==========================================
// Membuka halaman rekap penjualan obat
Route::get('/admin/transaksi', [TransaksiController::class, 'index']);
// Mengunduh rekap penjualan ke spreadsheet / excel (.xlsx)
Route::get('/admin/transaksi/export', [TransaksiController::class, 'exportExcel']);


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

// ==========================================
//          ROUTE ARTIKEL STATIC
// ==========================================

Route::get('/artikel/detail-sikap-denial', function () {
    return view('user.artikel.detail_sikap_denial'); // Sesuaikan dengan lokasi file view kamu
});

Route::get('/artikel/detail-darah-tinggi', function () {
    return view('user.artikel.detail_darah-tinggi');
});

Route::get('/artikel/detail-gusi-bengkak', function () {
    return view('user.artikel.detail_gusi-bengkak');
});

Route::get('/artikel/detail-hipertiroid', function () {
    return view('user.artikel.detail_hipertiroid');
});

Route::get('/artikel/detail-perut-hamil', function () {
    return view('user.artikel.detail_perut_hamil');
});

// ==========================================
//        ROUTE HALAMAN STATIS LAINNYA
// ==========================================
Route::get('/pengiriman', function () {
    return view('user.pengiriman'); // Mengarah ke folder resources/views/user/pengiriman.blade.php
})->name('user.pengiriman');

// ==========================================
//     ROUTE CARA ORDER (HALAMAN STATIS)
// ==========================================
Route::get('/cara-order', function () {
    return view('user.cara_order');
})->name('user.cara_order');

// ==========================================
//     route kebijakan privasi
// ==========================================
Route::get('/kebijakan-privasi', function () {
    return view('user.kebijakan_privasi');
})->name('user.kebijakan_privasi');

// ==========================================
// TENTANG KAMI (HALAMAN STATIS)
// ==========================================
Route::get('/tentang-kami', function () {
    return view('user.tentang_kami');
})->name('user.tentang_kami');

// ==========================================
// RIWAYAT TRANSAKSI USER
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat-transaksi', [TransactionController::class, 'index'])->name('user.riwayat');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('user.transaksi.detail');
});