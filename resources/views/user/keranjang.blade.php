@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/keranjang.css') }}">

<div class="container mt-4 mb-5">
    
    <div class="row align-items-center mb-4 border-bottom pb-3">
        <div class="col-md-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 bg-transparent" style="font-size: 14px;">
                    <li class="breadcrumb-item"><a href="{{ route('user.landing') }}" style="color: #e6005c; text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2d5766;">Keranjang</li>
                </ol>
            </nav>
        </div>
        
        <div class="col-md-8">
            <div class="stepper-wrapper">
                <div class="step-item active">
                    <div class="step-number">1</div>
                    <span>Keranjang</span>
                </div>
                
                <div class="step-line"></div>
                
                <div class="step-item">
                    <div class="step-number">2</div>
                    <span>Alamat</span>
                </div>
                
                <div class="step-line"></div>
                
                <div class="step-item">
                    <div class="step-number">3</div>
                    <span>Pembayaran</span>
                </div>
            </div>
        </div>
    </div>

    <h2 class="font-weight-bold mb-4" style="color: #2d5766;"><i class="fas fa-shopping-cart mr-2"></i>Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0" style="border-radius: 12px;">
                    <div class="table-responsive p-3">
                        <table class="table table-borderless align-middle mb-0">
                            <thead>
                                <tr class="text-muted border-bottom" style="font-size: 14px;">
                                    <th scope="col" colspan="2">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col" class="text-center">Jumlah</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalSemua = 0; @endphp
                                @foreach($cart as $id => $item)
                                    @php 
                                        $subtotal = $item['harga'] * $item['qty']; 
                                        $totalSemua += $subtotal; 
                                    @endphp
                                    <tr class="border-bottom" style="font-size: 15px;">
                                        <td style="width: 80px;" class="py-3">
                                            <div class="p-2 border rounded text-center" style="background: #ffffff; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                                                @if($item['foto'])
                                                    <img src="{{ asset('assets/img/obat/'.$item['foto']) }}" alt="{{ $item['nama_obat'] }}" class="img-fluid" style="max-height: 50px; object-fit: contain;">
                                                @else
                                                    <i class="fas fa-pills fa-2x text-muted py-2"></i>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-3 align-middle">
                                            <h6 class="font-weight-bold mb-1" style="color: #2d5766;">{{ $item['nama_obat'] }}</h6>
                                            <small class="text-muted">Satuan: {{ $item['satuan'] }}</small>
                                        </td>
                                        <td class="py-3 align-middle">
                                            Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                        </td>
                                        <td class="py-3 align-middle text-center">
                                            <span class="font-weight-bold px-3 py-1 border rounded bg-light">{{ $item['qty'] }}</span>
                                        </td>
                                        <td class="py-3 align-middle text-right font-weight-bold" style="color: #2d5766;">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 12px; background-color: #ffffff; border: 1px solid #eef2f2;">
                    <h5 class="font-weight-bold mb-3" style="color: #2d5766; border-bottom: 2px solid #eef2f2; padding-bottom: 10px;">Ringkasan Belanja</h5>
                    
                    <div class="d-flex justify-content-between mb-3" style="font-size: 15px;">
                        <span class="text-muted">Total Harga ({{ count($cart) }} Produk)</span>
                        <span class="font-weight-bold text-dark">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                    </div>

                    <hr class="my-3">

                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <span class="font-weight-bold" style="color: #2d5766; font-size: 16px;">Total Bayar</span>
                        <span class="font-weight-bold" style="color: #006673; font-size: 22px;">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                    </div>

                   <a href="{{ route('user.keranjang.alamat') }}" class="btn btn-block py-2.5 text-white font-weight-bold shadow-sm text-center" style="background-color: #325a66; border-radius: 8px; transition: background 0.2s; text-decoration: none;">
                        <i class="fas fa-map-marker-alt mr-2"></i> Lanjut ke Isi Alamat
                   </a>
                    
                    <a href="/" class="btn btn-block btn-light btn-sm mt-2 font-weight-bold py-2 text-muted" style="border: 1px solid #cbdcdc;">
                        <i class="fas fa-arrow-left mr-2"></i> Belanja Lagi
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 shadow-sm bg-white rounded" style="border: 1px solid #eef2f2;">
            <i class="fas fa-shopping-basket fa-5x mb-3" style="color: #cbdcdc;"></i>
            <h4 class="font-weight-bold" style="color: #2d5766;">Keranjangmu Masih Kosong</h4>
            <p class="text-muted small mb-4">Yuk, cari obat atau suplemen kesehatan yang kamu butuhkan sekarang!</p>
            <a href="/" class="btn px-4 py-2 text-white font-weight-bold" style="background-color: #006673; border-radius: 20px;">
                <i class="fas fa-search mr-2"></i> Mulai Cari Obat
            </a>
        </div>
    @endif
</div>
@endsection