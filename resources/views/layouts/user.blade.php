<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Apotek Sis - Katalog</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            
            <div class="bg-mandjur shadow-sm">
                <div class="container-fluid px-md-5">
                    <div class="row align-items-center">
                        
                        <div class="col-md-3 text-center text-md-left mb-3 mb-md-0">
                            <a href="{{ route('user.landing') }}" class="navbar-brand-logo">
                                <img src="{{ asset('assets/img/apotiksis_logo.png') }}" alt="Apotek Sis Logo">
                            </a>
                        </div>
                        
                        <div class="col-md-7 mb-3 mb-md-0">
                            <form action="/katalog/cari" method="GET" class="m-0">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control border-0 py-4 shadow-sm search-input-custom" placeholder="Cari produk di sini (misal: Paracetamol, Amoxicillin)...">
                                    <div class="input-group-append">
                                        <button class="btn btn-mandjur-search shadow-sm" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                            <@auth
                                <div class="dropdown d-inline-block">
                                    <a href="#" class="dropdown-toggle text-decoration-none" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #2d5766;">
                                        <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow-sm border-0" aria-labelledby="dropdownUser">
                                        <a class="dropdown-item text-danger font-weight-bold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar (Logout)
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="text-decoration-none p-2 rounded-circle" style="background-color: #e2f0f0; color: #2d5766;" title="Login Akun">
                                    <i class="fas fa-user fa-md"></i>
                                </a>
                            @endauth
                            
                            <div class="cart-wrapper">
                                <a href="{{ route('user.keranjang.index') }}" class="text-mandjur nav-icon-box" style="font-size: 20px;">
                                    <i class="fas fa-shopping-bag"></i>
                                </a>
                                @if(session('cart') && count(session('cart')) > 0)
                                    <span class="position-absolute badge badge-pill rounded-circle cart-badge-custom">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="nav-kategori-container border-bottom mb-0">
                <div class="container-fluid px-md-5">
                    <ul class="nav nav-kategori justify-content-center justify-content-md-start">
                        <li class="nav-item">
                            <a class="nav-link pl-md-0 font-weight-bold text-dark" href="{{ route('user.landing') }}">Home</a>
                        </li>
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