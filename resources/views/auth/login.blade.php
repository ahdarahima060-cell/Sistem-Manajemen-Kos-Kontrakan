<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Kos</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #e1afaf 0%, #61a9dc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .login-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .login-header {
            background: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 2px solid #f8f9fc;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: bold;
            color: #e67ca7;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #858796;
            margin: 0;
        }

        .login-body {
            padding: 40px;
            background: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #e67ca7;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #e3e6f0;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #df4e92;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .form-check {
            margin-bottom: 20px;
        }

        .form-check-input {
            border-radius: 4px;
        }

        .form-check-input:checked {
            background-color: #e67ca7;
            border-color: #e67ca7;
        }

        .btn-login {
            background: linear-gradient(135deg, #e67ca7 0%, #e67ca7 100%);
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: transform 0.2s;
            width: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(78, 115, 223, 0.4);
            background: linear-gradient(135deg, #e67ca7 0%, #e67ca7 100%);
            color: white;
        }

        .login-footer {
            background: #f8f9fc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e3e6f0;
        }

        .login-footer p {
            margin: 0;
            color: #858796;
            font-size: 0.95rem;
        }

        .login-footer a {
            color: #e67ca7;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 6px;
            border: none;
        }

        .input-group-text {
            border-radius: 6px 0 0 6px;
            background: white;
            border-color: #e3e6f0;
        }

        .form-control {
            border-radius: 0 6px 6px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h1>
                    <i class="fas fa-building"></i> Manajemen Kos
                </h1>
                <p>Sistem Manajemen Kos Kontrakan</p>
            </div>

            <!-- Body -->
            <div class="login-body">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <strong> Gagal Masuk!</strong>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.attempt') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text" id="email-addon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email"
                                placeholder="Masukkan email Anda"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password"
                                placeholder="Masukkan password Anda"
                                required
                            >
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login text-white">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
