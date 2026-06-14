<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Thursina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: #000;
            color: #fff;
        }
        .hero {
            min-height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.65)), url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
        }
        .hero .btn-pill {
            border-radius: 50px;
        }
        .navbar-nav .nav-link {
            color: rgba(255,255,255,.85) !important;
        }
        .navbar-brand {
            color: #ec4899 !important;
            letter-spacing: .05em;
        }
        .text-pink {
            color: #ec4899 !important;
        }
        .btn-pink {
            background: #ec4899;
            border-color: #ec4899;
            color: #fff;
        }
        .btn-pink:hover {
            background: #db2777;
            border-color: #db2777;
            color: #fff;
        }
        .section-light {
            background: #f8f9fa;
            color: #212529;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0,0,0,.7);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kos Thursina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{ url('/login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ url('/register') }}" class="btn btn-pink fw-semibold">Buat Akun</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-uppercase text-pink fw-semibold mb-3">Selamat Datang Di</p>
                    <h1 class="display-4 fw-bold mb-4">Website Kos Thursina</h1>
                    <p class="lead mb-4">Ayo sewa kamar pada kos kami, dijamin nyaman, aman dan harga  terjangkau.</p>
                </div>
            </div>
        </div>
    </section>





    <footer class="py-4 text-center text-white" style="background: rgba(0,0,0,.85);">
        <div class="container">
            <small>© {{ date('Y') }} Kos Thursina</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
