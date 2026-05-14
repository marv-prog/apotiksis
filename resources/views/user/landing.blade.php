@extends('layouts.user') {{-- Pastikan kamu sudah buat layouts/user.blade.php ya --}}

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="hero bg-primary text-white">
            <div class="hero-inner">
                <h2>Selamat Datang di Apotek Sis</h2>
                <p class="lead">Solusi kesehatan lengkap, aman, dan terpercaya.</p>
            </div>
        </div>
    </div>

    <!-- Bagian Judul Katalog -->
    <div class="col-12">
        <h2 class="section-title">Katalog Obat Terbaru</h2>
        <p class="section-lead">Pilih obat sesuai kebutuhan Anda.</p>
    </div>

    <!-- Looping Data Obat -->
    @foreach($obat as $o)
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card card-primary">
            <div class="card-header" style="justify-content: center; min-height: 150px;">
                @if($o->foto)
                    <img src="{{ asset('assets/img/obat/'.$o->foto) }}" alt="{{ $o->nama_obat }}" style="max-width: 100%; height: auto;">
                @else
                    <i class="fas fa-pills fa-5x text-muted"></i>
                @endif
            </div>
            <div class="card-body text-center">
                <h5 class="font-weight-bold">{{ $o->nama_obat }}</h5>
                <p class="text-primary mb-2">Rp {{ number_format($o->harga_obat, 0, ',', '.') }}</p>
                <p class="small text-muted">{{ Str::limit($o->satuan, 50) }}</p>
                <a href="#" class="btn btn-primary btn-block shadow-primary">Detail Obat</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection