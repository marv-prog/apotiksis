<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats'; 
    protected $primaryKey = 'id_obat';

    protected $fillable = [
        'nama_obat', 
        'foto_obat', // Sesuaikan dengan nama kolom di database Anda
        'id_kategori', 
        'harga_obat', 
        'satuan', 
        'deskripsi_obat', // Sesuaikan dengan entitas awal Anda
        'stok', 
        'tanggal_exp', 
        'waktu_produksi'
    ];

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    // Relasi ke Detail Transaksi (untuk melihat riwayat penjualan obat ini)
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_obat', 'id_obat');
    }
}