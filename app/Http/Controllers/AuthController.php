<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            
            // 1. JIKA ADMIN -> LANGSUNG KE DASHBOARD ADMIN
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang Admin!');
            }

            // 2. JIKA CUSTOMER BELUM VERIFIKASI EMAIL
            if (!Auth::user()->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }

            // 3. JIKA CUSTOMER SUDAH VERIFIKASI
            return redirect()->route('user.landing')->with('success', 'Selamat Datang!');
        }

        return back()->withErrors(['email' => 'Email atau Password salah.'])->onlyInput('email');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi inputan form dari user
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users',
            'email'     => 'required|string|email|max:255|unique:users',
            'no_hp'     => 'required|string|max:15',
            'alamat'    => 'required|string',
            'password'  => 'required|string|min:5',
        ]);

        // 2. Simpan ke database dengan role otomatis sebagai 'customer'
        $user = User::create([
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'alamat'    => $request->alamat,
            'role'      => 'customer', // Otomatis diset sebagai customer biasa
            'password'  => Hash::make($request->password), // Password di-enkripsi aman
        ]);

        // 3. Picu event verifikasi email bawaan Laravel
        event(new Registered($user));

        // 4. Otomatis login-kan user lalu lempar ke halaman verifikasi email notice
        auth()->login($user);

        return redirect()->route('verification.notice');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}