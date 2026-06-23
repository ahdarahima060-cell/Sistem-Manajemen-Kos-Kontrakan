<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Manajemen Kos Thursina</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #e279b5;
            --secondary: #858796;
            --light: #f8f9fc;
            --dark: #e279b5;
        }

        body {
            background-color: var(--light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-bottom: 1px solid #e3e6f0;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary) !important;
            font-size: 1.25rem;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 10%, var(--dark) 100%);
            color: white;
            padding: 20px 0;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
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
        }

        .main-content {
            padding: 20px;
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

        .badge {
            padding: 8px 12px;
            font-size: 0.85rem;
        }

        .table {
            font-size: 0.95rem;
        }

        .table-hover tbody tr:hover {
            background-color: var(--light);
        }

        footer {
            background-color: white;
            border-top: 1px solid #e3e6f0;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
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
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="container-fluid">
        <div class="row" style="min-height: calc(100vh - 80px);">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kamar*') ? 'active' : '' }}" href="/kamar">
                            <i class="fas fa-door-open"></i> Kamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('penyewa*') ? 'active' : '' }}" href="/penyewa">
                            <i class="fas fa-users"></i> Penyewa & Kontrak
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}" href="/pembayaran">
                            <i class="fas fa-money-bill-wave"></i> Pembayaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}" href="/laporan">
                            <i class="fas fa-chart-bar"></i> Laporan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                    </li>
                    <a href="{{ route('profil') }}"
       class="{{ request()->routeIs('profil') ? 'active' : '' }}">
        <i class="fa-solid fa-circle-user"></i>
        Profil
    </a>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Sistem Manajemen Kos Kontrakan.</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
