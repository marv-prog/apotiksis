@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Data Obat</h1>
</div>

<div class="section-body">
    <div class="card">
        <form action="/admin/obat/{{ $obat->id_obat }}" method="POST">
            @csrf
            @method('PUT')
            value="{{ $obat->nama_kolom }}"
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                         <label>Nama Obat</label>
                         <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}">
                    </div>
                    <div class="form-group">
                    <label>Kategori Obat</label>
                    <select name="id_kategori" class="form-control">
                        <option value="1" {{ $obat->id_kategori == 1 ? 'selected' : '' }}>Obat Bebas</option>
                        <option value="2" {{ $obat->id_kategori == 2 ? 'selected' : '' }}>Obat Keras</option>
                        <option value="2" {{ $obat->id_kategori == 2 ? 'selected' : '' }}>Antibiotik</option>
                    </select>
                </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Harga Obat</label>
                        <input type="number" name="harga_obat" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="Contoh: Tablet/Botol" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Expired</label>
                        <input type="date" name="tanggal_exp" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Waktu Produksi</label>
                        <input type="datetime-local" name="waktu_produksi" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label>Foto Obat (Kosongkan jika tidak ingin diganti)</label>
            @if($obat->foto)
                <div class="mb-2">
                    <img src="{{ asset('assets/img/obat/'.$obat->foto) }}" width="100px" class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>
             <div class="form-group">
                        <label>Deskripsi Obat</label>
                        <textarea name="deskripsi" class="form-control">{{ $obat->deskripsi ?? '' }}</textarea>
                    </div>
            <div class="card-footer text-right">
                <a href="/admin" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
</div>
@endsection