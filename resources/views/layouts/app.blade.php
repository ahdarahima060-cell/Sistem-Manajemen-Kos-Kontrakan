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

            background: var(--light);
            font-family: 'Segoe UI', sans-serif;
            overflow-x: hidden;

        }



        .navbar {

            background: white;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, .15);
            z-index: 1030;
            min-height: 68px;

        }



        .navbar-brand {

            font-weight: bold;
            color: var(--primary) !important;
            font-size: 1.25rem;

        }



        .sidebar {

            position: fixed;

            top: 56px;

            bottom: 0;

            left: -250px;

            width: 250px;

            background: linear-gradient(180deg,
                    var(--primary),
                    var(--dark));

            color: white;

            padding: 20px 0;

            transition: .3s;

            z-index: 1020;

        }



        .sidebar.show {

            left: 0;

        }



        .main-content {

            padding: 20px;

            width: 100%;

            transition: .3s;

        }



        @media(min-width:992px) {

            body.sidebar-open .main-content {

                margin-left: 250px;

                width: calc(100% - 250px);

            }

        }



        .sidebar-overlay {

            position: fixed;

            top: 56px;

            left: 0;

            right: 0;

            bottom: 0;

            background: rgba(0, 0, 0, .4);

            display: none;

            z-index: 1010;

        }



        .sidebar-overlay.show {

            display: block;

        }



        .sidebar .nav-link {

            color: white;

            padding: 12px 20px;

            display: block;

            text-decoration: none;

        }



        .sidebar .nav-link:hover {

            background: rgba(255, 255, 255, .15);

        }



        .sidebar .nav-link i {

            width: 20px;

            margin-right: 10px;

        }



        .sidebar-toggle {

            border: none;

            background: none;

            color: var(--primary);

            font-size: 22px;

        }



        footer {

            background: white;

            border-top: 1px solid #ddd;

            padding: 40px;

            margin-top: 200px;

            text-align: center;

            color: var(--secondary);

        }
    </style>


</head>



<body>



    <nav class="navbar navbar-expand-lg navbar-light sticky-top">


        <div class="container-fluid">


            <button class="sidebar-toggle me-2"
                onclick="toggleSidebar()">

                <i class="fas fa-bars"></i>

            </button>



            <a class="navbar-brand" href="/">

                <i class="fas fa-building"></i>

                Manajemen Kos Thursina

            </a>



            <ul class="navbar-nav ms-auto">


                <li class="nav-item dropdown">


                    <a class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown">


                        <i class="fas fa-user-circle"></i>

                        Profil


                    </a>



                    <ul class="dropdown-menu">


                        <li>

                            <a class="dropdown-item"
                                href="{{route('logout')}}">

                                Logout

                            </a>

                        </li>


                    </ul>


                </li>


            </ul>



        </div>


    </nav>






    <div id="sidebarOverlay"
        class="sidebar-overlay"
        onclick="toggleSidebar()">

    </div>





    <div class="container-fluid">


        <div class="row">



            <nav id="sidebarMenu"
                class="sidebar">



                <ul class="nav flex-column">





                    <li class="nav-item">


                        <a class="nav-link"

                            href="{{ Auth::user()->role=='admin'
? route('profil.admin')
: route('profil') }}">


                            <i class="fa-solid fa-circle-user"></i>

                            Profil


                        </a>


                    </li>






                    <li class="nav-item">


                        <a class="nav-link"

                            href="{{ Auth::user()->role=='admin'
? route('dashboard.admin')
: route('dashboard.user') }}">



                            <i class="fas fa-dashboard"></i>

                            Dashboard


                        </a>


                    </li>






                    <li class="nav-item">


                        <a class="nav-link"
                            href="/kamar">


                            <i class="fas fa-door-open"></i>

                            Kamar


                        </a>


                    </li>

                    <li class="nav-item">


                        <a class="nav-link"
                            href="/kontrak">


                            <i class="fas fa-file-contract"></i>

                            Kontrak Sewa


                        </a>


                    </li>






                    <!-- NOTIFIKASI FIX -->


                    <li class="nav-item">


                        <a class="nav-link"
                            href="/notifikasi">


                            <i class="fas fa-bell"></i>

                            Notifikasi



                            @php


                            $jumlahNotif = 0;



                            if(Auth::check()){


                            $jumlahNotif = \App\Models\Reminder::where('status','pending')
                            ->whereHas('contract')
                            ->count();



                            }



                            @endphp





                            @if($jumlahNotif > 0)


                            <span class="badge bg-danger ms-2">

                                {{$jumlahNotif}}

                            </span>


                            @endif




                        </a>


                    </li>









                    @if(Auth::check() && Auth::user()->role=='admin')







                    <li class="nav-item">

                        <a class="nav-link"
                            href="/pembayaran">


                            <i class="fas fa-money-bill-wave"></i>

                            Pembayaran


                        </a>

                    </li>





                    <li class="nav-item">

                        <a class="nav-link"
                            href="/laporan">


                            <i class="fas fa-chart-bar"></i>

                            Laporan


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


        <p>

            © 2026 Sistem Manajemen Kos Kontrakan.

        </p>


    </footer>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <script>
        function toggleSidebar() {


            let sidebar = document.getElementById('sidebarMenu');

            let overlay = document.getElementById('sidebarOverlay');



            sidebar.classList.toggle('show');

            overlay.classList.toggle('show');

            document.body.classList.toggle('sidebar-open');



        }
    </script>



    @yield('scripts')


</body>


</html>