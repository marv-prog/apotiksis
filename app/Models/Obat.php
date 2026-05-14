<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats'; // Nama tabel di database
    protected $primaryKey = 'id_obat'; // Primary Key kamu

    // Ini adalah daftar kolom yang WAJIB ada supaya bisa simpan data
    protected $fillable = [
        'nama_obat', 
        'foto',
        'id_kategori', 
        'harga_obat', 
        'satuan', 
        'deskripsi',
        'stok', 
        'tanggal_exp', 
        'waktu_produksi'
    ];
}