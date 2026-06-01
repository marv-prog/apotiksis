@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Laporan Transaksi Penjualan</h1>
        <a href="{{ url('/admin/transaksi/export') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Export ke Excel
        </a>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat Penjualan APOTIKSIS</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th>No. Transaksi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No. Telepon</th>
                                        <th>Alamat</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transaksi as $t)
                                    <tr>
                                        <td><strong>#TRX-{{ $t->id_transaksi }}</strong></td>
                                        <td>{{ $t->user->nama_user ?? 'Umum / Guest' }}</td>
                                        <td>{{ $t->user->no_hp ?? '-' }}</td>
                                        <td>{{ $t->user->alamat ?? '-' }}</td>
                                        <td><span class="text-primary font-weight-bold">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y H:i') }} WIB</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data transaksi masuk.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection