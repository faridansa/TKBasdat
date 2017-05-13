<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
        if(!$conn){
             die("Connection failed");
        }
        return $conn;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="Page6.css" rel="stylesheet">
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
        <link href="css/riwayatdaftar.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        
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
                          <li><a href="shortcodes.html">Tentang Kami</a></li>                  
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
                                <p class="nama-pelamar" >Nama Lengkap : Grace Angelica</p>
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
        <!-- Modal content (diambil dari w3schools)-->
        <div class="modal fade" id="myModalUUI" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id = 'modaltitle'>Detail Pendaftaran UUI</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped" id="tblGrid">
                    <thead id="tblHead">
                      <tr>
                        <th>Data</th>
                        <th>Pelamar</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Id Pendaftaran : </td>
                          <td>5678</td>
                        </tr>
                        <tr>
                          <td>Periode : </td>
                          <td>3-2017</td>
                        </tr>
                        <tr>
                          <td>Rapot : </td>
                          <td>rapot_123.pdf</td>
                        </tr>
                        <tr>
                          <td>Surat Rekomendasi : </td>
                          <td>rekomendasi_123.pdf</td>
                        </tr>
                        <tr>
                          <td>Asal Sekolah : </td>
                          <td>SMA 2 Depok</td>
                        </tr>
                        <tr>
                          <td>Jenis SMA : </td>
                          <td>IPA</td>
                        </tr>
                        <tr>
                          <td>Alamat Sekolah : </td>
                          <td>Jl. Veteran 15, Depok</td>
                        </tr>
                        <tr>
                          <td>NISN : </td>
                          <td>9923453456</td>
                        </tr>
                        <tr>
                          <td>Tanggal Lulus : </td>
                          <td>2 December 2015</td>
                        </tr>
                        <tr>
                          <td>Nilai UAN  : </td>
                          <td>38.75</td>
                        </tr>
                        <tr>
                          <td>Prodi Pilihan 1 : </td>
                          <td>S1 Ilmu Komputer Reguler</td>
                        </tr>
                        <tr>
                          <td>Prodi pilihan 2 : </td>
                          <td>S1 Biologi Reguler</td>
                        </tr>
                      </tbody>
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
                    <thead id="tblHead">
                      <tr>
                        <th>Data</th>
                        <th>Pelamar</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Id Pendaftaran : </td>
                          <td>1234</td>
                        </tr>
                        <tr>
                          <td>Periode : </td>
                          <td>3-2017</td>
                        </tr>
                        <tr>
                          <td>No Kartu Ujian : </td>
                          <td>1234512345</td>
                        </tr>
                        <tr>
                          <td>Asal Sekolah : </td>
                          <td>SMA 2 Depok</td>
                        </tr>
                        <tr>
                          <td>Jenis SMA : </td>
                          <td>IPA</td>
                        </tr>
                        <tr>
                          <td>Alamat Sekolah : </td>
                          <td>Jl. Veteran 15, Depok</td>
                        </tr>
                        <tr>
                          <td>NISN : </td>
                          <td>9923453456</td>
                        </tr>
                        <tr>
                          <td>Tanggal Lulus : </td>
                          <td>2 December 2015</td>
                        </tr>
                        <tr>
                          <td>Nilai UAN  : </td>
                          <td>38.75</td>
                        </tr>
                        <tr>
                          <td>Prodi Pilihan 1 : </td>
                          <td>S1 Ilmu Komputer Reguler</td>
                        </tr>
                        <tr>
                          <td>Prodi pilihan 2 : </td>
                          <td>S1 Biologi Reguler</td>
                        </tr>
                        <tr>
                          <td>Prodi pilihan 3 : </td>
                          <td>S1 Fisika Reguler</td>
                        </tr>
                        <tr>
                          <td>Lokasi kota ujian : </td>
                          <td>Depok</td>
                        </tr>
                        <tr>
                          <td>Lokasi tempat ujian : </td>
                          <td>Kampus ABC</td>
                        </tr>
                      </tbody>
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
                    <thead id="tblHead">
                      <tr>
                        <th>Data</th>
                        <th>Pelamar</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Id Pendaftaran : </td>
                          <td>5193</td>
                        </tr>
                        <tr>
                          <td>Periode : </td>
                          <td>3-2017</td>
                        </tr>
                        <tr>
                          <td>Jenjang Dipilih : </td>
                          <td>S3</td>
                        </tr>
                        <tr>
                          <td>No Kartu Ujian : </td>
                          <td>1234512345</td>
                        </tr>
                        <tr>
                          <td>Nilai TPA : </td>
                          <td>400</td>
                        </tr>
                        <tr>
                          <td>Nilai TOEFL : </td>
                          <td>550</td>
                        </tr>
                        <tr>
                          <td>Jenjang Terakhir : </td>
                          <td>S2</td>
                        </tr>
                        <tr>
                          <td>Asal Universitas : </td>
                          <td>Kampus XYZ</td>
                        </tr>
                        <tr>
                          <td>Alamat Universitas : </td>
                          <td>Jl. Pertiwi 34, Jakarta</td>
                        </tr>
                        <tr>
                          <td>Prodi Terakhir : </td>
                          <td>Ilmu Hukum</td>
                        </tr>
                        <tr>
                          <td>Nilai IPK  : </td>
                          <td>3.86</td>
                        </tr>
                        <tr>
                          <td>Tanggal Lulus  : </td>
                          <td>2 Desember 2015</td>
                        </tr>
                        <tr>
                          <td>Prodi Pilihan : </td>
                          <td>S3 Ilmu Hukum Reguler</td>
                        </tr>
                        <tr>
                          <td>Nama Rekomender : </td>
                          <td>Setyawati</td>
                        </tr>
                        <tr>
                          <td>Nama Rekomender : </td>
                          <td>Setyawati</td>
                        </tr>
                        <tr>
                          <td>Proposal penelitian : </td>
                          <td>proposal_1.pdf</td>
                        </tr>
                        <tr>
                          <td>Lokasi kota ujian : </td>
                          <td>Depok</td>
                        </tr>
                        <tr>
                          <td>Lokasi tempat ujian : </td>
                          <td>Kampus ABC</td>
                        </tr>
                      </tbody>
                  </table>
                  <button id="back-button" type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back</button>
                </div>
            </div>
          </div>
        </div>
      <!--#action-->
      <section id="action" class="responsive">
          <div class="vertical-center">
              <div class="container">
                  <div class="row">
                      <div class="action take-tour">
                          <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Tahap Selanjutnya</h1>
                            <p>Anda akan mendapatkan kartu ujian setelah melakukan pembayaran</p>
                          </div>
                          <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                              <a href="kartuujian.html" class="btn btn-common">PEMBAYARAN</a>
                            </div>
                          </div>
                      </div>
                </div>
          </div>
      </div>
        </section>
        <!--/#action-->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
    <script type="text/javascript" src="js/homejs.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
          $("#sirima").addClass("active");
        });
    </script>
    </body>
</html>
