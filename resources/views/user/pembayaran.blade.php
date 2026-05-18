@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pembayaran.css') }}">

<div class="container mt-4 mb-5">
    
    <div class="row align-items-center mb-4 border-bottom pb-3">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 bg-transparent" style="font-size: 14px;">
                    <li class="breadcrumb-item"><a href="{{ route('user.landing') }}" style="color: #e6005c; text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.keranjang.index') }}" style="color: #e6005c; text-decoration: none;">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2d5766;">Pembayaran</li>
                </ol>
            </nav>
        </div>
        
        <div class="col-md-7">
            <div class="stepper-wrapper">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <span>Keranjang</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item">
                    <div class="step-number">2</div>
                    <span>Alamat</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item active">
                    <div class="step-number">3</div>
                    <span>Pembayaran</span>
                </div>
            </div>
        </div>
    </div>

    <h2 class="font-weight-bold mb-4" style="color: #2d5766;"><i class="fas fa-credit-card mr-2"></i>Metode Pembayaran</h2>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 p-4" style="border-radius: 12px; background-color: #ffffff;">
                <h5 class="font-weight-bold mb-4" style="color: #2d5766;">Pilih Metode Pembayaran</h5>
                
                <form action="{{ route('user.keranjang.checkout') }}" method="POST" id="formBayar">
                    @csrf
                    
                    <div class="position-relative mb-3">
                        <input type="radio" name="bank" id="payCOD" value="cod" class="d-none bank-input" checked>
                        <label for="payCOD" class="w-100 m-0 bank-label">
                            <div class="bank-option d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-money-bill-wave text-success fa-lg justify-content-center" style="width: 30px;"></i>
                                    <span class="font-weight-bold ml-2" style="color: #2d5766; font-size: 16px;">Cash on Delivery (COD)</span>
                                </div>
                                <i class="fas fa-chevron-right text-muted"></i>
                            </div>
                        </label>
                    </div>

                    <div class="position-relative mb-3">
                        <input type="radio" name="bank" id="payToko" value="bayar_di_toko" class="d-none bank-input">
                        <label for="payToko" class="w-100 m-0 bank-label">
                            <div class="bank-option d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-store-alt text-primary fa-lg justify-content-center" style="width: 30px;"></i>
                                    <span class="font-weight-bold ml-2" style="color: #2d5766; font-size: 16px;">Bayar Langsung di Toko (Apotek)</span>
                                </div>
                                <i class="fas fa-chevron-right text-muted"></i>
                            </div>
                        </label>
                    </div>

                    <div class="position-relative mb-3">
                        <input type="radio" name="bank" id="payQRIS" value="qris" class="d-none bank-input">
                        <label for="payQRIS" class="w-100 m-0 bank-label">
                            <div class="bank-option d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-qrcode text-danger fa-lg justify-content-center" style="width: 30px;"></i>
                                    <span class="font-weight-bold ml-2" style="color: #2d5766; font-size: 16px;">QRIS (E-Wallet Otomatis)</span>
                                </div>
                                <i class="fas fa-chevron-right text-muted"></i>
                            </div>
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 p-4" style="border-radius: 12px; background-color: #ffffff; border: 1px solid #eef2f2;">
                <h5 class="font-weight-bold mb-3" style="color: #2d5766; border-bottom: 2px solid #eef2f2; padding-bottom: 10px;">Ringkasan Pembayaran</h5>
                
                @php $totalSemua = 0; @endphp
                @foreach($cart as $item)
                    @php $totalSemua += ($item['harga'] * $item['qty']); @endphp
                @endforeach

                <div class="d-flex justify-content-between mb-2" style="font-size: 14px;">
                    <span class="text-muted">Total Harga Obat</span>
                    <span class="text-dark font-weight-bold">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3" style="font-size: 14px;">
                    <span class="text-muted">Biaya Layanan</span>
                    <span class="text-success font-weight-bold">Gratis</span>
                </div>

                <hr class="my-3">

                <div class="d-flex justify-content-between mb-4">
                    <span class="font-weight-bold" style="color: #2d5766; font-size: 16px;">Total Bayar</span>
                    <span class="font-weight-bold" style="color: #e6005c; font-size: 18px;">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                </div>

                <button type="submit" form="formBayar" class="btn btn-block py-2.5 text-white font-weight-bold shadow-sm text-center" style="background-color: #325a66; border-radius: 8px;">
                    <i class="fas fa-check-circle mr-2"></i> Konfirmasi Pembayaran
                </button>
                
                <a href="{{ route('user.keranjang.alamat') }}" class="btn btn-block btn-light btn-sm mt-2 font-weight-bold py-2 text-muted" style="border: 1px solid #cbdcdc; text-decoration: none;">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Alamat
                </a>
            </div>
        </div>
    </div>
</div>
@endsection