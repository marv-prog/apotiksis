<div class="bg-mandjur shadow-sm py-2">
    <div class="container-fluid px-md-5">
        <div class="row align-items-center">
            
            <div class="col-md-3 text-center text-md-left mb-3 mb-md-0">
                <a href="{{ route('user.landing') }}" class="navbar-brand-logo">
                    <img src="{{ asset('assets/img/apotiksis_logo.png') }}" alt="APOTIKSIS Logo">
                </a>
            </div>
            
            <div class="col-md-7 mb-3 mb-md-0">
                <form action="/katalog/cari" method="GET" class="m-0">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control border-0 py-4 shadow-sm search-input-custom" placeholder="Cari produk di sini (misal: Paracetamol, Amoxicillin)...">
                        <div class="input-group-append">
                            <button class="btn shadow-sm text-white" type="submit" style="background-color: #2a9d8f !important; border: none !important; height: 46px !important; padding-left: 24px !important; padding-right: 24px !important; border-radius: 0 8px 8px 0 !important;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-md-2 text-center text-md-right d-flex align-items-center justify-content-md-end justify-content-center">
                
                @auth
                    <div class="dropdown d-inline-block mr-3">
                        <a href="#" class="dropdown-toggle text-decoration-none" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #2d5766;">
                            <i class="fas fa-user-circle fa-lg"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0" aria-labelledby="dropdownUser">
                            <a class="dropdown-item" href="{{ route('user.riwayat') }}">
                                <i class="fas fa-history mr-2"></i> Riwayat Transaksi
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger font-weight-bold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> Keluar (Logout)
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <div class="mr-3">
                        <a href="{{ route('login') }}" class="text-decoration-none p-2 rounded-circle d-inline-flex align-items-center justify-content-center" style="background-color: #e2f0f0; color: #2d5766; width: 40px; height: 40px;" title="Login Akun">
                            <i class="fas fa-user fa-md"></i>
                        </a>
                    </div>
                @endauth
                
                <div class="cart-wrapper position-relative">
                    @auth
                        <a href="{{ route('user.keranjang.index') }}" class="text-mandjur nav-icon-box" style="font-size: 20px;">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    @else
                        <a href="{{ route('user.landing') }}?error=Anda harus login terlebih dahulu untuk mengakses keranjang." class="text-mandjur nav-icon-box" style="font-size: 20px;" title="Harus Login">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    @endauth

                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="position-absolute badge badge-pill rounded-circle cart-badge-custom" style="top: -5px; right: -10px;">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>