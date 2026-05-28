<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil total semua data obat
        $total_obat = DB::table('obats')->count();

        // 2. Ambil data obat yang stoknya menipis (di bawah atau sama dengan 10)
        $data_stok_rendah = DB::table('obats')->where('stok', '<=', 10)->get();

        // 3. Kita masukkan data yang sama ke dalam dua variabel berbeda ($stok_limit DAN $obat)
        // Biar baris 27 dan baris 66 di template blade kamu sama-sama puas!
        $stok_limit = $data_stok_rendah;
        $obat = $data_stok_rendah;

        // Lempar semua variabelnya ke halaman dashboard
        return view('admin.dashboard', compact('total_obat', 'stok_limit', 'obat')); 
    }
}