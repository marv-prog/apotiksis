@extends('layouts.user')

@section('content')
<style>
    .banner-welcome {
        background: linear-gradient(135deg, #a4d4d4 0%, #cbdcdc 100%) !important;
        border-radius: 12px;
        padding: 40px;
        border: none !important;
    }
    
    .mandjur-style-card {
        transition: transform 0.2s ease-in-out;
    }
    .mandjur-style-card:hover {
        transform: translateY(-4px);
    }

    /* CSS MENU KATEGORI GESER DRAG MOUSE */
    .category-section-title {
        color: #2d5766;
        font-weight: 700;
        font-size: 22px;
    }
    .scroll-category-container {
        display: flex !important;
        flex-wrap: nowrap !important; 
        overflow-x: auto !important;   
        width: 100% !important;
        padding-bottom: 15px;
        padding-top: 5px;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
        cursor: grab; 
    }
    .scroll-category-container:active {
        cursor: grabbing; 
    }
    .scroll-category-container::-webkit-scrollbar {
        height: 5px;
    }
    .scroll-category-container::-webkit-scrollbar-thumb {
        background: #cbdcdc;
        border-radius: 10px;
    }
    .category-slider-item {
        flex: 0 0 130px !important; 
        width: 130px !important;
        text-align: center;
        text-decoration: none !important;
        margin-right: 15px;         
        transition: transform 0.2s;
        user-select: none; 
    }
    .category-slider-item:hover {
        transform: translateY(-4px);
    }
    .category-circle {
        width: 70px;
        height: 70px;
        background-color: #006673;  
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px auto;
        box-shadow: 0 4px 10px rgba(0, 102, 115, 0.15);
    }
    
    /* Highlight kategori yang sedang aktif */
    .category-slider-item.active .category-circle {
        background-color: #2d5766;
        box-shadow: 0 4px 12px rgba(45, 87, 102, 0.4);
        border: 2px solid #ffffff;
    }

    .category-slider-item:hover .category-circle {
        background-color: #004d57;
    }
    .category-circle i {
        color: #ffffff;
        font-size: 24px;
    }
    .category-name {
        color: #006673;
        font-weight: 600;
        font-size: 13px;
        white-space: normal !important; 
        display: block;
        line-height: 1.2;
    }
    .category-slider-item.active .category-name {
        font-weight: 700;
        color: #2d5766;
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

<div class="row mb-3 mt-4">
    <div class="col-12 mb-2">
        <h3 class="category-section-title">Kategori Obat</h3>
    </div>
    <div class="col-12">
        <div class="scroll-category-container">
            <a href="/" class="category-slider-item {{ !isset($kategoriAktif) ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #3b6375;"><i class="fas fa-th-large"></i></div>
                <span class="category-name">Semua Obat</span>
            </a>

            <a href="{{ route('user.kategori.filter', 4) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 4 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-pills"></i></div>
                <span class="category-name">OTC</span>
            </a>
            <a href="{{ route('user.kategori.filter', 5) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 5 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-capsules"></i></div>
                <span class="category-name">Pil KB & Hormonal</span>
            </a>
            <a href="{{ route('user.kategori.filter', 6) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 6 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-prescription-bottle"></i></div>
                <span class="category-name">Vitamin & Suplement</span>
            </a>
            <a href="{{ route('user.kategori.filter', 7) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 7 ? 'active' : '' }}">
                <div class="category-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" class="bi bi-thermometer-high" viewBox="0 0 16 16" style="margin-top: -2px;">
                        <path d="M5 14a1 1 0 0 1-1-1V5a1 1 0 1 1 2 0v8a1 1 0 0 1-1 1M.5 1V.5A.5.5 0 0 1 1 0h1.5a.5.5 0 0 1 .5.5v.382l.309.155A1 1 0 0 1 4 2.427V4.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v.573a1 1 0 0 1-.191.596L3.5 13.382V15.5a.5.5 0 0 1-.5.5H1a.5.5 0 0 1-.5-.5v-2.118L.191 12.5A1 1 0 0 1 0 11.904V4.5h.5a.5.5 0 0 1 0-1H0V2.427a1 1 0 0 1 .191-.596L.5 1.382zM1 4.5h2v-2H1zm0 3h2v-2H1zm0 3h2v-2H1z"/>
                        <path fill-rule="evenodd" d="M13.5 1a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V1zm-11-1A1.5 1.5 0 0 0 1 1v11A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V1A1.5 1.5 0 0 0 13.5 0h-11z"/>
                        <path d="M3.5 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <span class="category-name">Flu & Batuk</span>
            </a>
            <a href="{{ route('user.kategori.filter', 8) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 8 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-leaf"></i></div>
                <span class="category-name">Obat Herbal</span>
            </a>
            <a href="{{ route('user.kategori.filter', 9) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 9 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-tint"></i></div>
                <span class="category-name">Obat Diabetes</span>
            </a>
            <a href="{{ route('user.kategori.filter', 10) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 10 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-heartbeat"></i></div>
                <span class="category-name">Obat Hipertensi</span>
            </a>
            <a href="{{ route('user.kategori.filter', 11) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 11 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-shield-alt"></i></div>
                <span class="category-name">Obat Kolesterol</span>
            </a>
            <a href="{{ route('user.kategori.filter', 12) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 12 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-heart"></i></div>
                <span class="category-name">Kesehatan Seksual</span>
            </a>
            <a href="{{ route('user.kategori.filter', 13) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 13 ? 'active' : '' }}">
                <div class="category-circle"><i class="fas fa-spa"></i></div>
                <span class="category-name">Kecantikan & Keperawatan Diri</span>
            </a>
        </div>
    </div>
</div>

<hr class="my-4" style="border-top: 1px solid #eef2f2;">

<div class="row mb-2">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between mb-1">
            <div class="d-flex align-items-center">
                <div style="width: 5px; height: 26px; background-color: #3b6375; border-radius: 3px;" class="mr-2"></div>
                <h3 class="mb-0 font-weight-bold" style="font-size: 22px; color: #2d5766;">
                    Katalog Obat {{ isset($namaKategoriAktif) ? '- ' . $namaKategoriAktif : 'Terbaru' }}
                </h3>
            </div>
            
            @if(isset($kategoriAktif))
                <a href="/" class="btn btn-sm text-white px-3" style="background-color: #3b6375; border-radius: 20px; font-size: 12px;">
                    <i class="fas fa-sync-alt mr-1"></i> Tampilkan Semua Obat
                </a>
            @endif
        </div>
        <p class="text-muted">Pilih obat sesuai kebutuhan Anda.</p>
    </div>
</div>

<div class="row">
    @if($obat->isEmpty())
        <div class="col-12 text-center py-5">
            <i class="fas fa-box-open fa-4x text-muted mb-3" style="opacity: 0.5;"></i>
            <h5 class="text-secondary font-weight-bold">Obat Belum Tersedia</h5>
            <p class="text-muted small">Maaf, saat ini produk obat untuk kategori ini belum dimasukkan.</p>
        </div>
    @else
        @foreach($obat as $o)
            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm mandjur-style-card" style="border-radius: 8px; overflow: hidden;">
                    
                    <a href="/obat/{{ $o->id_obat ?? $o->id }}">
                        <div class="text-center p-3" style="background-color: #f8fafb; height: 180px; display: flex; align-items: center; justify-content: center;">
                            @if($o->foto)
                                <img src="{{ asset('assets/img/obat/'.$o->foto) }}" class="img-fluid" style="max-height: 140px; object-fit: contain;" alt="{{ $o->nama_obat }}">
                            @else
                                <i class="fas fa-pills fa-4x text-muted"></i>
                            @endif
                        </div>
                    </a>

                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <div>
                            <a href="/obat/{{ $o->id_obat ?? $o->id }}" class="font-weight-bold d-block mb-1 text-dark text-decoration-none" style="font-size: 14px; line-height: 1.3;">
                                {{ $o->nama_obat }}
                            </a>
                            <p class="text-muted small mb-2">{{ $o->satuan }}</p>
                        </div>

                        <div>
                            <div class="font-weight-bold mb-3" style="color: #2d5766; font-size: 16px;">
                                Rp {{ number_format($o->harga_obat, 0, ',', '.') }}
                            </div>

                            <a href="/obat/{{ $o->id_obat ?? $o->id }}" class="btn btn-block py-2 font-weight-bold shadow-sm" style="background-color: #ffffff; border: 1px solid #3b6375; color: #3b6375; font-size: 12px; border-radius: 4px; transition: all 0.2s;">
                                <i class="fas fa-info-circle mr-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    @endif
</div>

<script src="{{ asset('assets/js/landing_page.js') }}"></script>
@endsection