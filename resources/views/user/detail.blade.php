@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/detail_obat.css') }}">

<nav aria-label="breadcrumb" class="mt-3">
    <ol class="breadcrumb breadcrumb-mandjur">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $o->nama_obat }}</li>
    </ol>
</nav>

<div class="row mt-3">
    <div class="col-md-6 text-center mb-4">
        <div class="d-flex align-items-center justify-content-center p-4 shadow-sm" style="background-color: #ffffff; border: 1px solid #eef2f2; border-radius: 12px; min-height: 380px;">
            @if($o->foto)
                <img src="{{ asset('assets/img/obat/'.$o->foto) }}" alt="{{ $o->nama_obat }}" class="img-fluid" style="max-height: 320px; object-fit: contain;">
            @else
                <div class="text-center text-muted">
                    <i class="fas fa-pills fa-6x mb-3" style="color: #cbdcdc;"></i>
                    <div>Gambar tidak tersedia</div>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="pl-md-3">
            <h1 class="product-detail-title mb-1">{{ $o->nama_obat }}</h1>
            
            <div class="d-flex align-items-center flex-wrap mb-3" style="gap: 10px;">
                <p class="product-brand mb-0">Satuan: <strong>{{ $o->satuan }}</strong></p>
                <span class="badge px-2.5 py-1.5 text-white" style="background-color: #006673; border-radius: 4px; font-size: 11px; font-weight: 600; letter-spacing: 0.3px;">
                    <i class="fas fa-tags mr-1" style="font-size: 10px;"></i> {{ $o->kategori->nama_kategori ?? 'Kategori Umum' }}
                </span>
            </div>
            
            <div class="price-box mb-3">
                Rp {{ number_format($o->harga_obat, 0, ',', '.') }}
            </div>

            <div class="mb-4">
                @if($o->stok > 0)
                    <span class="status-stok"><i class="fas fa-check-circle mr-1"></i> Stok Tersedia ({{ $o->stok }} {{ $o->satuan }})</span>
                @else
                    <span class="status-stok habis"><i class="fas fa-times-circle mr-1"></i> Stok Habis</span>
                @endif
            </div>

            <div class="mb-4 p-3" style="background-color: #f8fafb; border-radius: 8px; border: 1px solid #eef2f2; font-size: 14px;">
                <div class="row">
                    <div class="col-6">
                        <span class="text-muted d-block small">Tanggal Produksi:</span>
                        <strong style="color: #2d5766;">
                            {{ $o->waktu_produksi ? date('d M Y', strtotime($o->waktu_produksi)) : '-' }}
                        </strong>
                    </div>
                    <div class="col-6" style="border-left: 1px solid #cbdcdc;">
                        <span class="text-muted d-block small">Tanggal Kadaluwarsa:</span>
                        <strong class="text-danger">
                            {{ $o->tanggal_exp ? date('d M Y', strtotime($o->tanggal_exp)) : '-' }}
                        </strong>
                    </div>
                </div>
            </div>

                <form action="{{ route('user.keranjang.tambah', $o->getKey()) }}" method="POST" class="action-box mt-4">                
                    @csrf <h5 class="font-weight-bold mb-3" style="color: #2d5766; font-size: 15px;">Jumlah Pembelian</h5>
                <div class="row align-items-center mb-3">
                    <div class="col-5 col-md-4">
                        <div class="input-group shadow-sm">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary px-3" type="button" id="btn-minus" style="border-color: #cbdcdc;">-</button>
                            </div>
                            <input type="text" name="qty" class="form-control text-center font-weight-bold" value="1" id="input-qty" style="border-color: #cbdcdc; color: #2d5766;" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary px-3" type="button" id="btn-plus" data-max="{{ $o->stok }}" style="border-color: #cbdcdc;">+</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 p-2 d-flex justify-content-between align-items-center" style="background-color: #f8fafb; border-radius: 6px; border: 1px solid #eef2f2;">
                    <span class="text-muted small">Total yang harus dibayar:</span>
                    <span class="font-weight-bold" id="total-harga-display" data-harga-asli="{{ $o->harga_obat }}" style="color: #2d5766; font-size: 18px;">
                        Rp {{ number_format($o->harga_obat, 0, ',', '.') }}
                    </span>
                </div>

                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="submit" class="btn btn-block btn-mandjur-primary py-2 shadow-sm" {{ $o->stok <= 0 ? 'disabled' : '' }}>
                            <i class="fas fa-shopping-cart mr-2"></i> Tambah ke Keranjang
                        </button>
                    </div>
                    <div class="col-12">
                        <a href="https://wa.me/628XXXXXXXXXX?text=Halo%20Apotek%20Sis,%20saya%20ingin%20berkonsultasi%20mengenai%20produk%20{{ urlencode($o->nama_obat) }}" target="_blank" class="btn btn-block btn-mandjur-secondary py-2 shadow-sm text-center">
                            <i class="fas fa-comment-medical mr-2"></i> Chat Apoteker / Dokter
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h3 class="section-info-title">Ringkasan Produk</h3>
        <div class="info-content text-justify mb-5">
            {!! nl2br(e($o->deskripsi ?? 'Tidak ada deskripsi atau informasi detail tambahan untuk produk ini.')) !!}
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/detail_obat.js') }}"></script>
@endsection