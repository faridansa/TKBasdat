<?php
    //session start to login
    session_start();
    if(!isset($_SESSION["userlogin"])){
        header("Location: ../login.php");
    }

    //attempt connection
    $dbh = pg_connect("host=localhost dbname=datafirda user=postgres");
    if(!$dbh){
        die("Error in connection:" .pg_last_error());
    }

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIRIMA | Pilih Jenjang Pendaftaran</title>

    <!--CSS-->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 

	<link href="css/responsive.css" rel="stylesheet">

    <!--script-->
    <script type="text/javascript">
      function handleSelect(elm){
        window.location = "semas2.html";
      }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

    <!--Image-->
    <link rel="shortcut icon" href="../images/UILogo.png">
</head>
<!--/head-->

<!--Body-->
<body>
    <!--NavBar-->
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
                        <li><a href="../index.html">BERANDA</a></li>
                        <?php
                        if(isset($_SESSION['isUserLogin'])){
                            echo
                        "<li class="dropdown"><a href='#''>Informasi SIRIMA <i class='fa fa-angle-down'></i></a>
                            <ul role='menu' class='sub-menu'>
                                <li class='active'><a href='semas1.php'>Buat Pendaftaran
                                </a></li>
                                <li><a href='../lihat/riwayatdaftar.php'>Riwayat Pendaftaran
                                </a></li>
                                <li><a href='../lihat/kartuujian.php'>Kartu Ujian
                                </a></li>
                                <li><a href='../lihat/hasilseleksi.php'>Hasil Seleksi
                                </a></li>
                            </ul>
                        </li>    
                        <li><a href='../logout.php'>LOGOUT</a></li> "}?>                 
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--Navbar-->

    <!--Content-->
    <section id="home-slider">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active">Pilih Jenjang</a></li>
          </ol>
        </div>
        <div class="container">
            <h1>Form Pemilihan Jenjang untuk Pendaftaran</h1>
            <form class="col s12">
                <div class="form-group">
                    <label id="jenissma">Jenjang</label>
                    <select class="form-control" id="jenjang" onchange="javascript:handleSelect(this)">
                        <option value="" disabled selected>Pilih Jenjang</option>
                        <option value="semas2.php">Sarjana s1</option>
                        <option>Pascasarjana S2</option>
                        <option>Pascasarjana S3</option>
                    </select>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Simpan</button>
                </div>
            </form>
        </div>

        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--Content-->

    <!--Footer-->
    <div class="row">
        <div class="col-sm-12">
            <div class="copyright-text text-center">
                <p>&copy; Universitas Inovasi 2017. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <!--Footer--> 
</body>
</html>
<!--/HTML-->
