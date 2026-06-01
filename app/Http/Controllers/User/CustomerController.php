<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Kategori; 
use App\Models\Transaksi;

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

        $jumlahBeli = $request->input('qty', 1);

        // ⚡ VALIDASI TAMBAHAN: Cek apakah stok obat di apotek mencukupi atau tidak
        if ($obat->stok < $jumlahBeli) {
            return redirect()->back()->with('error', 'Maaf, stok obat ' . $obat->nama_obat . ' tidak mencukupi! Sisa stok saat ini: ' . $obat->stok);
        }

        if(isset($cart[$id])) {
            // Jika obat sudah ada di keranjang, cek total penggabungan qty-nya dengan stok
            if ($obat->stok < ($cart[$id]['qty'] + $jumlahBeli)) {
                return redirect()->back()->with('error', 'Gagal menambahkan! Total keranjang Anda melebihi sisa stok obat.');
            }
            $cart[$id]['qty'] += $jumlahBeli;
        } else {
            $cart[$id] = [
                "nama_obat" => $obat->nama_obat,
                "qty" => $jumlahBeli, 
                "harga" => $obat->harga_obat,
                "foto" => $obat->foto,
                "satuan" => $obat->satuan
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Obat berhasil dimasukkan ke keranjang belanjaan Anda!');
    }

    // 5. FUNGSI UNTUK MENAMPILKAN HALAMAN VISUAL KERANJANG BELANJA (STEP 1)
    public function viewKeranjang()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melihat keranjang belanja Anda.');
        }

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

    // 9. PROSES TRANSAKSI AKHIR (FIXED & SINKRON DENGAN COLUMN PHPMYADMIN)
    public function checkoutTransaksi(Request $request)
    {
        $cart = session()->get('cart', []);
        $alamat = session()->get('alamat_checkout', []);

        if (empty($cart)) {
            return redirect()->route('user.landing')->with('error', 'Keranjang belanja kosong.');
        }

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $totalHarga = 0;
        foreach($cart as $item) {
            $totalHarga += ($item['harga'] * $item['qty']);
        }

        $metodePilihan = $request->input('bank', 'COD');

        // A. SIMPAN DATA KE TABEL TRANSAKSI
        $transaksi = new \App\Models\Transaksi(); 
        $transaksi->id_user           = auth()->user()->id_user; 
        $transaksi->total_harga       = $totalHarga; 
        $transaksi->bayar             = $totalHarga; 
        
        // ⚡ PERBAIKAN DI SINI: Diubah dari 'tanggal' menjadi 'tanggal_transaksi' sesuai database ⚡
        $transaksi->tanggal_transaksi = now(); 
        
        $transaksi->save(); 

        $idBaru = $transaksi->id_transaksi;

        // B. SIMPAN DATA KE TABEL DETAIL TRANSAKSI & POTONG STOK OBAT
        foreach($cart as $idObat => $item) {
            $detail = new \App\Models\DetailTransaksi(); 
            $detail->id_transaksi = $idBaru;
            $detail->id_obat      = $idObat;
            $detail->jumlah       = $item['qty']; 
            $detail->harga        = $item['harga'];
            $detail->total        = $item['harga'] * $item['qty'];
            $detail->save();

            // LOGIKA POTONG STOK OBAT OTOMATIS
            $obat = \App\Models\Obat::find($idObat);
            if ($obat) {
                $obat->stok = $obat->stok - $item['qty'];
                $obat->save();
            }
        }

        session()->put('metode_terpilih', $metodePilihan);

        // C. REDIRECT ALUR SESUAI METODE PEMBAYARAN
        if ($metodePilihan === 'QRIS') {
            return redirect()->route('user.keranjang.payment_qris', $idBaru)->with('success', 'Transaksi berhasil dibuat! Silakan scan QRIS Anda.');
        } else {
            session()->forget(['cart', 'alamat_checkout']);
            return redirect()->route('user.keranjang.detail_transaksi', $idBaru)->with('success', 'Pesanan COD berhasil dibuat!');
        }
    }

    // 10. HALAMAN INSTRUKSI SCAN QRIS
    public function paymentQris($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $transaksi = \App\Models\Transaksi::findOrFail($id);
        
        session()->forget(['cart', 'alamat_checkout']);

        return view('user.qris', compact('transaksi'));
    }

    // 11. FUNGSI UNTUK MENGUPDATE JUMLAH (QTY) DI KERANJANG
    public function updateKeranjang(Request $request)
    {
        if($request->id && $request->qty) {
            $cart = session()->get('cart');
            
            $qtyBaru = max(1, intval($request->qty));
            
            if(isset($cart[$request->id])) {
                $cart[$request->id]['qty'] = $qtyBaru;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Jumlah obat berhasil diperbarui!');
            }
        }
        return redirect()->back()->with('error', 'Gagal memperbarui jumlah.');
    }

    // 12. FUNGSI UNTUK MENGHAPUS SATU ITEM OBAT DARI KERANJANG
    public function hapusKeranjang($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Obat berhasil dihapus dari keranjang!');
        }

        return redirect()->back()->with('error', 'Obat tidak ditemukan di keranjang.');
    }

    // 13. HALAMAN NOTA / DETAIL TRANSAKSI SETELAH CHECKOUT
    public function detailTransaksi($id)
    {
        $transaksi = \App\Models\Transaksi::with('detailTransaksi.obat')->findOrFail($id);
        return view('user.detail_transaksi', compact('transaksi'));
    }
}