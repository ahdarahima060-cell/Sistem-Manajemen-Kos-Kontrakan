<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - Kos Thursina</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(255, 220, 240, .8),
                    rgba(220, 225, 255, .8)),
                url('https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI';
        }
        .card-register {
            width: 430px;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 20px 50px #0002;
        }
        .logo {
            text-align: center;
        }
        .logo i {
            font-size: 55px;
            color: #dc5a9b;
        }
        .logo h2 {
            color: #dc5a9b;
            font-weight: 800;
        }
        .input {
            position: relative;
        }
        .input i {
            position: absolute;
            left: 18px;
            top: 18px;
            color: #777;
        }
        .form-control {
            height: 52px;
            padding-left: 45px;
            border-radius: 12px;
        }
        .btn-main {
            background: #dc5a9b;
            color: white;
            height: 52px;
            border-radius: 12px;
            font-weight: bold;
            border: 0;
        }
        a {
            color: #dc5a9b;
            font-weight: bold;
            text-decoration: none;
        }

    </style>
</head>
<body>

    <div class="card-register">
        <div class="logo">
            <i class="fa-solid fa-building"></i>
            <h2>
                Manajemen Kos
            </h2>
            <p>
                Sistem Manajemen Kos Kontrakan
            </p>
        </div>
        <h3 class="text-center fw-bold">
            Buat Akun Baru
        </h3>
        <p class="text-center text-muted">
            Isi data berikut untuk membuat akun baru
        </p>
        <form method="POST" action="{{route('register')}}">
            @csrf

            <label>
                Nama Lengkap
            </label>
            <div class="input mb-3">
                <i class="fa fa-user"></i>
                <input
                    name="name"
                    class="form-control"
                    placeholder="Masukkan nama lengkap">
            </div>
            <label>Email</label>
            <div class="input mb-3">
                <i class="fa fa-envelope"></i>
                <input
                    name="email"
                    type="email"
                    class="form-control"
                    placeholder="Masukkan email Anda">
            </div>
            <label>Password</label>
            <div class="input mb-3">
                <i class="fa fa-lock"></i>
                <input
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Masukkan password">
            </div>
            <label>
                Konfirmasi Password
            </label>
            <div class="input mb-3">
                <i class="fa fa-lock"></i>
                <input
                    name="password_confirmation"
                    type="password"
                    class="form-control"
                    placeholder="Konfirmasi password">
            </div>

            <div class="mb-3">
                <input type="checkbox">

                Saya menyetujui

                <a href="#">
                    Syarat & Ketentuan
                </a>
            </div>
            <button class="btn-main w-100">
                <i class="fa fa-user-plus"></i>
                Buat Akun
            </button>
        </form>
        <p class="text-center mt-4">
            Sudah punya akun?
            <a href="{{route('login')}}">
                Masuk di sini
            </a>
        </p>
    </div>
</body>
</html>