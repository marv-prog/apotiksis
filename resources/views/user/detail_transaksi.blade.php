@extends('layouts.user')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white text-center py-3">
                    <h4 class="mb-0">NOTA PEMESANAN OBAT</h4>
                    <small>ID Transaksi: #{{ $transaksi->id_transaksi }}</small>
                </div>
                <div class="card-body p-4">
                    
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="text-muted mb-1">Tanggal Transaksi:</h6>
                            <p class="fw-bold">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d F Y H:i') }}</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h6 class="text-muted mb-1">Metode Pembayaran:</h6>
                            <span class="badge bg-primary fs-6">{{ session('metode_terpilih', 'COD') }}</span>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">Rincian Pesanan</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr class="text-center">
                                    <th>Nama Obat</th>
                                    <th>Harga</th>
                                    <th>Jml</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi->detailTransaksi as $detail)
                                <tr>
                                    <td>{{ $detail->obat->nama_obat ?? 'Obat Terhapus' }}</td>
                                    <td class="text-end">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $detail->jumlah }}</td>
                                    <td class="text-end fw-bold">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-md-5">
                            <div class="d-flex justify-content-between pt-2 fw-bold text-success fs-5">
                                <span>Total Bayar:</span>
                                <span>Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 p-3 border-top text-center">
                        <p class="text-muted">
                            Terima kasih! Nanti driver kami akan menghubungi Anda secepatnya jika barang akan dikirim.<br>
                            Terima kasih sudah order di <strong>APOTIK SIS</strong>.
                        </p>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <a href="{{ route('user.riwayat') }}" class="btn btn-secondary px-4">Kembali ke Riwayat</a>
                        <a href="{{ route('user.landing') }}" class="btn btn-success px-4">Kembali ke Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection