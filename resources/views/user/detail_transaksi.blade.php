<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pemesanan Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('user.landing') }}">Apotek Online</a>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0">✨ NOTA PEMESANAN OBAT ✨</h4>
                        <small>ID Transaksi: #{{ $transaksi->id_transaksi }}</small>
                    </div>
                    <div class="card-body p-4">
                        
                        @if(session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif

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
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
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
                                <div class="d-flex justify-content-between border-bottom pb-2">
                                    <span class="text-muted">Total Belanja:</span>
                                    <span>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between pt-2 fw-bold text-success fs-5">
                                    <span>Total Bayar:</span>
                                    <span>Rp {{ number_format($transaksi->bayar, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="text-muted small mb-3">Terima kasih telah berbelanja di Apotek kami. Pesanan Anda sedang kami proses!</p>
                            <a href="{{ route('user.landing') }}" class="btn btn-success px-4">Kembali ke Katalog</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>