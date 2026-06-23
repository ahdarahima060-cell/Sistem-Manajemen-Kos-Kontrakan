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
            background: linear-gradient(
                135deg,
                #e9b5bd 0%,
                #c5bfd1 50%,
                #8eb9df 100%
            );
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            padding: 35px;
        }

        .logo-icon {
            font-size: 50px;
            color: #e56fa0;
        }

        .form-title {
            color: #e56fa0;
            font-weight: 700;
        }

        .subtitle {
            color: #6c757d;
            font-size: 15px;
        }

        .form-label {
            color: #555;
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #d9dee8;
            padding: 12px;
            background: #fff;
        }

        .form-control:focus {
            border-color: #e56fa0;
            box-shadow: 0 0 0 0.2rem rgba(229,111,160,.25);
        }

        .btn-pink {
            background: #e56fa0;
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 10px;
        }

        .btn-pink:hover {
            background: #d94c8d;
            color: white;
        }

        .btn-login {
            background: white;
            border: 1px solid #d9dee8;
            color: #555;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 10px;
        }

        .btn-login:hover {
            background: #f5f5f5;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card form-card">

                <div class="text-center mb-4">
                    <div class="logo-icon">
                        🏠
                    </div>

                    <h1 class="form-title mt-2">
                        Daftar Akun
                    </h1>

                    <p class="subtitle">
                        Sistem Manajemen Kos Kontrakan
                    </p>
                </div>

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Masukkan nama lengkap"
                               value="{{ old('name') }}"
                               required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Masukkan email"
                               value="{{ old('email') }}"
                               required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password"
                               required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Konfirmasi password"
                               required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="{{ url('/login') }}"
                           class="btn btn-login">
                            Login
                        </a>

                        <button type="submit"
                                class="btn btn-pink">
                            Buat Akun
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>