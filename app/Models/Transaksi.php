<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_user',
        'total_harga',
        'bayar',
        'tanggal_transaksi', 
        'metode_pembayaran',
    ];

    public $timestamps = false; 
// hubungkan dengan User berdasarkan id_user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    // hubungkan dengan DetailTransaksi berdasarkan id_transaksi
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }
}