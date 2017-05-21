<?php
    session_start();
        function connectDB() {
            $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
            //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
            
            if (!$conn) {
                $res1 = pg_get_result($conn);
                die("Connection failed: " + pg_result_error($res1));
            }
            return $conn;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIRIMA</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
          
    <link rel="shortcut icon" href="images/UILogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <div id="for-alert" align="center">
    <?php 
        if (isset($_SESSION['isAdminLogin'])) {
        echo "<div><div class='alert alert-info fade in'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                    <p>Selamat datang, Admin!</p>
                </div>
            </div>";
        } else if (isset($_SESSION['isUserLogin'])) {
        echo "<div><div class='alert alert-info fade in'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>
                    <p>Selamat datang, ".$_SESSION['nama']."!</p>
                </div>
            </div>";
        }
     ?>
    </div>
    <header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="images/Universitas Inovasi-01.png" id="LogoUI" alt="logo">
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul id = "ul-nav-bar" class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Beranda</a></li>
                        <li><a href="index.php ">Tentang Kami</a></li> 
                     <?php 
                        if (isset($_SESSION['isUserLogin'])) {
                            echo "<li class='dropdown'> <a href='#'>Informasi SIRIMA <i class='fa fa-angle-down'></i></a> 
                                <ul role='menu' class='sub-menu'>
                                    <li> <a href= 'semas1.php'>Buat Pendaftaran</a> </li>
                                    <li> <a href= 'riwayatdaftar.php'>Riwayat Pendaftaran</a></li>
                                    <li> <a href= 'kartuujian.php'>Kartu Ujian</a> </li>
                                    <li> <a href= 'hasilseleksi.php'>Hasil Seleksi</a> </li>
                                </ul>
                            </li>

                            <li> <a href= '#' id= 'logout-btn'>Log Out</a> </li>";
                        } else if (isset($_SESSION['isAdminLogin'])) {
                            echo "<li class='dropdown'> <a href='#''>Laman Admin <i class='fa fa-angle-down'></i></a>
                                    <ul role='menu' class='sub-menu'>
                                        <li><a href= 'form_rekapJenjang.php'>Rekap Pendaftaran</a></li>
                                        <li><a href= 'form_rekapProdi.php'>Daftar Pelamar</a></li>
                                    </ul>
                                 </li>

                            <li> <a href= '#' id= 'logout-btn'>Log Out</a> </li>";
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="img-navbar" class="col-sm-12 text-center bottom-separator">
            <img src="images/tour-bg.png" class="img-responsive inline" alt="">
        </div>
    </header>

    <section id="home-slider">
         <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                      <h1>Selamat Datang di SIRIMA UI</h1>
                        <p>Sistem Informasi Penerimaan Mahasiswa (SIRIMA) merupakan sistem pendaftaran online mahasiswa baru yang diselenggarakan oleh Universitas Inovasi (UI). Tersedia 2 jalur pendaftaran, yakni jalur UUI (Undangan UI) yang diperuntukkan untuk jenjang S1, serta SEMAS UI (Seleksi Masuk UI) yang diperuntukkan untuk jenjang S1, S2, dan S3.</p>
                        <div id= "login-reg-nav"> 
                        <?php 
                             if (!isset($_SESSION['isLogin'])) {
                                echo "<a href='login.php' class='btn btn-common'>MASUK</a>
                                <a href='register.php' class='btn btn-common'>DAFTAR</a>";
                            } 
                        ?> 
                        </div>  
                    </div>
                    <img src="images/my-icons-collection/png/001-university.png" class="slider-house" alt="slider image">
                    <img src="images/home/slider/sun.png" class="slider-sun" alt="slider image">
                    <img src="images/home/slider/birds2.png" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="images/home/icon1.png" alt="">
                        </div>
                        <h2>UNDANGAN UI</h2>
                        <p>Undangan UI berlaku untuk menerima mahasiswa baru pada jenjang S1 tanpa harus mengikuti ujian seleksi. Tingkat pendidikan terakhir calon mahasiswa baru harus SMA/SMK sederajat.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
                            <img src="images/home/icon2.png" alt="">
                        </div>
                        <h2>SEMAS UI SARJANA</h2>
                        <p>Seleksi Masuk UI Sarjana menerima mahasiswa baru pada jenjang S1. Calon mahasiswa baru akan mengikuti Ujian Seleksi sesuai dengan jurusan atau prodi yang diinginkan.</p>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="900ms">
                            <img src="images/home/icon3.png" alt="">
                        </div>
                        <h2>SEMAS UI PASCA SARJANA</h2>
                        <p>Seleksi Masuk UI Sarjana menerima mahasiswa baru pada jenjang S2 dan S3. Calon mahasiswa baru akan mengikuti Ujian Seleksi sesuai dengan jurusan atau prodi yang direkomendasikan. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12  bottom-separator">
                    <img src="images/home/under.png" class="img-responsive" align="center" alt="">
                </div>
                <div class="col-sm-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                </div>
                <div>
                    <div class="col-sm-4 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms" align="center">
                        <h2>Contacts</h2>
                        <address>
                            E-mail: <a href="mailto:someone@example.com">sirima@ui.ac.id</a> <br> 
                            Phone: +1 (123) 456 7890 <br> 
                            Fax: +1 (123) 456 7891 <br> 
                        </address>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <h2>Address</h2>
                        <address>
                            Universitas Inovasi, <br> 
                            Jalan Margonda Raya, <br> 
                            Depok, Indonesia <br> 
                            <br>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; Universitas Inovasi 2017. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </footer>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/logout.js"></script>    
</body>
</html>
