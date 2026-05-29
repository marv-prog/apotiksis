<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua user/pelanggan
     */
    public function index()
    {
        // Mengambil semua data user dari database
        // Jika di aplikasi kamu ada pembagian role, kamu bisa filter, contoh: User::where('role', 'user')->get();
        $users = User::all(); 

        // Mengirim data ke halaman view admin/user/index.blade.php
        return view('admin.user.index', compact('users'));
    }

    /**
     * Menghapus data user berdasarkan ID
     */
    public function destroy($id)
    {
        // Cari user berdasarkan id, jika tidak ketemu langsung otomatis error 404
        $user = User::findOrFail($id);
        
        // Eksekusi hapus data
        $user->delete();

        // Lempar kembali ke halaman list user dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil dihapus!');
    }
}