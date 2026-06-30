<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Kos Thursina</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <style>
        * {
            box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(255, 220, 240, .75),
                    rgba(220, 225, 255, .75)),
                url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 35px;

        }
        .logo-area i {

            font-size: 55px;
            color: #dc5a9b;

        }
        .logo-area h2 {
            color: #dc5a9b;
            font-weight: 800;
        }

        .logo-area p {
            color: #667085;
        }
        .card-login {
            width: 420px;
            background:
                rgba(255, 255, 255, .85);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            padding: 40px;
            box-shadow:
                0 20px 50px rgba(0, 0, 0, .15);

        }
        .form-control {
            height: 55px;
            border-radius: 12px;
            padding-left: 45px;
        }
        .input-box {
            position: relative;
        }
        .input-box i {
            position: absolute;
            top: 18px;
            left: 18px;
            color: #777;
        }
        .btn-main {
            background: #dc5a9b;
            color: white;
            height: 52px;
            border-radius: 12px;
            font-weight: 700;
            border: none;
        }
        .btn-main:hover {
            background: #c94788;
        }
        .footer-link {
            text-align: center;
            margin-top: 25px;
        }
        .footer-link a {
            color: #dc5a9b;
            text-decoration: none;
            font-weight: 700;
        }

    </style>
</head>
<body>
    <div>
        <div class="logo-area">
            <i class="fa-solid fa-building"></i>
            <h2>
                Manajemen Kos
            </h2>
            <p>
                Sistem Manajemen Kos Kontrakan
            </p>
        </div>


        <div class="card-login">
            <h3 class="text-center fw-bold mb-2">
                Selamat Datang Kembali!
            </h3>
            <p class="text-center text-muted mb-4">
                Silakan masuk untuk melanjutkan ke akun Anda
            </p>
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <label>Email</label>
                <div class="input-box mb-3">
                    <i class="fa fa-envelope"></i>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan email Anda">

                </div>
                <label>Password</label>
                <div class="input-box mb-3">
                    <i class="fa fa-lock"></i>
                    <input
                        type="password"
                        name="password"
                        class="form-control
                        placeholder="Masukkan password Anda">
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <input type="checkbox">
                        <span>
                            Ingat saya
                        </span>
                    </div>
                    <a href="#" style="color:#dc5a9b">
                        Lupa password?
                    </a>
                </div>
                <button class="btn-main w-100">
                    <i class="fa fa-right-to-bracket"></i>
                    Masuk
                </button>
            </form>
            <div class="footer-link">
                Belum punya akun?
                <a href="{{route('register')}}">
                    Daftar di sini
                </a>
            </div>
        </div>
    </div>
</body>
</html>