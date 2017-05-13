<?php
    session_start();
        function connectDB() {
            $conn = pg_connect("host=localhost port=5432 dbname=noviantialiasih user=postgres password=Apakekgitu1");
            
            if (!$conn) {
                $res1 = pg_get_result($conn);
                die("Connection failed: " + pg_result_error($res1));
            }
            return $conn;
        }

        function funcCheckLogin() {
            $conn = connectDB();
            if (!isset($_SESSION['isLogin']) && !isset($_SESSION['isAdminLogin'])) {
              header("Location: login.php");
            }
            pg_close($conn);
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
  <title>Rekap By Jenjang | SIRIMA</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet"> 
  <link href="css/animate.min.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/lightbox.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script> 
        <script type="text/javascript" src="js/homejs.js"></script>   

        <!--Import materialize.css-->
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
        <script>
        $(document).ready(function() {
          $('select').material_select();
        });
        </script>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
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
                <img src="images/Universitas Inovasi-01.png" width="100px" alt="logo">
              </a>

            </div>
            <div id="navbar" class="collapse navbar-collapse">
                    <ul id = "ul-nav-bar" class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.html">Beranda</a></li>
                        <li><a href="shortcodes.html ">Tentang Kami</a></li> 
                     
                    </ul>
                </div>
            <div class="search">
              <form role="form">
                <i class="fa fa-search"></i>
                <div class="field-toggle">
                  <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                </div>
              </form>
            </div>
          </div>
        </div>
      </header>
      <!--/#header-->

      <section id="page-breadcrumb">
        <div class="vertical-center sun">
         <div class="container">
          <div class="col-sm-12 text-center bottom-separator">
            <h1 class="title">SIRIMA</h1>
            <p>(Form Pemilihan Jenjang)</p>
          </div>
          <img src="images/home/under.png" class="img-responsive inline" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--/#page-breadcrumb-->

  <section id="company-information" class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
      <div class="col-md-3 col-sm-1">     
      </div>
      <div class="col-md-1 col-sm-1">     
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="center-block">
          <div class="row">
            <form class="col s12" action="rekapPendaftaran.php" method="post">
              <div class="row">
               <label>Periode</label>
               <select>
                <option value="" disabled selected>Pilih Periode</option>
                <option value="1">3 - 2017</option>
                <option value="2">2 - 2016</option>
                <option value="3">1 - 2015</option>
              </select>               
            </div>
            <div class="row">
             <label>Jenjang</label>
             <select>
              <option value="" disabled selected>Pilih Prodi</option>
              <option value="" disabled selected>Pilih Jenjang</option>
              <option value="1">S1</option>
              <option value="2">S2</option>
              <option value="3">S3</option>
            </select>               
            <div class="center-align">
              <button class="btn btn-submit btn-logint" type="submit" name="submit">Pilih</button>
            </div>
          </form>       
        </div>
      </div>      
    </div>
  </section>
</body>
</html>
