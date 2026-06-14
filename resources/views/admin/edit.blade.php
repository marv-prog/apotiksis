@extends('layouts.admin') {{-- Sesuaikan dengan master layout admin kamu --}}

@section('content')
<div class="main-content" style="padding-left: 30px; padding-right: 30px; padding-top: 30px;">
    <section class="section">
        <div class="section-header mb-4">
            <h1 style="font-size: 24px; font-weight: 700; color: #34395e;">Edit Data Obat</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow-sm border-0" style="background: #ffffff; border-radius: 8px;">
                        <div class="card-body p-4">
                            
                            <form action="{{ url('/admin/obat/' . $obat->id_obat) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label class="form-label font-weight-bold">Nama Obat</label>
                                    <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label font-weight-bold">Kategori Obat</label>
                                    <select name="id_kategori" class="form-control" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id_kategori }}" {{ $obat->id_kategori == $cat->id_kategori ? 'selected' : '' }}>
                                                {{ $cat->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label font-weight-bold">Harga Obat</label>
                                        <input type="number" name="harga_obat" class="form-control" value="{{ $obat->harga_obat }}" required>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label font-weight-bold">Satuan</label>
                                        <input type="text" name="satuan" class="form-control" value="{{ $obat->satuan }}" required>
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="form-label font-weight-bold">Stok</label>
                                        <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label font-weight-bold">Tanggal Expired</label>
                                        <input type="date" name="tanggal_exp" class="form-control" value="{{ $obat->tanggal_exp }}" required>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label font-weight-bold">Waktu Produksi</label>
                                        <input type="datetime-local" name="waktu_produksi" class="form-control" value="{{ $obat->waktu_produksi ? date('Y-m-d\TH:i', strtotime($obat->waktu_produksi)) : '' }}" required>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label font-weight-bold">Deskripsi Obat</label>
                                    <textarea name="deskripsi" class="form-control" rows="4" style="height: auto !important;">{{ $obat->deskripsi }}</textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label font-weight-bold">Foto Obat (Kosongkan jika tidak ingin diganti)</label>
                                    <div class="mb-2">
                                        @if($obat->foto)
                                            <img src="{{ asset('assets/img/obat/' . $obat->foto) }}" alt="Foto Obat" width="100" class="img-thumbnail shadow-sm">
                                        @endif
                                    </div>
                                    <input type="file" name="foto" class="form-control">
                                </div>

                                <div class="form-group text-right mb-0">
                                    <a href="/admin/dashboard" class="btn btn-secondary mr-2" style="border-radius: 4px;">Batal</a>
                                    <button type="submit" class="btn btn-primary" style="background-color: #475ff1; border: none; border-radius: 4px; padding: 8px 16px;">Simpan Perubahan</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection