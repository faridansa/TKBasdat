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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

    <!--Image-->
    <link rel="shortcut icon" href="../images/UILogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="index.php">Tentang Kami</a></li>  
                        <?php 
                          if (isset($_SESSION['isUserLogin'])) {
                            echo "<li class='dropdown'> <a href='#'>Informasi SIRIMA <i class='fa fa-angle-down'></i></a> 
                            <ul role='menu' class='sub-menu'>
                            <li> <a href= 'link-buat-pendaftaran'>Buat Pendaftaran</a> </li>
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
                        <option value="semas2.php">Sarjana S1</option><!--dibenerin pas php-->
                        <option>Pascasarjana S2</option>
                        <option>Pascasarjana S3</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <div class="row">
        <div class="col-sm-12">
            <div class="copyright-text text-center">
                <p>&copy; Universitas Inovasi 2017. All Rights Reserved.</p>
            </div>
        </div>
    </div>
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
      </footer>
      <!--/#footer-->
    
</body>
</html>
