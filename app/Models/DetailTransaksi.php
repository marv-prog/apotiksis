<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id_detail';
    
    // aktifkan karena di phpmyadmin ada kolom created_at & updated_at
    public $timestamps = true; 

    protected $fillable = [
        'id_transaksi',
        'id_obat',
        'jumlah',
        'harga',
        'total'
    ];

    // hubungkan dengan id_obat di DetailTransaksi
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}