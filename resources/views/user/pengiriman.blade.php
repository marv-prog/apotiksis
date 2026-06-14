@extends('layouts.user')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 bg-white p-5 shadow-sm rounded border">
            
            <h2 class="font-weight-bold mb-3 text-dark" style="font-size: 28px;">Kebijakan Pengiriman PT APOTIK SIS JAYA EUY</h2>
            <p class="text-muted mb-4">Kami memproses pesanan setiap hari untuk memastikan produk sampai ke tangan Anda dengan cepat, aman, dan terjaga kualitasnya.</p>
            
            <div class="p-3 mb-4 rounded border-0" style="background-color: #f8fafc;">
                <h6 class="font-weight-bold mb-2 text-dark" style="font-size: 15px;">Jam operasional pemrosesan pesanan</h6>
                <p class="mb-0 text-secondary" style="font-size: 14px;"><strong>08.00 – 22.00 WIB</strong> (setiap hari)</p>
            </div>

            <hr class="my-4">

            <h4 class="font-weight-bold mb-3 text-dark" style="font-size: 18px;">Metode Pengiriman</h4>
            
            <div class="mb-4">
                <div class="d-flex align-items-center mb-2">
                    <h5 class="font-weight-bold mb-0 text-secondary" style="font-size: 15px;">Pengiriman Eksklusif Kurir APOTIK SIS</h5>
                </div>
                <p class="text-muted mb-3" style="font-size: 14px;">
                    Demi menjaga sterilitas dan keamanan produk obat, seluruh pengiriman dilakukan secara langsung oleh kurir resmi Apotek Mandjur.
                </p>
                
                <div class="p-3 bg-light border-left border-secondary rounded" style="font-size: 14px;">
                    <p class="mb-2 font-weight-bold text-dark">Ketentuan Pengiriman:</p>
                    <ul class="mb-0 text-secondary pl-3">
                        <li class="mb-1"> Pengiriman dilakukan setiap hari sesuai jam operasional.</li>
                        <li class="mb-1"> Pesanan diproses dan dikirim langsung oleh tim internal kami.</li>
                        <li class="mb-1"> Konfirmasi pengiriman akan diinformasikan kepada pelanggan melalui kontak yang terdaftar.</li>
                        <li> Area jangkauan mengikuti cakupan operasional kurir internal Apotek Mandjur.</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="font-weight-bold mb-3 text-dark" style="font-size: 18px;">Proses Pesanan</h4>
            <ol class="text-secondary pl-3 mb-4" style="font-size: 14px; line-height: 1.8;">
                <li>Pelanggan melakukan pemesanan melalui website Apotiksis.</li>
                <li>Sistem menerima pesanan dan pembayaran terkonfirmasi.</li>
                <li>Tim Mandjur menyiapkan pesanan (picking dan packing) dengan standar higienis.</li>
                <li>Pesanan diserahkan kepada kurir resmi APOTIK SIS.</li>
                <li>Pesanan segera diantarkan langsung ke alamat pelanggan.</li>
            </ol>

            <h4 class="font-weight-bold mb-3 text-dark" style="font-size: 18px;">Syarat dan Ketentuan</h4>
            <ul class="text-secondary pl-3 mb-4" style="font-size: 14px; line-height: 1.6;">
                <li class="mb-2">Pelanggan wajib memastikan alamat pengiriman lengkap dan titik lokasi benar.</li>
                <li class="mb-2">Waktu pengiriman disesuaikan dengan antrean dan kondisi lalu lintas wilayah tujuan.</li>
                <li class="mb-2">Jika alamat tidak ditemukan atau penerima tidak di lokasi, tim kami akan menghubungi nomor telepon yang terdaftar.</li>
            </ul>

            <div class="alert border-0 p-3" style="background-color: #fffbeb; color: #21cc11; border-left: 4px solid #26f50b !important; border-radius: 0 6px 6px 0;">
                <span class="font-weight-bold">Tips:</span> Pastikan nomor telepon yang Anda daftarkan aktif agar kurir kami mudah menghubungi saat pengantaran.
            </div>

        </div>
    </div>
</div>
@endsection