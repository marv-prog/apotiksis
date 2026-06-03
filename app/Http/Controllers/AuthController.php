<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            
            // jika admin langsung ke dashboard admin, jika customer cek verifikasi email dulu
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang Admin!');
            }

            // jika customer belum verifikasi email, lempar ke halaman notice untuk verifikasi email
            if (!Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }

            // jika customer sudah verifikasi email, lempar ke halaman landing page utama
            return redirect()->route('user.landing')->with('success', 'Selamat Datang!');
        }

        return back()->withErrors(['email' => 'Email atau Password salah.'])->onlyInput('email');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1input form register dengan validasi yang sesuai
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'no_hp'     => 'required|string|max:15',
            'alamat'    => 'required|string',
            'password'  => 'required|string|min:5',
        ]);

        // simpan ke database dengan role otomatis sebagai customer biasa, dan password di-hash aman
        $user = User::create([
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat,
            'role'      => 'customer', // otomatis diset sebagai customer biasa
            'password'  => Hash::make($request->password), // password di-enkripsi aman
        ]);

        // picu event verifikasi email bawaan laravel
        event(new Registered($user));

        // otomatis loginkan user lalu lempar ke halaman verifikasi email notice
        auth()->login($user);

        return redirect()->route('verification.notice');
    }
    // untuk logout user baik admin maupun customer
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.landing')->with('success', 'Anda sudah logout.');
    }
}