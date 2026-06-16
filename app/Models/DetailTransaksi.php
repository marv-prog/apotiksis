<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id_detail';
    
    public $timestamps = true; 

    protected $fillable = [
        'id_transaksi',
        'id_obat',
        'jumlah',
        'harga',
        'total'
    ];

    // Relasi ke tabel Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }

    // Relasi balik ke Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}