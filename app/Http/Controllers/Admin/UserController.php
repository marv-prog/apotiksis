<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * menampilkan daftar semua user/pelanggan
     */
    public function index()
    {
        // mengambil semua data user dari database
        // jika di aplikasi kamu ada pembagian role, kamu bisa filter, contoh: User::where('role', 'user')->get();
        $users = User::all(); 

        // mengirim data ke halaman view admin/user/index.blade.php
        return view('admin.user.index', compact('users'));
    }

    /**
     * menghapus data user berdasarkan id yang dipilih
     */
    public function destroy($id)
    {
        // cari user berdasarkan id, jika tidak ketemu langsung otomatis error 404
        $user = User::findOrFail($id);
        
        // eksekusi hapus data
        $user->delete();

        // lempar kembali ke halaman list user dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil dihapus!');
    }
}