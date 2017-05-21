<?php
    session_start();
    function funcCheckLogin() {
    if(!isset($_SESSION['isUserLogin'])) {
      header("Location: index.php");    
    } 
    if (!isset($_SESSION['isLogin'])) {
      header("Location: login.php");
    }
  }
  funcCheckLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIRIMA | Form Pembayaran</title>

    <!--Materialize css-->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">

    <!--triangle css-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!--script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->  
    <link rel="shortcut icon" href="../images/UILogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
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

                    <a class="navbar-brand" href="index.html">
                    	<h1><img src="images/uikecil.png" id="LogoUI" alt="logo"></h1>
                    </a>
                    
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul id="ul-nav-bar" class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="index.php">Tentang Kami</a></li>  
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
                            <li> <a href= 'logout.php' id= 'logout-btn'>Log Out</a> </li>";
                          } else if (isset($_SESSION['isAdminLogin'])) {
                            echo "<li class='dropdown'> <a href='#''>Laman Admin <i class='fa fa-angle-down'></i></a>
                            <ul role='menu' class='sub-menu'>
                            <li><a href= 'form_rekapJenjang.php'>Rekap Pendaftaran</a></li>
                            <li><a href= 'form_rekapProdi.php'>Daftar Pelamar</a></li>
                            </ul>
                            </li>
                            <li> <a href= 'logout.php' id= 'logout-btn'>Log Out</a> </li>";
                          }
                        ?>            
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="home-slider">
        <div class="container">
          <ol class="breadcrumb">
            <li><a href="semas1.html">Pilih Jenjang</a></li>
            <li><a href="semas2.html">Form Pendaftaran</a></li>        
            <li class="active">Form Pembayaran</li>
          </ol>
        </div>

        <div class="container">
            <h1>Form Pembayaran Semas Sarjana</h1>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Tipe Pembayaran</td>
                        <td>: UJIAN SEMAS SARJANA UNIVERSITAS INOVASI</td>
                    </tr>
                    <tr>
                        <td>ID Pendaftaran</td>
                        <td>: 201</td>
                    </tr>
                    <tr>
                        <td>Nama Pendaftar</td>
                        <td>: Grace Angelica</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pembayaran</td>
                        <td>: Rp.500.000,-</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn waves-effect waves-light" type="submit" name="action"><a href="semas4.html">Bayar</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

    <div class="row">
        <div class="col-sm-12">
            <div class="copyright-text text-center">
                <p>&copy; Universitas Inovasi 2017. All Rights Reserved.</p>
            </div>
        </div>
    </div>

   
</body>
</html>