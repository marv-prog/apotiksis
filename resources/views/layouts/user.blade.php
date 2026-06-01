<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>APOTIKSIS - Katalog</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            
            @include('layouts.navbar')
            
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
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="background-color: #d4edda; color: #155724;">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(request()->get('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4 d-flex align-items-center justify-content-between" role="alert" style="background-color: #f8d7da; color: #721c24;">
                            <div>
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ request()->get('error') }}
                            </div>
                            <a href="{{ route('login') }}" class="btn btn-sm text-white font-weight-bold ml-3" style="background-color: #325a66; border-radius: 20px; padding: 5px 15px;">
                                Login Sekarang
                            </a>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html> 