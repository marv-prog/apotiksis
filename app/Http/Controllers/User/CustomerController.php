<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori; 

class CustomerController extends Controller
{
    // 1. Menampilkan halaman katalog utama
    public function index()
    {
        $obat = Obat::all(); 
        return view('user.landing', compact('obat'));
    }

    // 2. Menampilkan halaman detail obat
    public function showObat($id = null)
    {
        if (!$id) {
            return redirect()->route('user.landing');
        }

        $o = Obat::findOrFail($id);
        return view('user.detail', compact('o'));
    }

    // 3. Menyaring obat berdasarkan kategori yang dipilih
    public function filterKategori($id)
    {
        $obat = Obat::where('id_kategori', $id)->get();
        $kategoriAktif = $id;

        $kategoriData = Kategori::find($id);
        $namaKategoriAktif = $kategoriData ? $kategoriData->nama_kategori : '';

        return view('user.landing', compact('obat', 'kategoriAktif', 'namaKategoriAktif'));
    }

    // 4. FUNGSI UNTUK MEMPROSES OBAT MASUK KE KERANJANG (SESSION)
    public function tambahKeranjang(Request $request, $id)
    {
        $obat = \App\Models\Obat::findOrFail($id); 
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "nama_obat" => $obat->nama_obat,
                "qty" => 1,
                "harga" => $obat->harga_obat,
                "foto" => $obat->foto,
                "satuan" => $obat->satuan
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('user.keranjang.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    // 5. FUNGSI UNTUK MENAMPILKAN HALAMAN VISUAL KERANJANG BELANJA (STEP 1)
    public function viewKeranjang()
    {
        $cart = session()->get('cart', []);
        return view('user.keranjang', compact('cart'));
    }

    // 6. MENAMPILKAN HALAMAN INPUT ALAMAT / METODE PENGIRIMAN (STEP 2)
    public function viewAlamat()
    {
        $cart = session()->get('cart', []);
        return view('user.alamat', compact('cart'));
    }

    // 7. MENYIMPAN DATA ALAMAT SEMENTARA KE SESSION
    public function simpanAlamatSession(Request $request)
    {
        session()->put('alamat_checkout', [
            'metode_pengambilan' => $request->metode_pengambilan,
            'nama_penerima'      => $request->nama_penerima,
            'no_hp'              => $request->no_hp,
            'alamat_lengkap'     => $request->metode_pengambilan == 'antar' ? $request->alamat_lengkap : 'Ambil di Toko',
        ]);

        return redirect()->route('user.keranjang.pembayaran');
    }

    // 8. MENAMPILKAN HALAMAN METODE PEMBAYARAN (STEP 3)
    public function viewPembayaran()
    {
        $cart = session()->get('cart', []);
        return view('user.pembayaran', compact('cart'));
    }

    // PROSES TRANSAKSI AKHIR (DISESUAIKAN DENGAN STRUKTUR ASLI DATABASE)
    public function checkoutTransaksi(Request $request)
    {
        $cart = session()->get('cart', []);
        $alamat = session()->get('alamat_checkout', []);

        if (empty($cart)) {
            return redirect()->route('user.landing')->with('error', 'Keranjang belanja kosong.');
        }

        $totalHarga = 0;
        foreach($cart as $item) {
            $totalHarga += ($item['harga'] * $item['qty']);
        }

        // SEKARANG MENGGUNAKAN ID USER ASLI YANG SEDANG LOGIN
        // Jika belum login, dilempar otomatis ke form login demi keamanan
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Masukkan data transaksi ke database menggunakan data user otentik
        $transaksi = new \App\Models\Transaksi(); 
        $transaksi->tanggal_transaksi = now(); 
        $transaksi->id_user           = auth()->id(); // ID diambil otomatis dari user yang login!
        $transaksi->total_harga       = $totalHarga; 
        $transaksi->bayar             = $totalHarga; 
        $transaksi->kembalian         = 0;
        $transaksi->save(); 

        $idBaru = $transaksi->id_transaksi ?? $transaksi->id;

        $metode = 'COD';
        if ($request->bank == 'bayar_di_toko') { $metode = 'Bayar di Toko'; }
        elseif ($request->bank == 'qris') { $metode = 'QRIS'; }
        session()->put('metode_terpilih', $metode);

        session()->forget(['cart', 'alamat_checkout']);

        return redirect()->route('user.keranjang.detail_transaksi', $idBaru);
    }
}