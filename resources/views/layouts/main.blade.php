<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Thursina</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #050507;
            color: #f8f8fb;
        }
        .navbar-brand {
            color: #ec4899 !important;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ec4899;
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
        .footer-bg {
            background: #07070b;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0,0,0,.75);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Kos Thursina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Daftar Akun</a>
                    </li>
                </ul>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{ url('/login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ url('/admin/login') }}" class="btn btn-pink">Login Admin</a>
                </div>
            </div>
        </div>
    </nav>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="/">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('products.index') }}">
                            Product
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('categories.index') }}">
                            Category
                        </a>
                    </li>

                    @auth

                        <li class="nav-item">
                            <span class="nav-link text-warning fw-bold">
                                {{ Auth::user()->name }}
                            </span>
                        </li>

                        <li class="nav-item ms-2">
                            <a href="{{ route('logout') }}"
                               class="btn btn-danger btn-sm">
                                Logout
                            </a>
                        </li>

                    @else

                        <li class="nav-item ms-2">
                            <a href="{{ route('login') }}"
                               class="btn btn-success btn-sm">
                                Login
                            </a>
                        </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <main class="container my-5 flex-grow-1">

        @yield('content')

    </main>

    <footer class="footer-bg text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Kos Thursina</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>