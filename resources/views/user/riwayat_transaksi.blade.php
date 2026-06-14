@extends('layouts.user')

@section('content')
<div class="container my-5">
    <h3>Riwayat Transaksi Saya</h3>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>#{{ $t->id_transaksi }}</td>
                <td>{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d M Y') }}</td>
                <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('user.transaksi.detail', $t->id_transaksi) }}" 
                       class="btn btn-sm btn-success">
                       Lihat Nota
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection