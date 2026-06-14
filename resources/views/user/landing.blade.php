@extends('layouts.user')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTIK SIS</title>
    
    <link class="mystyle" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link class="mystyle" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    
    <link class="mystyle" rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link class="mystyle" rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link class="mystyle" rel="stylesheet" href="{{ asset('assets/css/artikel.css') }}">
</head>

<div class="row mt-2">
    <div class="col-12 mb-4">
        <div class="hero banner-welcome text-dark shadow-sm" style="background-color: #b5e27a !important; border-radius: 16px; padding: 30px;">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="font-weight-bold mb-2" style="font-size: 28px; color: #164e47;">Selamat Datang di APOTIK SIS</h1>
                    <p class="lead mb-0" style="font-size: 16px; color: #1e5a52; opacity: 0.85;">Solusi kesehatan lengkap, aman, asli, dan terpercaya untuk memenuhi kebutuhan medis Anda dan keluarga.</p>
                </div>
                <div class="col-md-4 d-none d-md-block text-right">
                    <img src="{{ asset('assets/img/apotiksis_logo.png') }}" alt="Logo Apotik" style="max-height: 150px; width: auto; filter: grayscale(100%) brightness(0.3); opacity: 0.12; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3 mt-4">
    <div class="col-12 mb-2">
        <h3 class="category-section-title" style="color: #164e47; font-weight: 700;">Kategori Obat</h3>
    </div>
    <div class="col-12">
        <div class="scroll-category-container">
            <a href="/" class="category-slider-item {{ !isset($kategoriAktif) ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-th-large"></i></div>
                <span class="category-name">Semua Obat</span>
            </a>
            <a href="{{ route('user.kategori.filter', 4) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 4 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-pills"></i></div>
                <span class="category-name">OTC</span>
            </a>
            <a href="{{ route('user.kategori.filter', 5) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 5 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-capsules"></i></div>
                <span class="category-name">Pil KB & Hormonal</span>
            </a>
            <a href="{{ route('user.kategori.filter', 6) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 6 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-prescription-bottle"></i></div>
                <span class="category-name">Vitamin & Suplement</span>
            </a>
            <a href="{{ route('user.kategori.filter', 7) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 7 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" class="bi bi-thermometer-high" viewBox="0 0 16 16" style="margin-top: -2px;">
                        <path d="M5 14a1 1 0 0 1-1-1V5a1 1 0 1 1 2 0v8a1 1 0 0 1-1 1M.5 1V.5A.5.5 0 0 1 1 0h1.5a.5.5 0 0 1 .5.5v.382l.309.155A1 1 0 0 1 4 2.427V4.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v1.5h.5a.5.5 0 0 1 0 1H4v.573a1 1 0 0 1-.191.596L3.5 13.382V15.5a.5.5 0 0 1-.5.5H1a.5.5 0 0 1-.5-.5v-2.118L.191 12.5A1 1 0 0 1 0 11.904V4.5h.5a.5.5 0 0 1 0-1H0V2.427a1 1 0 0 1 .191-.596L.5 1.382zM1 4.5h2v-2H1zm0 3h2v-2H1zm0 3h2v-2H1z"/>
                        <path fill-rule="evenodd" d="M13.5 1a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V1zm-11-1A1.5 1.5 0 0 0 1 1v11A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V1A1.5 1.5 0 0 0 13.5 0h-11z"/>
                        <path d="M3.5 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <span class="category-name">Flu & Batuk</span>
            </a>
            <a href="{{ route('user.kategori.filter', 8) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 8 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-leaf"></i></div>
                <span class="category-name">Obat Herbal</span>
            </a>
            <a href="{{ route('user.kategori.filter', 9) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 9 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-tint"></i></div>
                <span class="category-name">Obat Diabetes</span>
            </a>
            <a href="{{ route('user.kategori.filter', 10) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 10 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-heartbeat"></i></div>
                <span class="category-name">Obat Hipertensi</span>
            </a>
            <a href="{{ route('user.kategori.filter', 11) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 11 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-shield-alt"></i></div>
                <span class="category-name">Obat Kolesterol</span>
            </a>
            <a href="{{ route('user.kategori.filter', 12) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 12 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-heart"></i></div>
                <span class="category-name">Kesehatan Seksual</span>
            </a>
            <a href="{{ route('user.kategori.filter', 13) }}" class="category-slider-item {{ isset($kategoriAktif) && $kategoriAktif == 13 ? 'active' : '' }}">
                <div class="category-circle" style="background-color: #1ea385;"><i class="fas fa-spa"></i></div>
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
                <div style="width: 5px; height: 26px; background-color: #1ea385; border-radius: 3px;" class="mr-2"></div>
                <h3 class="mb-0 font-weight-bold" style="font-size: 22px; color: #164e47;">
                    Katalog Obat {{ isset($namaKategoriAktif) ? '- ' . $namaKategoriAktif : 'Terbaru' }}
                </h3>
            </div>
            @if(isset($kategoriAktif))
                <a href="/" class="btn btn-sm text-white px-3" style="background-color: #1ea385; border-radius: 20px; font-size: 12px;">
                    <i class="fas fa-sync-alt mr-1"></i> Tampilkan Semua Obat
                </a>
            @endif
        </div>
        <p class="text-muted">Pilih obat sesuai kebutuhan Anda.</p>
    </div>
</div>

<div class="row" id="katalog-obat-container">
    @if($obat->isEmpty())
        <div class="col-12 text-center py-5 no-data-message">
            <i class="fas fa-box-open fa-4x text-muted mb-3" style="opacity: 0.5;"></i>
            <h5 class="text-secondary font-weight-bold">Obat Belum Tersedia</h5>
            <p class="text-muted small">Maaf, saat ini produk obat untuk kategori ini belum dimasukkan.</p>
        </div>
    @else
        <div class="col-12 text-center py-5 d-none" id="search-empty-message">
            <i class="fas fa-search fa-4x text-muted mb-3" style="opacity: 0.5;"></i>
            <h5 class="text-secondary font-weight-bold">Obat Tidak Ditemukan</h5>
            <p class="text-muted small">Coba cari dengan kata kunci obat yang lain.</p>
        </div>

        @foreach($obat as $o)
            <div class="col-6 col-md-3 mb-4 item-kartu-obat">
                <div class="card h-100 border-0 shadow-sm mandjur-style-card" style="border-radius: 8px; overflow: hidden;">
                    <a href="/obat/{{ $o->id_obat ?? $o->id }}">
                        <div class="text-center p-3" style="background-color: #f8fafb; height: 180px; display: flex; align-items: center; justify-content: center;">
                            @if($o->foto)
                                <img src="{{ asset('assets/img/obat/'.$o->foto) }}" class="img-fluid" style="max-height: 140px; object-fit: contain; width: auto;" alt="{{ $o->nama_obat }}">
                            @else
                                <i class="fas fa-pills fa-4x text-muted"></i>
                            @endif
                        </div>
                    </a>
                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <div>
                            <a href="/obat/{{ $o->id_obat ?? $o->id }}" class="font-weight-bold d-block mb-1 text-dark text-decoration-none nama-produk-target" style="font-size: 14px; line-height: 1.3;">
                                {{ $o->nama_obat }}
                            </a>
                            <p class="text-muted small mb-2">{{ $o->satuan }}</p>
                        </div>
                        <div>
                            <div class="font-weight-bold mb-3" style="color: #164e47; font-size: 16px;">
                                Rp {{ number_format($o->harga_obat, 0, ',', '.') }}
                            </div>
                            <a href="/obat/{{ $o->id_obat ?? $o->id }}" class="btn btn-block py-2 font-weight-bold shadow-sm" style="background-color: #ffffff; border: 1px solid #1ea385; color: #1ea385; font-size: 12px; border-radius: 4px; transition: all 0.2s;">
                                <i class="fas fa-info-circle mr-1"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<hr class="my-5" style="border-top: 1px solid #eef2f2;">

<div class="row mb-3">
    <div class="col-12 mb-3">
        <h3 class="font-weight-bold" style="color: #1a1a1a; font-size: 24px; letter-spacing: -0.3px;">Baca Artikel Kesehatan Terkini</h3>
        <p class="text-muted small" style="font-size: 14px; margin-top: -5px;">Info dan tips kesehatan ditinjau oleh dokter.</p>
        
        <div class="d-flex align-items-center justify-content-between mt-3 flex-wrap">
            <div class="d-flex align-items-center mb-2">
                <button class="btn btn-sm px-3 py-2 font-weight-bold active-tab-artikel" style="border-radius: 8px; font-size: 13px; border: 1px solid #16a34a; background-color: #d1fae5; color: #16a34a; margin-right: 10px;">
                    Terbaru
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-6 mb-4">
        <a href="https://www.halodoc.com/artikel/apa-itu-sikap-denial-ini-penyebab-dampak-dan-cara-mengatasinya" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-block h-100">
            <div class="style-card-artikel d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge badge-kategori-artikel">Mental Health</span>
                        <div class="meta-info-artikel"><i class="far fa-clock mr-1"></i> 5 mnt baca</div>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <div class="wrapper-ikon-artikel mr-3">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h5 class="judul-link-artikel mb-0">
                            <span class="font-weight-bold">Apa Itu Sikap Denial? Ini Penyebab, Dampak, dan Cara Mengatasinya</span>
                        </h5>
                    </div>
                    <p class="cuplikan-artikel mt-2 mb-0">
                        Denial adalah mekanisme pertahanan psikologis yang memberikan perlindungan sementara saat seseorang belum siap menghadapi kenyataan...
                    </p>
                </div>
                <div class="meta-info-artikel mt-3 pt-2 border-top text-muted small">
                    Sumber: Halodoc
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="https://www.halodoc.com/artikel/ini-tanda-darah-tinggi-yang-harus-diketahui" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-block h-100">
            <div class="style-card-artikel d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge badge-kategori-artikel">Hidup Sehat</span>
                        <div class="meta-info-artikel"><i class="far fa-clock mr-1"></i> 7 mnt baca</div>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <div class="wrapper-ikon-artikel mr-3">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h5 class="judul-link-artikel mb-0">
                            <span class="font-weight-bold">Ini Tanda Darah Tinggi yang Harus Diketahui Sejak Dini</span>
                        </h5>
                    </div>
                    <p class="cuplikan-artikel mt-2 mb-0">
                        Hipertensi sering kali tidak menunjukkan gejala awal yang jelas. Kenali tanda-tanda tekanan darah tinggi sebelum terlambat...
                    </p>
                </div>
                <div class="meta-info-artikel mt-3 pt-2 border-top text-muted small">
                    Sumber: Halodoc
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="https://www.halodoc.com/artikel/catat-ini-cara-sederhana-atasi-gusi-bengkak-pada-anak" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-block h-100">
            <div class="style-card-artikel d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge badge-kategori-artikel">Kesehatan Anak</span>
                        <div class="meta-info-artikel"><i class="far fa-clock mr-1"></i> 4 mnt baca</div>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <div class="wrapper-ikon-artikel mr-3">
                            <i class="fas fa-child"></i>
                        </div>
                        <h5 class="judul-link-artikel mb-0">
                            <span class="font-weight-bold">Catat, Ini Cara Sederhana Atasi Gusi Bengkak pada Anak Anda</span>
                        </h5>
                    </div>
                    <p class="cuplikan-artikel mt-2 mb-0">
                        Gusi bengkak pada anak bisa dipicu oleh pertumbuhan gigi atau infeksi bakteri. Berikut langkah aman menanganinya di rumah...
                    </p>
                </div>
                <div class="meta-info-artikel mt-3 pt-2 border-top text-muted small">
                    Sumber: Halodoc
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="https://www.halodoc.com/artikel/ketahui-pantangan-makanan-bagi-pengidap-hipertiroid" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-block h-100">
            <div class="style-card-artikel d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge badge-kategori-artikel">Info Medis</span>
                        <div class="meta-info-artikel"><i class="far fa-clock mr-1"></i> 5 mnt baca</div>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <div class="wrapper-ikon-artikel mr-3">
                            <i class="fas fa-notes-medical"></i>
                        </div>
                        <h5 class="judul-link-artikel mb-0">
                            <span class="font-weight-bold">Ketahui Pantangan Makanan bagi Pengidap Penyakit Hipertiroid</span>
                        </h5>
                    </div>
                    <p class="cuplikan-artikel mt-2 mb-0">
                        Pengidap hipertiroid disarankan membatasi asupan yodium tinggi seperti rumput laut maupun seafood untuk menjaga kestabilan hormon...
                    </p>
                </div>
                <div class="meta-info-artikel mt-3 pt-2 border-top text-muted small">
                    Sumber: Halodoc
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="https://www.halodoc.com/artikel/ukuran-perut-hamil-4-bulan-normalnya-sebesar-alpukat" target="_blank" rel="noopener noreferrer" class="text-decoration-none d-block h-100">
            <div class="style-card-artikel d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge badge-kategori-artikel">Kehamilan</span>
                        <div class="meta-info-artikel"><i class="far fa-clock mr-1"></i> 4 mnt baca</div>
                    </div>
                    <div class="d-flex align-items-start mb-2">
                        <div class="wrapper-nurse-artikel mr-3">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <h5 class="judul-link-artikel mb-0">
                            <span class="font-weight-bold">Ukuran Perut Hamil 4 Bulan: Normalnya Sebesar Buah Alpukat?</span>
                        </h5>
                    </div>
                    <p class="cuplikan-artikel mt-2 mb-0">
                        Memasuki usia kehamilan 4 bulan, perkembangan janin mulai terlihat signifikan. Ketahui standar ukuran perut yang normal pada fase ini...
                    </p>
                </div>
                <div class="meta-info-artikel mt-3 pt-2 border-top text-muted small">
                    Sumber: Halodoc
                </div>
            </div>
        </a>
    </div>
</div>
<hr class="my-5" style="border-top: 1px solid #eef2f2;">

<div class="row mb-4">
    <div class="col-12">
        <h3 class="font-weight-bold" style="color: #1a1a1a; font-size: 24px; letter-spacing: -0.3px;">Kata Mereka tentang APOTIK SIS</h3>
        <p class="text-muted small" style="font-size: 14px; margin-top: -5px;">Kepercayaan dan kepuasan Anda adalah prioritas utama layanan kesehatan kami.</p>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            SW
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">DANI SETIAWAN</h6>
                            <small class="text-muted">Pasien Rutin</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Sangat membantu.. malam-malam butuh obat mendesak untuk anak, tidak perlu repot keluar rumah tinggal pesan langsung diantar cepat.”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            LA
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">ADLY ZAKY AMMAR</h6>
                            <small class="text-muted">Bapak Rumah Tangga</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Sangat Helpful!!! Terima kasih ya, sangat menghemat waktu. Katalog obatnya sangat lengkap dan harga obatnya pun sangat terjangkau sekali. Thank you, semoga kedepannya tambah keren lagi.”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            AF
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">AHKBAR FELAYATI</h6>
                            <small class="text-muted">Karyawan Swasta</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Menggunakan APOTIK SIS untuk penyediaan obat mingguan keluarga sangat memuaskan, walau di proses perlu verifikasi medis tetap dilayani dengan ramah dan cepat. Proses pencarian produk mudah & cepat. Semoga bisa dipertahankan!”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            RS
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">Rafli Aira Setiawan</h6>
                            <small class="text-muted">Pegawai Toko</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Sangat bersyukur nemu apotik online ini. Kemarin sempat drop karena masalah paru-paru, untung resep obat dari dokter bisa langsung ditebus di sini tanpa antre lama. Sekarang kondisi jauh lebih membaik dan plong.”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            MM
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">Marvel Bintang Maulana</h6>
                            <small class="text-muted">Chef</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Kerja seharian di dapur depan kompor bikin wajah gampang berminyak dan kusam. Iseng nyari sabun muka medis di kategori kecantikan APOTIK SIS, ternyata cocok banget. Minyak berlebih hilang, wajah jadi segar terus waktu masak.”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-0 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px; background-color: #a7f3d0; color: #065f46 !important;">
                            AA
                        </div>
                        <div>
                            <h6 class="font-weight-bold mb-0 text-dark" style="font-size: 14px;">Afra Nur Afifah</h6>
                            <small class="text-muted">Barista</small>
                        </div>
                    </div>
                    <p class="card-text text-secondary" style="font-size: 14px; line-height: 1.6; font-style: italic;">
                        “Tiap hari selalu testing kopi bikin asam lambung saya sering naik karena kebanyakan kafein. Untung stok obat maag dan lambung di sini selalu lengkap dan pengirimannya cepat banget pas lambung lagi perih-perihnya.”
                    </p>
                </div>
                <div class="mt-3">
                    <a href="/" class="btn btn-sm font-weight-bold px-3 btn-testimoni-beli">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/landing_page.js') }}"></script>
<script src="{{ asset('assets/js/pencarian_katalog.js') }}"></script>

@endsection