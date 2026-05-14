@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Manajemen Data Obat</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Stok Obat</h4>
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
                                    <th>Nama Obat</th>
                                    <th>Kategori (ID)</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Expired</th>
                                    <th>Produksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($obat->foto)
                                            <!-- Pastikan foldernya: public/assets/img/obat/ -->
                                            <img src="{{ asset('assets/img/obat/'.$obat->foto) }}" width="50">
                                        @else
                                            <span class="badge badge-secondary">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>
                                        <div class="badge badge-primary">ID: {{ $obat->id_kategori }}</div>
                                    </td>   
                                    <td>Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}</td>
                                    <td>{{ $obat->stok }}</td>
                                    <td>{{ $obat->satuan }}</td>
                                    <td>{{ date('d M Y', strtotime($obat->tanggal_exp)) }}</td>
                                    <td>{{ date('d M Y', strtotime($obat->waktu_produksi)) }}</td>
                                    
                                    <td>
                                        <a href="/admin/obat/{{ $obat->id_obat }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/admin/obat/{{ $obat->id_obat }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data obat masih kosong. Klik Tambah Obat untuk mengisi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection