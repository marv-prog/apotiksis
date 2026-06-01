<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTIKSIS | Verifikasi Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    </style>
    <meta http-equiv="refresh" content="5">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card p-5">
                <div class="card-body">
                    <h3 class="text-primary mb-4">📧 Verifikasi Email Anda!</h3>
                    <p class="text-muted">
                        Terima kasih telah mendaftar di <strong>APOTIKSIS</strong>. Sebelum melanjutkan, silakan periksa kotak masuk (Inbox) atau folder Spam pada Gmail Anda untuk mengaktifkan akun.
                    </p>
                    <hr>
                    <p class="small text-secondary">Belum menerima email?</p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">Kirim Ulang Link Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>