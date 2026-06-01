<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'periode_awal',
        'periode_akhir',
        'total_transaksi',
        'total_pendapatan',
        'dibuat_pada'
    ];

    // Matikan timestamps default karena kita pakai 'dibuat_pada'
    public $timestamps = false;
}