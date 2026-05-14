@extends('layouts.user') {{-- Pastikan kamu sudah buat layouts/user.blade.php ya --}}

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="hero bg-primary text-white">
            <div class="hero-inner">
                <h2>Selamat Datang di Apotek Sis</h2>
                <p class="lead">Solusi kesehatan lengkap, aman, dan terpercaya.</p>
            </div>
        </div>
    </div>

    {{-- Contoh Tampilan Obat (Nanti kita ambil dari Database) --}}
    <div class="col-12 col-md-4 col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Paracetamol 500mg</h4>
            </div>
            <div class="card-body">
                <p>Meredakan demam dan nyeri.</p>
                <button class="btn btn-primary btn-block">Detail Obat</button>
            </div>
        </div>
    </div>
</div>
@endsection