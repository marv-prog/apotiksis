@extends('layouts.user')

@section('content')
<div class="container mt-5 mb-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 p-4" style="border-radius: 16px;">
                <h4 class="font-weight-bold mb-2" style="color: #2d5766;">Pembayaran QRIS</h4>
                <p class="text-muted small mb-4">Silakan scan kode QRIS di bawah ini menggunakan aplikasi e-wallet pilihan Anda.</p>
                
                <!-- Gambar Barcode QRIS Statis/Dummy -->
                <div class="d-inline-block p-3 border rounded mb-3 bg-white shadow-sm">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=ApotekSis-Transaksi-{{ $transaksi->id }}" alt="QRIS Code" class="img-fluid" style="max-width: 220px;">
                </div>
                
                <h5 class="font-weight-bold mb-1" style="color: #006673;">Total Tagihan</h5>
                <h3 class="font-weight-bold text-danger mb-4">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</h3>
                
                <div class="alert alert-warning text-left small border-0" style="border-radius: 8px; background-color: #fff9e6; color: #856404;">
                    <i class="fas fa-info-circle mr-2"></i> <strong>Instruksi:</strong> Setelah melakukan transfer di aplikasi e-wallet Anda, klik tombol konfirmasi di bawah ini untuk menerbitkan nota transaksi resmi.
                </div>

                <!-- Tombol Lanjut ke Halaman Detail Transaksi setelah Berhasil Scan -->
                <a href="{{ route('user.keranjang.detail_transaksi', $transaksi->id_transaksi) }}" class="btn btn-block py-2.5 text-white font-weight-bold shadow-sm" style="background-color: #325a66; border-radius: 8px;">
                    <i class="fas fa-check-circle mr-2"></i> Saya Sudah Bayar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection