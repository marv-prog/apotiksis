<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id_detail';
    
    // Aktifkan karena di phpMyAdmin kamu ada kolom created_at & updated_at
    public $timestamps = true; 

    protected $fillable = [
        'id_transaksi',
        'id_obat',
        'jumlah',
        'harga',
        'total'
    ];

    // Hubungkan Detail ke tabel Obat kustom kamu (Primary Key: id_obat)
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}