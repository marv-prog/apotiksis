@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<section class="section">
    <div class="section-header shadow-sm bg-white" style="border-radius: 4px;">
        <h1 class="text-dark"><i class="fas fa-users text-primary mr-2"></i> Manajemen Data User</h1>
    </div>

    <div class="section-body mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #d4edda; color: #155724;">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h4 class="font-weight-bold m-0 text-primary" style="font-size: 16px;">Daftar Pengguna Aktif</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md v-align-middle mb-0">
                        <thead>
                            <tr class="bg-light text-dark text-center">
                                <th style="width: 8%">No</th>
                                <th class="text-left">Nama</th>
                                <th class="text-left">Email</th>
                                <th>Tanggal Mendaftar</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr class="text-center">
                                    <td class="font-weight-bold text-muted">{{ $index + 1 }}</td>
                                    <td class="text-left font-weight-600">{{ $user->name ?? 'User Apotik' }}</td>
                                    <td class="text-left text-muted">{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-light p-2 font-weight-normal text-dark">
                                            <i class="far fa-calendar-alt text-muted mr-1"></i>
                                            {{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="/admin/user/{{ $user->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm px-3 border-0 shadow-sm" style="border-radius: 4px; background-color: #fc544b;">
                                                <i class="fas fa-trash-alt mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        Belum ada pengguna yang mendaftar di sistem.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection