@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<section class="section">
    <!-- Header Halaman -->
    <div class="section-header">
        <h1>Dashboard Apotek</h1>
    </div>

    <div class="section-body">
        <!-- BARIS WIDGET STATISTIK -->
        <div class="row">
            <!-- Widget Total Obat -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Jenis Obat</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_obat }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget Stok Hampir Habis -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Stok < 10</h4>
                        </div>
                        <div class="card-body">
                            {{ $stok_limit }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Widget Tanggal Hari Ini -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Hari Ini</h4>
                        </div>
                        <div class="card-body" style="font-size: 14px;">
                            {{ date('d M Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BARIS TABEL DATA OBAT -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Stok Obat Terbaru</h4>
                        <div class="card-header-action">
                            <a href="/admin/obat/create" class="btn btn-primary">Tambah Obat</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kategori</th>
                                        <th>Nama Obat</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <th>Produksi</th>
                                        <th>Expired</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obat as $o)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($o->foto)
                                                <img src="{{ asset('assets/img/obat/'.$o->foto) }}" width="50" class="rounded">
                                            @else
                                                <small class="text-muted">No Image</small>
                                            @endif
                                        </td>
                                        <td>{{ $o->id_kategori }}</td>
                                        <td><strong>{{ $o->nama_obat }}</strong></td>
                                        <td>{{ Str::limit($o->deskripsi, 30) }}</td>
                                        <td>Rp {{ number_format($o->harga_obat, 0, ',', '.') }}</td>
                                        <td>
                                            @if($o->stok <= 10)
                                                <span class="badge badge-danger">{{ $o->stok }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $o->stok }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $o->satuan }}</td>
                                        <td>{{ $o->waktu_produksi ? date('d/m/Y', strtotime($o->waktu_produksi)) : '-' }}</td>
                                        <td>{{ $o->tanggal_exp ? date('d/m/Y', strtotime($o->tanggal_exp)) : '-' }}</td>
                                        <td>
                                            <div class="d-flex" style="gap: 5px;">
                                                <a href="/admin/obat/{{ $o->id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                
                                                <form action="/admin/obat/{{ $o->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection