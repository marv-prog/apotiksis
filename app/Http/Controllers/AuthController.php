<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses data inputan login
    public function login(Request $request)
    {
        // Validasi input email dan password wajib diisi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kredensial untuk dicocokkan ke database
        $credentials = $request->only('email', 'password');

        // Jika email & password cocok dengan data di tabel users
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Lempar ke halaman katalog utama (user.landing) setelah sukses login
            return redirect()->route('user.landing')->with('success', 'Selamat Datang, ' . Auth::user()->name);
        }

        // Jika salah, balikkan ke login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Fungsi Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('user.landing')->with('success', 'Berhasil logout.');
    }
}