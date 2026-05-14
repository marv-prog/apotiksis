@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h2>Tambah Data Obat</h2>
</div>

<div class="section-body">
    <div class="card">
                <form action="/admin/obat" method="POST" enctype="multipart/form-data">   
                @csrf       
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto Obat</label>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-muted">Format: jpg, jpeg, png (Max: 2MB)</small>
                    </div>
                      <div class="form-group">
                    <label>Kategori Obat</label>
                    <select name="id_kategori" class="form-control">
                        <option value="1">Obat Bebas</option>
                        <option value="2">Obat Keras</option>
                        <option value="3">Antibiotik</option>
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
                        <div class="form-group">
                        <label>Deskripsi Obat</label>
                        <textarea name="deskripsi" class="form-control">{{ $obat->deskripsi ?? '' }}</textarea>
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
            <div class="card-footer text-right">
                <a href="/admin" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Data Obat</button>
            </div>
        </form>
    </div>
</div>
@endsection