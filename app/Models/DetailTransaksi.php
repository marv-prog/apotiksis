<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id_detail';
    
    // Sudah benar, aktifkan timestamps karena di database ada created_at & updated_at
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

    // TAMBAHAN: Relasi balik ke Transaksi
    // Ini membantu jika Anda ingin memanggil $detail->transaksi->tanggal_transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}