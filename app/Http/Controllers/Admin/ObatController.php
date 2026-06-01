<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat; 
use App\Models\Kategori;
use App\Models\Transaksi; // <-- Kita panggil juga model Transaksi untuk statistik atas
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        // 1. Ambil data obat untuk tabel dashboard terbaru
        $obat = Obat::all(); 
        
        // 2. Ambil data statistik untuk widget kartu atas dashboard (Menyelesaikan error Undefined variable)
        $total_obat = Obat::count(); 
        $stok_menipis = Obat::where('stok', '<=', 10)->count(); // <-- FIX: Diubah dari $stok_limit menjadi $stok_menipis
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');

        // 3. Kirim ke view dashboard beserta seluruh statistik wajibnya
        return view('admin.dashboard', compact('obat', 'total_obat', 'stok_menipis', 'total_transaksi', 'total_pendapatan'));
    }

    public function create()
    {
        // Ambil semua data kategori dari phpMyAdmin
        $categories = Kategori::all(); 

        // ⚡ TAMBAHKAN INI: Sediakan variabel penangkal error jika halaman create memakai layout sidebar dashboard
        $total_obat = Obat::count();
        $stok_menipis = Obat::where('stok', '<=', 10)->count();
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');

        // FIX: Diubah dari 'admin.obat.create' menjadi 'admin.create' sesuai folder aslimu
        return view('admin.create', compact('categories', 'total_obat', 'stok_menipis', 'total_transaksi', 'total_pendapatan'));
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
            'deskripsi'      => $request->deskripsi,
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
        $obat = Obat::findOrFail($id);
        $categories = Kategori::all(); 
        
        // ⚡ TAMBAHKAN INI: Sediakan variabel agar tidak crash saat masuk ke halaman edit
        $total_obat = Obat::count();
        $stok_menipis = Obat::where('stok', '<=', 10)->count();
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');

        // FIX: Diubah dari 'admin.obat.edit' menjadi 'admin.edit' agar tidak tersesat
        return view('admin.edit', compact('obat', 'categories', 'total_obat', 'stok_menipis', 'total_transaksi', 'total_pendapatan'));
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

    public function show($id)
    {
        // Mengambil data obat berdasarkan ID menggunakan model yang sudah di-import di atas
        $obat = Obat::find($id);

        if ($obat) {
            // Mengembalikan respon berupa data JSON untuk kebutuhan AJAX detail
            return response()->json($obat);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}