@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard Apotek</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary"><i class="fas fa-pills"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Total Jenis Obat</h4></div>
                        <div class="card-body">{{ $total_obat }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Stok < 10</h4></div>
                        <div class="card-body">{{ $total_obat }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success"><i class="fas fa-calendar-alt"></i></div>
                    <div class="card-wrap">
                        <div class="card-header"><h4>Hari Ini</h4></div>
                        <div class="card-body" style="font-size: 14px;">{{ date('d M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Stok Obat Terbaru</h4>
                        <div class="card-header-action">
                            <a href="/admin/obat/create" class="btn btn-primary">Tambah Obat</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md" id="table-obat">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kategori</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obat as $o)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($o->foto)
                                                <img src="{{ asset('assets/img/obat/'.$o->foto) }}" width="50" class="rounded shadow-sm">
                                            @else
                                                <small class="text-muted">No Image</small>
                                            @endif
                                        </td>
                                        <td>{{ $o->id_kategori }}</td>
                                        <td><strong>{{ $o->nama_obat }}</strong></td>
                                        <td>Rp {{ number_format($o->harga_obat, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge {{ $o->stok <= 10 ? 'badge-danger' : 'badge-success' }}">
                                                {{ $o->stok }}
                                            </span>
                                        </td>
                                        <td>
                                        <div class="d-flex" style="gap: 5px;">
                                            <button type="button" class="btn btn-info btn-sm btn-detail" data-id="{{ $o->id_obat }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            
                                            <a href="/admin/obat/{{ $o->id_obat }}/edit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{ url('/admin/obat/' . $o->id_obat) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" style="z-index: 1050;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" style="color: white !important;">Detail Data Obat</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-content-body">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img id="detail_foto" src="" class="img-fluid rounded shadow" style="max-height: 250px;">
                    </div>
                    <div class="col-md-7">
                        <table class="table table-sm table-borderless">
                            <tr><th width="120">Nama Obat</th><td>: <span id="detail_nama" class="font-weight-bold"></span></td></tr>
                            <tr><th>Kategori</th><td>: <span id="detail_kategori"></span></td></tr>
                            <tr><th>Harga</th><td>: <span class="text-success font-weight-bold">Rp <span id="detail_harga"></span></span></td></tr>
                            <tr><th>Stok</th><td>: <span id="detail_stok"></span> <span id="detail_satuan"></span></td></tr>
                            <tr><th>Produksi</th><td>: <span id="detail_produksi"></span></td></tr>
                            <tr><th>Expired</th><td>: <span id="detail_expired" class="text-danger"></span></td></tr>
                        </table>
                        <hr>
                        <h6>Deskripsi :</h6>
                        <p id="detail_deskripsi" class="text-muted"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('click', function (e) {
    const button = e.target.closest('.btn-detail');
    
    if (button) {
        e.preventDefault();
        const id = button.getAttribute('data-id');
        
        document.getElementById('detail_nama').innerText = 'Loading...';
        document.getElementById('detail_foto').setAttribute('src', '');
        
        fetch('/admin/obat/' + id, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(res => {
            document.getElementById('detail_nama').innerText = res.nama_obat;
            document.getElementById('detail_kategori').innerText = res.id_kategori;
            document.getElementById('detail_stok').innerText = res.stok;
            document.getElementById('detail_satuan').innerText = res.satuan;
            document.getElementById('detail_produksi').innerText = res.waktu_produksi || '-';
            document.getElementById('detail_expired').innerText = res.tanggal_exp || '-';
            document.getElementById('detail_deskripsi').innerText = res.deskripsi || 'Tidak ada deskripsi.';
            
            let harga = new Intl.NumberFormat('id-ID').format(res.harga_obat);
            document.getElementById('detail_harga').innerText = harga;
            
            let pathFoto = res.foto ? '/assets/img/obat/' + res.foto : 'https://via.placeholder.com/300';
            document.getElementById('detail_foto').setAttribute('src', pathFoto);

            if (typeof $ !== 'undefined') {
                $('#modalDetail').modal('show');
            } else {
                document.getElementById('modalDetail').classList.add('show');
                document.getElementById('modalDetail').style.display = 'block';
                document.body.classList.add('modal-open');
                
                let backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade show';
                backdrop.id = 'manual-backdrop';
                document.body.appendChild(backdrop);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data! Cek apakah route /admin/obat/' + id + ' sudah benar.');
        });
    }
});

document.addEventListener('click', function(e) {
    if (e.target.closest('[data-dismiss="modal"]')) {
        const modal = document.getElementById('modalDetail');
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
        const backdrop = document.getElementById('manual-backdrop');
        if (backdrop) backdrop.remove();
    }
});
</script>
@endpush