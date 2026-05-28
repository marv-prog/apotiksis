<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Sis | Daftar Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-signup {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn-custom {
            background-color: #325a66;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #25434c;
            color: white;
        }
    </style>
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card card-signup p-4">
                    
                    <h3 class="text-center font-weight-bold mb-4" style="color: #325a66;">Daftar Akun Baru</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold small">Nama Lengkap</label>
                            <input type="text" name="nama_user" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('nama_user') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username unik" value="{{ old('username') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small">Email Aktif</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh@pembeli.com" value="{{ old('email') }}" required>
                            <small class="text-muted">Link verifikasi akan dikirim ke email ini.</small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Contoh: 08123456xxx" value="{{ old('no_hp') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan alamat pengiriman rumah Anda" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold small">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 5 karakter" required>
                        </div>

                        <button type="submit" class="btn btn-custom btn-block font-weight-bold mt-4 py-2">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="text-center mt-3 small text-muted">
                        Sudah punya akun? <a href="{{ route('login') }}" style="color: #325a66; font-weight: bold;">Login di sini</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>