<?php

namespace App\Models;

// PASTIKAN BARIS INI TEPAT MENGGUNAKAN BAWAAN ASLI LARAVEL:
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Menandakan Primary Key tabel kita namanya id_user, bukan id
    protected $primaryKey = 'id_user';

    // Kolom yang boleh diisi (Sinkron dengan gambar entitas e558e6)
    protected $fillable = [
        'nama_user',
        'username',
        'email',
        'password',
        'role',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}