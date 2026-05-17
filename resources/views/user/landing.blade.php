@extends('layouts.user')

@section('content')
<style>
    .banner-welcome {
        background: linear-gradient(135deg, #a4d4d4 0%, #cbdcdc 100%) !important;
        border-radius: 12px;
        padding: 40px;
        border: none !important;
    }
    .card-product {
        border-radius: 12px !important;
        border: 1px solid #eef2f2 !important;
        transition: transform 0.2s, box-shadow 0.2s;
        overflow: hidden;
    }
    .card-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(45, 87, 102, 0.15) !important;
    }
    .btn-detail-product {
        background-color: #3b6375 !important;
        border-color: #3b6375 !important;
        color: white !important;
        border-radius: 6px;
    }
    .btn-detail-product:hover {
        background-color: #2d5766 !important;
        border-color: #2d5766 !important;
        color: white !important;
    }
</style>

<div class="row mt-2">
    <div class="col-12 mb-4">
        <div class="hero banner-welcome text-dark shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="font-weight-bold text-mandjur mb-2" style="font-size: 28px; color: #2d5766;">Selamat Datang di Apotek Sis</h1>
                    <p class="lead text-secondary mb-0" style="font-size: 16px;">Solusi kesehatan lengkap, aman, asli, dan terpercaya untuk memenuhi kebutuhan medis Anda dan keluarga.</p>
                </div>
                <div class="col-md-4 d-none d-md-block text-right" style="font-size: 70px; opacity: 0.15; color: #2d5766;">
                    <i class="fas fa-clinic-medical"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-12">
        <div class="d-flex align-items-center mb-1">
            <div style="width: 5px; height: 26px; background-color: #3b6375; border-radius: 3px;" class="mr-2"></div>
            <h3 class="mb-0 font-weight-bold" style="font-size: 22px; color: #2d5766;">Katalog Obat Terbaru</h3>
        </div>
        <p class="text-muted">Pilih obat sesuai kebutuhan Anda.</p>
    </div>
</div>

<div class="row">
    @foreach($obat as $o)
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 card-product shadow-sm bg-white">
            <div class="card-header bg-light d-flex align-items-center justify-content-center p-3" style="min-height: 160px; border-bottom: 1px solid #f1f5f5;">
                @if($o->foto)
                    <img src="{{ asset('assets/img/obat/'.$o->foto) }}" alt="{{ $o->nama_obat }}" style="max-height: 130px; width: auto; object-fit: contain;">
                @else
                    <div class="text-center text-muted py-3">
                        <i class="fas fa-pills fa-4x mb-2" style="color: #cbdcdc;"></i>
                        <div class="small">No Image</div>
                    </div>
                @endif
            </div>
            
            <div class="card-body text-center d-flex flex-column justify-content-between p-3">
                <div>
                    <h6 class="font-weight-bold text-dark text-truncate mb-2" title="{{ $o->nama_obat }}">{{ $o->nama_obat }}</h6>
                    <h5 class="font-weight-bold text-success mb-2" style="font-size: 16px;">Rp {{ number_format($o->harga_obat, 0, ',', '.') }}</h5>
                    <p class="small text-muted mb-3"><i class="fas fa-box-open mr-1"></i> {{ Str::limit($o->satuan, 50) }}</p>
                </div>
                
                <a href="#" class="btn btn-detail-product btn-block font-weight-bold shadow-sm">
                    <i class="fas fa-info-circle mr-1"></i> Detail Obat
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection