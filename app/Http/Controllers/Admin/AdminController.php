<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\Laporan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // buat hitung data statistik untuk kotak-kotak dashboard atas
        $total_obat = Obat::count();
        $stok_menipis = Obat::where('stok', '<=', 10)->count();
        
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');

        // buat ambil data obat terbaru untuk ditampilkan di tabel bawah dashboard
        // buat ambil semua data obat untuk ditampilkan pada tabel daftar stok obat terbaru di dashboard
        $obat = Obat::orderBy('created_at', 'desc')->get();

        // otomatisasi pengisian arsip data ke tabel laporan setiap awal bulan
        $awalBulan = date('Y-m-01');
        $akhirBulan = date('Y-m-t');

        Laporan::updateOrCreate(
            [
                'periode_awal' => $awalBulan,
                'periode_akhir' => $akhirBulan
            ],
            [
                'total_transaksi' => $total_transaksi,
                'total_pendapatan' => $total_pendapatan,
                'dibuat_pada' => now()
            ]
        );

        // untuk kirim semua variabel ($obat wajib ikut masuk ke compact)
        return view('admin.dashboard', compact(
            'total_obat', 
            'stok_menipis', 
            'total_transaksi', 
            'total_pendapatan',
            'obat'
        ));
    }
}