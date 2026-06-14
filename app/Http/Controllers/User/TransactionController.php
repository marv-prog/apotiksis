<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil semua transaksi milik user yang sedang login
        $transactions = Transaksi::where('id_user', Auth::id())
                                 ->orderBy('tanggal_transaksi', 'desc')
                                 ->get();
        return view('user.riwayat_transaksi', compact('transactions'));
    }

    public function show($id)
    {
        // Mengambil detail transaksi berdasarkan ID
        $transaksi = Transaksi::with(['detailTransaksi.obat'])
                                ->where('id_transaksi', $id)
                                ->firstOrFail();
                                
        return view('user.detail_transaksi', compact('transaksi'));
    }
}