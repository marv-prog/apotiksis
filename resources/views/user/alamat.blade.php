@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/alamat.css') }}">

<div class="container mt-4 mb-5">
    
    <div class="row align-items-center mb-4 border-bottom pb-3">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 bg-transparent" style="font-size: 14px;">
                    <li class="breadcrumb-item"><a href="{{ route('user.landing') }}" style="color: #e6005c; text-decoration: none;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.keranjang.index') }}" style="color: #e6005c; text-decoration: none;">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2d5766;">Metode Pengiriman</li>
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
                <div class="step-item active">
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

    <h2 class="font-weight-bold mb-4" style="color: #2d5766;"><i class="fas fa-truck mr-2"></i>Metode Pengiriman</h2>

    <form action="{{ route('user.keranjang.simpan_alamat') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0 p-4 mb-4" style="border-radius: 12px; background-color: #ffffff;">
                    <h5 class="font-weight-bold mb-3" style="color: #2d5766;">Pilih Metode Pengambilan</h5>
                    
                    <div class="card shadow-sm border-0 p-4 mb-4" style="border-radius: 12px; background-color: #ffffff;">
                    <h5 class="font-weight-bold mb-3" style="color: #2d5766;"><i class="fas fa-truck mr-2"></i> Metode Pengiriman</h5>
                    <div class="form-group mb-0">
                        <label class="text-muted small font-weight-bold">Jenis Layanan</label>
                        
                        <input type="hidden" name="jenis_layanan" value="Diantar ke Rumah / Alamat">
                        
                        <div class="d-flex align-items-center p-3 rounded" style="background-color: #eef7f9; border: 1px solid #cbdcdc;">
                            <div class="mr-3 text-center rounded-circle d-flex align-items-center justify-content-center" style="background-color: #325a66; width: 40px; height: 40px;">
                                <i class="fas fa-home text-white"></i>
                            </div>
                            <div>
                                <strong style="color: #2d5766; display: block; font-size: 15px;">Diantar ke Rumah / Alamat</strong>
                                <span class="text-muted small">Pesanan obat Anda akan langsung diantarkan oleh kurir resmi apotiksis sampai ke alamat anda.</span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="card shadow-sm border-0 p-4" style="border-radius: 12px; background-color: #ffffff;">
                    <h5 class="font-weight-bold mb-4" style="color: #2d5766;" id="formTitle">Data Lengkap Penerima</h5>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold text-muted small" id="labelNama">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control" placeholder="Masukkan nama..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold text-muted small">No. Handphone</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 0812345678xx" required>
                        </div>
                    </div>

                    <div id="blokAlamatRumah">
                        <div class="form-group">
                            <label class="font-weight-bold text-muted small">Alamat Lengkap Rumah</label>
                            <textarea name="alamat_lengkap" class="form-control" rows="3" placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan..."></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-muted small">Kota / Kabupaten</label>
                                <input type="text" name="kota" class="form-control" placeholder="Masukkan kota...">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold text-muted small">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan kode pos...">
                            </div>
                        </div>
                    </div>

                    <div id="blokAmbilToko" style="display: none;">
                        <div class="alert alert-info border-0 shadow-sm" style="background-color: #eef9f9; color: #2d5766; border-radius: 8px;">
                            <i class="fas fa-info-circle mr-2"></i> 
                            <strong>Info Pengambilan:</strong> Anda dapat langsung datang ke <strong>APOTIKSIS</strong> untuk mengambil obat setelah pesanan dikonfirmasi dan dibayar. Tidak ada biaya ongkos kirim.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 12px; background-color: #ffffff; border: 1px solid #eef2f2;">
                    <h5 class="font-weight-bold mb-3" style="color: #2d5766; border-bottom: 2px solid #eef2f2; padding-bottom: 10px;">Informasi Ringkas</h5>
                    
                    @php $totalSemua = 0; @endphp
                    @foreach($cart as $item)
                        @php $totalSemua += ($item['harga'] * $item['qty']); @endphp
                    @endforeach

                    <div class="d-flex justify-content-between mb-3" style="font-size: 15px;">
                        <span class="text-muted">Total Barang</span>
                        <span class="font-weight-bold text-dark">Rp {{ number_format($totalSemua, 0, ',', '.') }}</span>
                    </div>

                    <hr class="my-3">

                    <button type="submit" class="btn btn-block py-2.5 text-white font-weight-bold shadow-sm text-center" style="background-color: #325a66; border-radius: 8px; border: none;">
                        <i class="fas fa-credit-card mr-2"></i> Lanjut ke Pembayaran
                    </button>
                    
                    <a href="{{ route('user.keranjang.index') }}" class="btn btn-block btn-light btn-sm mt-2 font-weight-bold py-2 text-muted" style="border: 1px solid #cbdcdc; text-decoration: none;">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Keranjang
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('assets/js/alamat.js') }}"></script>
@endsection