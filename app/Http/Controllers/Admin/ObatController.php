<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat; // <--- WAJIB ADA INI

class ObatController extends Controller
{
    public function index()
    {
        // Mengambil semua data obat dari database
        $obats = Obat::all(); 
        return view('admin.dashboard', compact('obats'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Proses simpan data sesuai entitas lengkap kamu
        Obat::create([
            'nama_obat'      => $request->nama_obat,
            'id_kategori'    => $request->id_kategori,
            'harga_obat'     => $request->harga_obat,
            'satuan'         => $request->satuan,
            'stok'           => $request->stok,
            'tanggal_exp'    => $request->tanggal_exp,
            'waktu_produksi' => $request->waktu_produksi,
        ]);

        // Setelah simpan, pindah ke halaman /admin dengan pesan sukses
        return redirect('/admin')->with('success', 'Data obat berhasil disimpan!');
    }
        public function edit($id)
    {
        // Cari data obat berdasarkan ID
        $obat = Obat::findOrFail($id);
        return view('admin.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        // Cari data dan update dengan data baru dari form
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect('/admin')->with('success', 'Data obat berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect('/admin')->with('success', 'Data obat berhasil dihapus!');
    }
} 