@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1><i class="fas fa-pills text-primary mr-2"></i> Tambah Data Obat</h1>
</div>

<div class="section-body">
    <div class="card card-primary shadow-sm">
        <form action="/admin/obat" method="POST" enctype="multipart/form-data">   
            @csrf       
            <div class="card-body">
                
                <div class="row">
                    <div class="form-group col-md-5">
                        <label class="font-weight-bold"><i class="fas fa-medkit text-muted mr-1"></i> Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" placeholder="Masukkan nama obat..." required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold"><i class="fas fa-image text-muted mr-1"></i> Foto Obat</label>
                        <input type="file" name="foto" class="form-control">
                        <small class="text-muted d-block mt-1">Format: jpg, jpeg, png (Max: 2MB)</small>
                    </div>
                    <div class="form-group col-md-3">
                    <label class="font-weight-bold"><i class="fas fa-tags text-muted mr-1"></i> Kategori Obat</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id_kategori }}">{{ $cat->nama_kategori }}</option>
                        @endforeach
                        
                    </select>
                </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold"><i class="fas fa-money-bill-wave text-muted mr-1"></i> Harga Obat</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-whitesmoke font-weight-bold">Rp</div>
                            </div>
                            <input type="number" name="harga_obat" class="form-control" placeholder="Contoh: 15000" required>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold"><i class="fas fa-box text-muted mr-1"></i> Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="Contoh: Tablet/Botol" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="font-weight-bold"><i class="fas fa-cubes text-muted mr-1"></i> Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Contoh: 100" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label class="font-weight-bold"><i class="fas fa-file-alt text-muted mr-1"></i> Deskripsi Obat</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tulis keterangan atau khasiat obat di sini...">{{ $obat->deskripsi ?? '' }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold"><i class="fas fa-calendar-times text-danger mr-1"></i> Tanggal Expired</label>
                        <input type="date" name="tanggal_exp" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold"><i class="fas fa-industry text-success mr-1"></i> Waktu Produksi</label>
                        <input type="datetime-local" name="waktu_produksi" class="form-control" required>
                    </div>
                </div>
                
            </div>
            
            <div class="card-footer bg-whitesmoke text-right">
                <a href="/admin/dashboard" class="btn btn-secondary px-4 mr-2">
                    <i class="fas fa-arrow-left mr-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary px-4 shadow-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Data Obat
                </button>
            </div>
        </form>
    </div>
</div>
@endsection