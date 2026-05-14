<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat; // <--- WAJIB ADA INI

class ObatController extends Controller
{
    public function index()
    {
        // Ambil data untuk tabel
        $obat = Obat::all(); 
        
        // Ambil data untuk widget kartu
        $total_obat = Obat::count(); 
        $stok_limit = Obat::where('stok', '<=', 10)->count();

        // Kirim ke view (sesuaikan folder view kamu, misal 'admin.dashboard')
        return view('admin.dashboard', compact('obat', 'total_obat', 'stok_limit'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // 1. Definisikan dulu data yang mau disimpan ke dalam variabel $data
        $data = [
            'nama_obat'      => $request->nama_obat,
            'id_kategori'    => $request->id_kategori,
            'harga_obat'     => $request->harga_obat,
            'satuan'         => $request->satuan,
            'stok'           => $request->stok,
            'tanggal_exp'    => $request->tanggal_exp,
            'waktu_produksi' => $request->waktu_produksi,
        ];

        // 2. CEK: Jika ada foto yang diunggah, tambahkan ke dalam variabel $data
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('assets/img/obat'), $nama_foto);
            
            // Masukkan nama file foto ke array data
            $data['foto'] = $nama_foto;
        }

        // 3. Simpan variabel $data tadi ke database
        Obat::create($data);

        return redirect('/admin/dashboard')->with('success', 'Data obat berhasil disimpan!');
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

        return redirect('/admin/dashboard')->with('success', 'Data obat berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect('/admin/dashboard')->with('success', 'Data obat berhasil dihapus!');
    }
} 