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
        // 1. Hitung data statistik untuk kotak-kotak dashboard atas
        $total_obat = Obat::count();
        $stok_menipis = Obat::where('stok', '<=', 10)->count();
        
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');

        // 2. AMBIL DATA FISIK OBAT (Menyelesaikan error Undefined variable $obat)
        // Kita ambil semua data obat untuk ditampilkan pada tabel "Daftar Stok Obat Terbaru"
        $obat = Obat::orderBy('created_at', 'desc')->get();

        // 3. Otomatisasi pengisian arsip data ke tabel laporans (Sesuai Notepad)
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

        // 4. Kirim semua variabel ($obat wajib ikut masuk ke compact)
        return view('admin.dashboard', compact(
            'total_obat', 
            'stok_menipis', 
            'total_transaksi', 
            'total_pendapatan',
            'obat'
        ));
    }
}