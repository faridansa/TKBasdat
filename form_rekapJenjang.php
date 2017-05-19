<?php
  session_start();
  function funcCheckLogin() {
    $conn = connect();
    if (!isset($_SESSION['isLogin']) && !isset($_SESSION['isAdminLogin'])) {
      header("Location: login.php");
    }
    pg_close($conn);
  }

  funcCheckLogin();

  function connect() {
    $conn = "host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1";
          // Create connection
    $db = pg_connect($conn);

          // Check connection
    if(!$db) {
      echo "Error : Unable to open database\n";
    }
    return $db;
  }

  function selectOptionQuery($type) {
    $db = connect();
    if ($type == "periode") {
      $sql = "SELECT DISTINCT nomor_periode, tahun_periode
              FROM SIRIMA.PENERIMAAN_PRODI
              ORDER BY nomor_periode DESC";
    } 
    else {
      $sql = "SELECT DISTINCT jenjang
              FROM SIRIMA.PENERIMAAN_PRODI LEFT OUTER JOIN SIRIMA.PROGRAM_STUDI
              ON kode_prodi = kode
              ORDER BY jenjang ASC";
    }

    $result = pg_query($db, $sql);
    if(!$result) {
      die("Error in SQL query: " . pg_last_error());
    } 

    while($row = pg_fetch_row($result)) {
      if ($type == "periode") {
        echo "
          <option value='".$row[0]." - ".$row[1]."'>".$row[0]." - ".$row[1]."</option>
        ";
      } else {
        echo "
          <option value='".$row[0]."'>".$row[0]."</option>
        ";
      }
    }
    pg_close($db);
  }
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

          <a class="navbar-brand" href="index.php">
            <img src="images/Universitas Inovasi-01.png" width="100px" alt="logo">
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
              <li> <a href= 'link-buat-pendaftaran'>Buat Pendaftaran</a> </li>
              <li> <a href= 'riwayatdaftar.html'>Riwayat Pendaftaran</a></li>
              <li> <a href= 'kartuujian.html'>Kartu Ujian</a> </li>
              <li> <a href= 'hasilseleksi.html'>Hasil Seleksi</a> </li>
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
              <select name="periode" required="required">
                <option value="" disabled selected>Pilih Periode</option>
                <?php 
                  selectOptionQuery(periode);
                ?>
              </select>               
            </div>
            <div class="row">
              <label>Jenjang</label>
              <select name="jenjang" required="required">
                <option value="" disabled selected>Pilih Jenjang</option>
                <?php 
                  selectOptionQuery(jenjang);
                ?>
              </select>               
              <div class="center-align">
                <input id = "insert-command" type="hidden" name="command" value="formRekap">
                <button class="btn btn-submit btn-logint" type="submit" name="submit">Pilih</button>
              </div>
            </form>       
          </div>
        </div>      
      </div>
    </section>
  </body>
  </html>