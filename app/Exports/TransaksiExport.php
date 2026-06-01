<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Transaksi::with('user')->orderBy('id_transaksi', 'desc')->get();
    }

    /**
    * Menambahkan Header Kolom Baru di Excel
    */
    public function headings(): array
    {
        return [
            'No. Transaksi',
            'Nama Pelanggan',
            'No. Telepon',
            'Alamat',
            'Total Harga',
            'Jumlah Bayar',
            'Tanggal Transaksi'
        ];
    }

    /**
    * Memetakan Data Nilainya Kedalam Baris Kolom Excel
    */
    public function map($transaksi): array
    {
        return [
            $transaksi->id_transaksi,
            $transaksi->user->nama_user ?? 'Umum/Guest',
            $transaksi->user->no_hp ?? '-',
            $transaksi->user->alamat ?? '-',
            'Rp ' . number_format($transaksi->total_harga, 0, ',', '.'),
            'Rp ' . number_format($transaksi->bayar, 0, ',', '.'),
            $transaksi->tanggal
        ];
    }
}