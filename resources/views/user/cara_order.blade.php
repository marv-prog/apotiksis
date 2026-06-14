@extends('layouts.user')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 bg-white p-5 shadow-sm rounded border">
            
            <h2 class="font-weight-bold mb-4 text-dark" style="font-size: 28px;">Cara Pembelian di APOTIK SIS</h2>
            <p class="text-muted mb-5">Ikuti langkah-langkah mudah berikut untuk mendapatkan produk kesehatan yang Anda butuhkan secara cepat dan aman.</p>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3 text-primary font-weight-bold" style="font-size: 24px;">01</div>
                        <div>
                            <h5 class="font-weight-bold text-dark">Cari Produk</h5>
                            <p class="text-secondary" style="font-size: 14px;">Gunakan kolom pencarian di bagian atas website untuk menemukan obat atau produk kesehatan yang Anda perlukan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3 text-primary font-weight-bold" style="font-size: 24px;">02</div>
                        <div>
                            <h5 class="font-weight-bold text-dark">Pilih Produk</h5>
                            <p class="text-secondary" style="font-size: 14px;">Klik produk untuk melihat informasi detail, harga, dan memastikan stok tersedia sebelum melakukan pembelian.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3 text-primary font-weight-bold" style="font-size: 24px;">03</div>
                        <div>
                            <h5 class="font-weight-bold text-dark">Tambah ke Keranjang</h5>
                            <p class="text-secondary" style="font-size: 14px;">Tentukan jumlah produk, lalu klik tombol <strong>"Tambah ke Keranjang"</strong> untuk menyimpan pilihan Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3 text-primary font-weight-bold" style="font-size: 24px;">04</div>
                        <div>
                            <h5 class="font-weight-bold text-dark">Lakukan Checkout</h5>
                            <p class="text-secondary" style="font-size: 14px;">Masuk ke halaman keranjang, periksa kembali pesanan Anda, lalu klik <strong>"Checkout"</strong> dan lengkapi alamat pengiriman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="mr-3 text-primary font-weight-bold" style="font-size: 24px;">05</div>
                        <div>
                            <h5 class="font-weight-bold text-dark">Selesaikan Pembayaran</h5>
                            <p class="text-secondary" style="font-size: 14px;">Pilih metode pembayaran yang tersedia. Setelah pembayaran berhasil, pesanan Anda akan segera diproses oleh tim kami.</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="alert p-4" style="background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534;">
                <h6 class="font-weight-bold mb-2"><i class="fas fa-info-circle mr-2"></i> Perlu Bantuan Lebih Lanjut?</h6>
                <p class="mb-0" style="font-size: 14px;">Jika Anda memiliki pertanyaan seputar produk atau mengalami kendala saat bertransaksi, silakan hubungi tim layanan pelanggan kami melalui email atau nomor telepon yang tertera di bagian footer.</p>
            </div>

        </div>
    </div>
</div>
@endsection