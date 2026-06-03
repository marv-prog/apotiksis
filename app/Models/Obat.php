<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats'; // nama tabel di database
    protected $primaryKey = 'id_obat'; // primary key khusus karena bukan 'id' default

    // ini daftar kolom yang wajib ada supaya bisa simpan data
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