@extends('layouts.user')

@section('content')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow-sm border-0 p-4" style="border-radius: 16px; max-width: 550px; width: 100%; background-color: #ffffff;">
        
        <div class="text-center my-3">
            <i class="fas fa-check-circle text-success fa-3x mb-2"></i>
            <h4 class="font-weight-bold" style="color: #2d5766;">Transaksi Berhasil!</h4>
            <p class="text-muted small">Terima kasih, pesanan Anda telah tercatat di sistem Apotek Sis.</p>
        </div>

        <hr class="my-3" style="border-top: 2px dashed #cbdcdc;">

        <h6 class="font-weight-bold mb-3" style="color: #2d5766;"><i class="fas fa-receipt mr-2"></i>Nota Transaksi</h6>
        
        <div class="d-flex justify-content-between mb-2 small">
            <span class="text-muted">ID Transaksi</span>
            <span class="font-weight-bold text-dark">#{{ $transaksi->id_transaksi ?? $transaksi->id }}</span>
        </div>
        <div class="d-flex justify-content-between mb-2 small">
            <span class="text-muted">ID User / Pelanggan</span>
            <span class="font-weight-bold text-dark">{{ $transaksi->id_user }}</span>
        </div>
        <div class="d-flex justify-content-between mb-2 small">
            <span class="text-muted">Tanggal Transaksi</span>
            <span class="text-dark">{{ $transaksi->tanggal_transaksi }}</span>
        </div>
        <div class="d-flex justify-content-between mb-2 small">
            <span class="text-muted">Metode Pembayaran</span>
            <span class="badge badge-info px-2 py-1" style="border-radius: 4px;">{{ $metode }}</span>
        </div>

        <hr class="my-3">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="font-weight-bold" style="color: #2d5766; font-size: 15px;">Total Harga</span>
            <span class="font-weight-bold" style="color: #e6005c; font-size: 20px;">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
        </div>

        <a href="{{ route('user.landing') }}" class="btn btn-block py-2.5 text-white font-weight-bold shadow-sm text-center" style="background-color: #325a66; border-radius: 8px; text-decoration: none;">
            <i class="fas fa-shopping-bag mr-2"></i> Kembali Belanja
        </a>
    </div>
</div>
@endsection