<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Manajemen Kos Thursina</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --pink: #ec4899;
            --pink-soft: #ffe4f0;
            --pink-dark: #be185d;
            --bg: #f7f4fb;
            --surface: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: rgba(31, 41, 55, .08);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, 'Segoe UI', sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            z-index: 1100;
            box-shadow: 0 8px 24px rgba(15, 23, 42, .06);
        }

        .navbar .navbar-brand {
            color: var(--pink);
            font-size: 20px;
            font-weight: 700;
            letter-spacing: .02em;
        }

        .navbar .sidebar-toggle {
            border: none;
            background: none;
            font-size: 20px;
            color: var(--pink);
        }

        .navbar .user-chip {
            display: inline-flex;
            align-items: center;
            gap: .75rem;
            padding: .35rem .75rem;
            border-radius: 999px;
            background: rgba(236, 72, 153, .1);
        }

        .navbar .avatar {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--pink);
            color: white;
            font-weight: 700;
        }

        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            width: 260px;
            background: #ffffff;
            border-right: 1px solid var(--border);
            padding: 24px 0;
            overflow-y: auto;
            transition: transform .25s ease;
            z-index: 1050;
        }

        .sidebar.hide {
            transform: translateX(-100%);
        }

        .sidebar .menu-title {
            display: block;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .18em;
            color: var(--muted);
            padding: 0 24px 12px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: .85rem;
            padding: 12px 24px;
            margin: 0 12px 6px;
            border-radius: 18px;
            color: var(--text);
            transition: background .2s ease, color .2s ease;
            font-size: 0.95rem;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: rgba(236, 72, 153, .12);
            color: var(--pink-dark);
        }

        .sidebar a i {
            width: 22px;
            text-align: center;
            font-size: 14px;
        }

        .main-content {
            margin-top: 70px;
            margin-left: 260px;
            padding: 28px 32px 32px;
            transition: margin-left .25s ease;
            min-height: calc(100vh - 70px - 72px);
        }

        .footer {
            margin-left: 260px;
            padding: 16px 32px;
            background: var(--surface);
            border-top: 1px solid var(--border);
            color: var(--muted);
            transition: margin-left .25s ease;
        }

        .btn-pink {
            background: var(--pink);
            border-color: var(--pink);
            color: #fff;
        }

        .btn-pink:hover {
            background: var(--pink-dark);
            border-color: var(--pink-dark);
            color: #fff;
        }

        .card-soft {
            background: var(--surface);
            border: 1px solid rgba(31, 41, 55, .06);
            border-radius: 24px;
            box-shadow: 0 14px 30px rgba(15, 23, 42, .05);
        }

        .card-soft .card-body {
            padding: 1.75rem;
        }

        .text-muted-small {
            color: var(--muted);
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .55rem .85rem;
            border-radius: 999px;
            background: rgba(236, 72, 153, .12);
            color: var(--pink-dark);
            font-size: .8rem;
            font-weight: 700;
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.4);
            z-index: 1040;
        }

        .overlay.show {
            display: block;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content,
            .footer {
                margin-left: 0;
            }
            .navbar .container-fluid {
                flex-wrap: wrap;
                gap: .75rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid d-flex align-items-center justify-content-between px-4">
            <div class="d-flex align-items-center gap-3">
                <button class="sidebar-toggle d-lg-none" onclick="toggleSidebar()" aria-label="Toggle sidebar">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-building"></i>
                    Manajemen Kos Thursina
                </a>
            </div>
            <div class="d-flex align-items-center gap-2">
                @auth
                    <div class="user-chip d-none d-md-inline-flex">
                        <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        <div class="text-start">
                            <div class="small fw-semibold">{{ Auth::user()->name }}</div>
                            <div class="text-muted small">{{ ucfirst(Auth::user()->role) }}</div>
                        </div>
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-pink btn-sm">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    @auth
        <div id="sidebar" class="sidebar">
            <span class="menu-title">Menu Utama</span>
            <a href="{{ Auth::user()->role == 'admin' ? route('dashboard.admin') : route('dashboard.user') }}" class="{{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                <i class="fa fa-chart-line"></i>
                Dashboard
            </a>
            <a href="{{ route('kamar.index') }}" class="{{ request()->routeIs('kamar.*') ? 'active' : '' }}">
                <i class="fa fa-door-open"></i>
                Kamar
            </a>
            <a href="{{ route('penyewa') }}" class="{{ request()->routeIs('kontrak') ? 'active' : '' }}">
                <i class="fa fa-file-contract"></i>
                Data Sewa
            </a>
            <a href="{{ route('notifikasi') }}" class="{{ request()->routeIs('notifikasi') ? 'active' : '' }}">
                <i class="fa fa-bell"></i>
                Notifikasi
            </a>
            <a href="{{ route('pembayaran') }}" class="{{ request()->routeIs('pembayaran') ? 'active' : '' }}">
                <i class="fa fa-money-bill"></i>
                Pembayaran
            </a>
            @if(Auth::user()->role == 'admin')
                <a href="{{ route('laporan') }}" class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
                    <i class="fa fa-chart-bar"></i>
                    Laporan
                </a>
            @endif
            <span class="menu-title mt-4">Akun</span>
            <a href="{{ Auth::user()->role == 'admin' ? route('profil.admin') : route('profil') }}">
                <i class="fa fa-user"></i>
                Profil
            </a>
        </div>
        <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>
    @endauth

    <main id="content" class="main-content">
        @yield('content')
    </main>

    <footer class="footer">
        © {{ date('Y') }} Sistem Manajemen Kos Kontrakan
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            if (!sidebar) return;
            sidebar.classList.toggle('show');
            overlay?.classList.toggle('show');
        }
    </script>
    @yield('scripts')
</body>
</html>
