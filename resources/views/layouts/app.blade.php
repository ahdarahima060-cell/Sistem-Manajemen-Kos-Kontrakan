<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title') - Sistem Manajemen Kos Thursina
    </title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        :root {

            --pink: #e279b5;
            --dark: #b84d8a;
            --bg: #f8f9fc;

        }



        body {

            margin: 0;
            background: var(--bg);
            font-family: 'Segoe UI', sans-serif;

        }



        /* NAVBAR */

        .navbar {

            height: 70px;

            background: white;

            position: fixed;

            top: 0;

            left: 0;

            right: 0;

            z-index: 1000;

            box-shadow: 0 3px 10px rgba(0, 0, 0, .1);

        }



        .navbar-brand {

            color: var(--pink) !important;

            font-weight: bold;

            font-size: 22px;

        }



        .sidebar-toggle {

            border: none;

            background: none;

            font-size: 25px;

            color: var(--pink);

        }





        /* SIDEBAR */


        .sidebar {


            position: fixed;

            top: 70px;

            left: 0;

            bottom: 0;

            width: 260px;

            background: linear-gradient(180deg,
                    var(--pink),
                    var(--dark));


            padding-top: 20px;

            transition: .3s;

            z-index: 999;


        }



        .sidebar.hide {

            left: -260px;

        }




        .sidebar a {


            display: block;

            padding: 14px 25px;

            color: white;

            text-decoration: none;

            font-size: 16px;


        }



        .sidebar a:hover {


            background: rgba(255, 255, 255, .2);


        }



        .sidebar i {


            width: 25px;

        }





        /* CONTENT */


        .main-content {


            margin-left: 260px;

            padding: 100px 40px 40px;

            min-height: calc(100vh - 70px);

            transition: .3s;


        }



        .main-content.full {


            margin-left: 0;


        }




        /* FOOTER */


        footer {


            margin-left: 260px;

            padding: 25px;

            background: white;

            text-align: center;

            color: #777;

            transition: .3s;


        }



        footer.full {


            margin-left: 0;


        }




        /* MOBILE */


        @media(max-width:992px) {


            .sidebar {

                left: -260px;

            }


            .sidebar.show {

                left: 0;

            }


            .main-content {

                margin-left: 0;

                padding: 90px 15px;

            }


            footer {

                margin-left: 0;

            }


        }
    </style>


</head>



<body>



    <!-- NAVBAR -->


    <nav class="navbar">


        <div class="container-fluid">



            <button class="sidebar-toggle"
                onclick="toggleMenu()">


                <i class="fa fa-bars"></i>


            </button>




            <a class="navbar-brand">


                <i class="fa fa-building"></i>

                Manajemen Kos Thursina


            </a>




            <div class="d-flex align-items-center gap-3">



                <a href="{{ Auth::user()->role=='admin'
? route('profil.admin')
: route('profil') }}"
                    class="text-dark text-decoration-none">


                    <i class="fa fa-user-circle"></i>

                    Profil


                </a>





                <a href="{{route('logout')}}"
                    class="btn btn-danger btn-sm">


                    <i class="fa fa-right-from-bracket"></i>

                    Logout


                </a>



            </div>




        </div>


    </nav>






    <!-- SIDEBAR -->


    <div id="sidebar"
        class="sidebar">



        <a href="{{ Auth::user()->role=='admin'
? route('profil.admin')
: route('profil') }}">


            <i class="fa fa-user"></i>

            Profil


        </a>






        <a href="{{ Auth::user()->role=='admin'
? route('dashboard.admin')
: route('dashboard.user') }}">


            <i class="fa fa-dashboard"></i>

            Dashboard


        </a>







        <a href="/kamar">


            <i class="fa fa-door-open"></i>

            Kamar


        </a>







        <a href="/penyewa">


            <i class="fa fa-file-contract"></i>

            Data Sewa


        </a>








        <a href="/notifikasi">


            <i class="fa fa-bell"></i>

            Notifikasi


        </a>







        @if(Auth::user()->role=='admin')



        <a href="/pembayaran">


            <i class="fa fa-money-bill"></i>

            Pembayaran


        </a>






        <a href="/laporan">


            <i class="fa fa-chart-bar"></i>

            Laporan


        </a>



        @endif






    </div>









    <!-- ISI HALAMAN -->


    <div id="content"
        class="main-content">


        @yield('content')


    </div>









    <footer id="footer">


        © 2026 Sistem Manajemen Kos Kontrakan


    </footer>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <script>
        function toggleMenu() {


            let sidebar =
                document.getElementById('sidebar');


            let content =
                document.getElementById('content');


            let footer =
                document.getElementById('footer');



            sidebar.classList.toggle('hide');

            content.classList.toggle('full');

            footer.classList.toggle('full');


        }
    </script>



    @yield('scripts')



</body>

</html>