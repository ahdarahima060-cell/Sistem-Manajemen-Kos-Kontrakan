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
            --primary: #e279b5;
            --secondary: #858796;
            --light: #f8f9fc;
            --dark: #b84d8a;
        }

        body {
            background-color: var(--light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-bottom: 1px solid #e3e6f0;
            z-index: 1030;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary) !important;
            font-size: 1.25rem;
        }

        /* --- Perbaikan Struktur & Animasi Sidebar --- */
        .sidebar {
            position: fixed;
            top: 56px; /* Sesuai tinggi navbar */
            bottom: 0;
            left: -250px; /* Sembunyi di kiri secara default */
            width: 250px;
            z-index: 1020;
            background: linear-gradient(180deg, var(--primary) 10%, var(--dark) 100%);
            color: white;
            padding: 20px 0;
            transition: left 0.3s ease-in-out;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        /* Ketika aktif/dibuka */
        .sidebar.show {
            left: 0;
        }

        /* Main Content otomatis menyesuaikan jika sidebar dibuka (pada layar besar) */
        .main-content {
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
            width: 100%;
        }

        @media (min-width: 992px) {
            body.sidebar-open .main-content {
                margin-left: 250px;
                width: calc(100% - 250px);
            }
        }

        /* Overlay background saat klik di luar sidebar (khusus mobile/tablet) */
        .sidebar-overlay {
            position: fixed;
            top: 56px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1010;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* --- Elemen Sidebar & Pendukung --- */
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            display: block;
            text-decoration: none;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: white;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-toggle {
            border: none;
            background: transparent;
            color: var(--primary);
            font-size: 1.25rem;
            padding: 0.25rem 0.75rem;
            cursor: pointer;
        }

        .sidebar-toggle:hover {
            color: var(--dark);
        }

        .card {
            border-radius: 8px;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--dark);
            border-color: var(--dark);
        }

        footer {
            background-color: white;
            border-top: 1px solid #e3e6f0;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
            color: var(--secondary);
            transition: margin-left 0.3s ease-in-out;
        }

        @media (min-width: 992px) {
            body.sidebar-open footer {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <button class="sidebar-toggle me-2" type="button" onclick="toggleSidebar()" aria-label="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </button>
            
            <a class="navbar-brand" href="/">
                <i class="fas fa-building"></i> Manajemen Kos Thursina
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebarOverlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="sidebar">
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}"
               href="{{ route('profil') }}">
                <i class="fa-solid fa-circle-user"></i> Profil
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="{{ Auth::user()->role == 'admin' ? route('dashboard.admin') : route('dashboard.user') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('kamar*') ? 'active' : '' }}"
               href="/kamar">
                <i class="fas fa-door-open"></i> Kamar
            </a>
        </li>

        @if(Auth::check() && Auth::user()->role == 'admin')

            <li class="nav-item">
                <a class="nav-link {{ request()->is('penyewa*') ? 'active' : '' }}"
                   href="/penyewa">
                    <i class="fas fa-users"></i> Penyewa & Kontrak
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}"
                   href="/pembayaran">
                    <i class="fas fa-money-bill-wave"></i> Pembayaran
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}"
                   href="/laporan">
                    <i class="fas fa-chart-bar"></i> Laporan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
            </li>

        @endif

    </ul>
</nav>

            <main class="main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Sistem Manajemen Kos Kontrakan.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            const overlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                body.classList.remove('sidebar-open');
            } else {
                sidebar.classList.add('show');
                overlay.classList.add('show');
                body.classList.add('sidebar-open');
            }
        }
    </script>
    
    @yield('scripts')
</body>
</html>