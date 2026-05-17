<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Apotek Sis - Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <style>
        body { background-color: #f8fafc; }
        .bg-mandjur { 
            background-color: #a4d4d4 !important; 
            padding-top: 10px !important;    /* Kita kecilkan padding atas navbar */
            padding-bottom: 10px !important; /* Kita kecilkan padding bawah navbar */
            overflow: hidden;                /* Memastikan logo yang keluar batas tidak merusak layout */
        }
        .text-mandjur { color: #2d5766 !important; }
        .btn-mandjur-search {
            background-color: #3b6375 !important;
            color: white !important;
            border: none;
        }
        .btn-mandjur-search:hover { background-color: #2d5766 !important; color: white !important; }
        .nav-kategori .nav-link {
            color: #3b6375 !important;
            font-weight: 500;
            transition: all 0.2s;
            padding: 12px 20px;
        }
        .nav-kategori .nav-link:hover {
            color: #1a333d !important;
            border-bottom: 3px solid #3b6375;
        }
        .main-wrapper { padding: 0 !important; } 
        .main-content { padding: 40px 0 !important; }
        
        /* === TRIK FIX LOGO BESAR TAPI NAVBAR TETAP RAMPING === */
        .navbar-brand-logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none !important;
            height: 60px; /* Mengunci tinggi baris area logo di navbar */
        }
        .navbar-brand-logo img {
            max-height: 140px; /* Angka gambarnya tetap besar agar detail kapsul & teks terbaca */
            width: auto;
            object-fit: contain;
            margin-top: -5px;  /* Menarik logo sedikit ke atas agar center */
            transform: scale(1.5); /* Mendongkrak skala visual logo tanpa merusak tinggi kontainer */
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            
            <div class="bg-mandjur py-2 px-5 shadow-sm"> <div class="container-fluid px-md-5">
                    <div class="row align-items-center">
                        
                        <div class="col-md-3 text-center text-md-left mb-2 mb-md-0">
                            <a href="/" class="navbar-brand-logo">
                                <img src="{{ asset('assets/img/apotiksis_logo.png') }}" alt="Apotek Sis Logo">
                            </a>
                        </div>
                        
                        <div class="col-md-7 mb-2 mb-md-0">
                            <form action="/katalog/cari" method="GET">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control border-0 py-4 shadow-sm" placeholder="Cari produk di sini (misal: Paracetamol, Amoxicillin)..." style="border-radius: 6px 0 0 6px;">
                                    <div class="input-group-append">
                                        <button class="btn btn-mandjur-search px-4 shadow-sm" type="submit" style="border-radius: 0 6px 6px 0;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-2 text-center text-md-right text-mandjur" style="font-size: 20px;">
                            <a href="#" class="text-mandjur mr-3"><i class="far fa-user"></i></a>
                            <a href="#" class="text-mandjur"><i class="fas fa-shopping-bag"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border-bottom shadow-sm mb-0">
                <div class="container-fluid px-md-5">
                    <ul class="nav nav-kategori justify-content-center justify-content-md-start">
                        <li class="nav-item"><a class="nav-link pl-md-0 font-weight-bold text-dark" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Obat Resep</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Obat Bebas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Obat Herbal</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Susu & Nutrisi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Suplemen</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Alat Kesehatan</a></li>
                    </ul>
                </div>
            </div>

            <div class="main-content">
                <div class="container">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>