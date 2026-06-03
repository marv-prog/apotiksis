<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // menandakan Primary Key tabel namanya id_user, bukan id
    protected $primaryKey = 'id_user';

    // kolom yang boleh diisi (sinkron dengan gambar entitas e558e6)
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