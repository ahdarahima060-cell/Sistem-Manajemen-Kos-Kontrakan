<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kos Thursina</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }



        body {

            font-family: 'Segoe UI', sans-serif;

            background: #fff5fb;

            color: #333;

        }




        /* NAVBAR */

        .navbar {

            position: absolute;

            top: 0;

            width: 100%;

            z-index: 99;

            padding: 25px 60px;

        }


        .logo {

            color: white;

            font-size: 28px;

            font-weight: 800;

        }



        .logo span {

            display: block;

            font-size: 13px;

            font-weight: 400;

        }





        .menu {


            background: rgba(255, 255, 255, .18);

            backdrop-filter: blur(15px);

            padding: 15px 35px;

            border-radius: 50px;


        }



        .menu a {


            color: white;

            text-decoration: none;

            margin: 0 15px;

            font-weight: 600;


        }



        .menu a:hover {

            color: #ff69b4;

        }





        .btn-login {


            border: 1px solid white;

            color: white;

            padding: 10px 25px;

            border-radius: 20px;


        }



        .btn-register {


            background: #e279b5;

            color: white;

            padding: 10px 25px;

            border-radius: 20px;

            margin-left: 10px;


        }








        /* HERO */


        .hero {


            height: 100vh;


            background:


                linear-gradient(rgba(0, 0, 0, .55),
                    rgba(0, 0, 0, .55)),


                url("https://images.unsplash.com/photo-1560185008-b033106af5c3");


            background-size: cover;

            background-position: center;


            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;


            color: white;


        }




        .hero h1 {

            font-size: 75px;

            font-weight: 900;

        }



        .hero p {

            font-size: 22px;

        }


        /* FEATURE */


        .feature {


            margin-top: -70px;


        }


        .card-box {


            background: rgba(255, 255, 255, .75);

            backdrop-filter: blur(10px);

            padding: 30px;

            border-radius: 25px;

            height: 200px;

            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);


        }



        .icon {

            font-size: 40px;

            color: #e279b5;


        }







        section {


            padding: 100px 0;


        }



        .title {


            font-size: 40px;

            font-weight: 800;

            text-align: center;

            color: #b84d8a;


        }







        /* CARD KAMAR */


        .room-card {


            border-radius: 25px;

            overflow: hidden;

            border: none;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);


        }




        .room-card img {


            height: 250px;

            object-fit: cover;


        }









        /* KONTAK */


        .contact-card {


            background: #e279b5;

            color: white;

            border-radius: 25px;

            padding: 35px;


        }





        footer {


            background: #b84d8a;

            color: white;

            padding: 30px;


        }
    </style>


</head>




<body>



    <nav class="navbar">


        <div class="container-fluid d-flex justify-content-between align-items-center">


            <div class="logo">


                <i class="fa-solid fa-building"></i>
                Kos Thursina


                <span>

                    Nyaman, Aman, Terjangkau

                </span>


            </div>




            <div class="menu">


                <a href="#home">
                    Beranda
                </a>


                <a href="#kamar">
                    Kamar
                </a>


                <a href="#fasilitas">
                    Fasilitas
                </a>


                <a href="#kontak">
                    Kontak
                </a>


            </div>





            <div>


                <a href="/login" class="btn-login">

                    Login

                </a>



                <a href="/register" class="btn-register">

                    Buat Akun

                </a>



            </div>


        </div>


    </nav>







    <section class="hero" id="home">


        <div>


            <h5>
                SELAMAT DATANG DI
            </h5>


            <h1>
                Kos Thursina
            </h1>


            <p>

                Hunian nyaman dengan fasilitas lengkap
                <br>
                dan harga terjangkau.

            </p>


    </section>








    <section class="container feature">


        <div class="row g-4">



            <div class="col-md-3">

                <div class="card-box text-center">

                    <div class="icon">
                        <i class="fa fa-bed"></i>
                    </div>


                    <h5>
                        Kamar Nyaman
                    </h5>

                    <p>
                        Bersih dan nyaman
                    </p>


                </div>

            </div>






            <div class="col-md-3">

                <div class="card-box text-center">

                    <div class="icon">
                        <i class="fa fa-wifi"></i>
                    </div>


                    <h5>
                        Wifi Cepat
                    </h5>

                    <p>
                        Internet stabil
                    </p>


                </div>

            </div>






            <div class="col-md-3">

                <div class="card-box text-center">

                    <div class="icon">
                        <i class="fa fa-shield"></i>
                    </div>


                    <h5>
                        Aman
                    </h5>

                    <p>
                        Keamanan 24 jam
                    </p>


                </div>

            </div>






            <div class="col-md-3">

                <div class="card-box text-center">

                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>


                    <h5>
                        Harga Murah
                    </h5>

                    <p>
                        Sesuai fasilitas
                    </p>


                </div>

            </div>




        </div>


    </section>








    <section id="kamar">


        <div class="container">


            <h2 class="title">
                Pilihan Kamar
            </h2>


            <div class="row mt-5 g-4">



                <div class="col-md-4">


                    <div class="card room-card">


                        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace">


                        <div class="card-body">

                            <h4>
                                Standard
                            </h4>


                            <p>
                                Kamar nyaman untuk kebutuhan sehari-hari.
                            </p>

                            <h5>
                                Rp700.000/bulan
                            </h5>


                        </div>


                    </div>


                </div>






                <div class="col-md-4">


                    <div class="card room-card">


                        <img src="https://images.unsplash.com/photo-1615874959474-d609969a20ed">


                        <div class="card-body">


                            <h4>
                                AC Room
                            </h4>


                            <p>
                                Kamar dingin dan nyaman.
                            </p>


                            <h5>
                                Rp1.000.000/bulan
                            </h5>


                        </div>


                    </div>


                </div>






                <div class="col-md-4">


                    <div class="card room-card">


                        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85">


                        <div class="card-body">

                            <h4>
                                Premium
                            </h4>


                            <p>
                                Fasilitas lengkap.
                            </p>


                            <h5>
                                Rp1.500.000/bulan
                            </h5>


                        </div>


                    </div>


                </div>



            </div>


        </div>


    </section>







    <section id="fasilitas">


        <div class="container">


            <h2 class="title">
                Fasilitas
            </h2>



            <div class="row text-center mt-5">


                <div class="col">

                    <i class="fa fa-wifi fa-3x text-danger"></i>

                    <h5>
                        Wifi
                    </h5>

                </div>



                <div class="col">

                    <i class="fa fa-car fa-3x text-danger"></i>

                    <h5>
                        Parkir
                    </h5>

                </div>



                <div class="col">

                    <i class="fa fa-lock fa-3x text-danger"></i>

                    <h5>
                        Keamanan
                    </h5>

                </div>



            </div>


        </div>


    </section>



    <div class="container">



    </div>


    </section>






    <section id="kontak">


        <div class="container">


            <h2 class="title">
                Kontak
            </h2>


            <div class="row mt-5">


                <div class="col-md-4">


                    <div class="contact-card text-center">


                        <i class="fa fa-phone fa-2x"></i>

                        <h5>
                            Telepon
                        </h5>


                        <p>
                            0812-3456-7890
                        </p>


                    </div>


                </div>





                <div class="col-md-4">


                    <div class="contact-card text-center">


                        <i class="fa fa-envelope fa-2x"></i>

                        <h5>
                            Email
                        </h5>


                        <p>
                            kosthursina@gmail.com
                        </p>


                    </div>


                </div>




                <div class="col-md-4">


                    <div class="contact-card text-center">


                        <i class="fa fa-location-dot fa-2x"></i>

                        <h5>
                            Alamat
                        </h5>


                        <p>
                            Jl. Kos Thursina
                        </p>


                    </div>


                </div>


            </div>


        </div>


    </section>







    <footer class="text-center">

        © 2026 Kos Thursina

    </footer>




</body>

</html>