<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Kos Thursina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #0b0b12;
            color: #fff;
        }
        .form-card {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(16px);
        }
        .btn-pink {
            background: #ec4899;
            border-color: #ec4899;
            color: #fff;
        }
        .btn-pink:hover {
            background: #db2777;
            border-color: #db2777;
        }
        .form-control {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.14);
            color: #fff;
        }
        .form-control::placeholder {
            color: rgba(255,255,255,.7);
            opacity: 1;
        }
        .form-label,
        .form-control,
        .text-soft,
        .card .h3 {
            color: #fff;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ec4899;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card form-card shadow-lg rounded-4 p-4">
                    <div class="text-center mb-4">
                        <h1 class="h3 fw-bold">Daftar Akun</h1>
                        <p class="text-soft">Isi data Anda untuk mendaftar sebagai pengguna Kos Thursina.</p>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" placeholder="Masukkan nomor HP">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan password">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" placeholder="Konfirmasi password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('/login') }}" class="btn btn-outline-light">Login</a>
                            <button type="submit" class="btn btn-pink px-4">Buat Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
