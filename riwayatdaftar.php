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
        <title>Riwayat Pendaftaran</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet"> 
        <link href="css/animate.min.css" rel="stylesheet"> 
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">   
        <link href="css/riwayatdaftar.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" href="images/UILogo.png">
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
                        
                        <a class="navbar-brand" " href="index.php">
                            <img src="images/Universitas Inovasi-01.png" id="LogoUIRD" alt="Universitas Inovasi">
                        </a>                   
                    </div>
                    <div class="collapse navbar-collapse">
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
        <!--/#header-->

        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                 <div class="container">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title">Riwayat Pendaftaran</h1>
                                <p class="nama-pelamar" >Nama Lengkap : <?php echo $_SESSION['nama'] ?></p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
       </section>
        <!--/#page-breadcrumb-->
        <div class="container">
          <div class="table-responsive">          
            <table class="table">
              <thead>
                <tr>
                  <th>Id Pendaftaran</th>
                  <th>Nomor Periode</th>
                  <th>Tahun Periode</th>
                  <th>No Kartu Ujian</th>
                  <th>Jalur</th>
                  <th>Prodi 1</th>
                  <th>Prodi 2</th>
                  <th>Prodi 3</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a data-toggle="modal" data-target="#myModalUUI">5678</a></td>
                  <td>3</td>
                  <td>2017</td>
                  <td>KOSONG</td>
                  <td>UUI</td>
                  <td>S1 Fisika Reguler</td>
                  <td>S1 Biologi Reguler</td>
                  <td>KOSONG</td>
                </tr>
                 <tr>
                  <td><a data-toggle="modal" data-target="#myModalSEMASPASCA">5193</a></td>
                  <td>3</td>
                  <td>2017</td>
                  <td>1234512348</td>
                  <td>SEMAS PASCASARJANA</td>
                  <td>S3 Ilmu Hukum Reguler</td>
                  <td>KOSONG</td>
                  <td>KOSONG</td>
                </tr>
                 <tr>
                  <td><a data-toggle="modal" data-target="#myModalSEMASSRJN">1234</a></td>
                  <td>3</td>
                  <td>2017</td>
                  <td>1234512345</td>
                  <td>SEMAS SARJANA</td>
                  <td>S1 Ilmu Komputer</td>
                  <td>S1 Biologi Reguler</td>
                  <td>S1 Fisika Reguler</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--PAGINATION-->
        <div class="pagination">
          <ul class="pagination">
            <br>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <br>
          </ul>
        </div>
        <!-- Modal content UUI-->
        <div class="modal fade" id="myModalUUI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id = 'modaltitle'>Detail Pendaftaran UUI</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped" id="tblGrid">
                </table>
                <button id="back-button" type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal content SEMAS SARJANA-->
        <div class="modal fade" id="myModalSEMASSRJN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id = 'modaltitle'>Detail Pendaftaran SEMAS SARJANA</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped" id="tblGrid">
                </table>
                <button id="back-button" type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal content SEMAS PASCASARJANA-->
        <div class="modal fade" id="myModalSEMASPASCA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id = 'modaltitle'>Detail Pendaftaran SEMAS PASCASARJANA</h4>
                </div>
                <div class="modal-body">
                  <table class="table table-striped" id="tblGrid">
                  </table>
                  <button id="back-button" type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back</button>
                </div>
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
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>  
<!--     <script type="text/javascript" src="js/homejs.js"></script>  -->
    <script type="text/javascript">
        $(document).ready(function(){
          $("#sirima").addClass("active");
          var url = './riwayatPendaftaranFunc.php';
          $.ajax({
            type: "POST",
            url: url,
            success: function(data){
              console.log(data);
            }
          });
        });
    </script>
    </body>
</html>