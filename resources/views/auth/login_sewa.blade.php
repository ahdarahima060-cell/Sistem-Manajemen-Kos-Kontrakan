<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Penyewa - Sistem Manajemen Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #eef2f7; font-family: 'Segoe UI', sans-serif; color: #333; padding-top: 4rem; }
        .auth-navbar { background-color: #1a252f; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 0.75rem 1.5rem; position: fixed; top: 0; right: 0; left: 0; z-index: 1000; }
        .auth-navbar .brand-text { color: #ffffff; font-weight: 700; font-size: 1.1rem; text-decoration: none; }
        .login-container { min-height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .login-card { background: #ffffff; border-radius: 16px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); width: 100%; max-width: 420px; padding: 2rem; }
        .brand-icon { font-size: 2.5rem; margin-bottom: 0.5rem; }
        .btn-custom-dark { background-color: #1a252f; color: #ffffff; border: none; padding: 0.75rem; border-radius: 50px; font-weight: 500; transition: all 0.3s ease; }
        .btn-custom-dark:hover { background-color: #2c3e50; color: #ffffff; }
        .form-control { border-radius: 8px; padding: 0.65rem 0.85rem; border: 1px solid #dee2e6; font-size: 0.95rem; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(26, 37, 47, 0.15); border-color: #1a252f; }
        .footer-text { font-size: 0.8rem; color: #6c757d; margin-top: 1.5rem; text-align: center; }
    </style>
</head>
<body>

<nav class="auth-navbar d-flex justify-content-between align-items-center">
    <a href="{{ url('/') }}" class="brand-text">
        <i class="fa-solid fa-house me-2"></i>Manajemen Kos Thursina
    </a>
    <div class="d-flex gap-2">
        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-light rounded-pill px-3">
            <i class="fa-solid fa-user-plus me-1"></i> Daftar
        </a>
        <a href="{{ route('login') }}" class="btn btn-sm btn-info text-white rounded-pill px-3">
            <i class="fa-solid fa-door-open me-1"></i> Login Admin
        </a>
    </div>
</nav>

<div class="container login-container">
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-icon">??</div>
            <h4 class="fw-bold m-0" style="color: #1a252f;">Login Penyewa</h4>
            <p class="text-muted small m-0">Silakan masuk untuk melihat dashboard, kamar, pembayaran, dan notifikasi.</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show small p-2" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show small p-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label text-secondary small fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required autocomplete="off" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label text-secondary small fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="d-grid gap-2 mb-2">
                <button type="submit" class="btn btn-custom-dark">Login Sekarang</button>
            </div>
        </form>

        <div class="text-center small mt-3">
            <span class="text-muted">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="text-decoration-none fw-semibold" style="color: #1a252f;">Daftar Akun</a>
        </div>
    </div>

    <div class="footer-text">
        &copy; 2026 Sistem Manajemen Kos Kontrakan.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>