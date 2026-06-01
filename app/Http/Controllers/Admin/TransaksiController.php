<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi untuk ditampilkan di halaman laporan
        $transaksi = Transaksi::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function exportExcel()
    {
        // Mendownload otomatis sebagai file Excel xlsx
        return Excel::download(new TransaksiExport, 'Laporan_Transaksi_Apotek_' . date('Y-m-d') . '.xlsx');
    }
}