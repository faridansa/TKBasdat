<?php
    session_start();
    //session_destroy();
   if(isset($_SESSION['id-pendaftaran'])){
            echo '
            <script type="text/javascript">
                $("#myModal").modal();
            </script>
            ';
        }

    function connectDB(){
        $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
        if(!$conn){
             die("Error connectiion test :".pg_last_error());
        }
        return $conn;
    }

    function lihatKartuUjian($idPendaftaran) {
        $connect = connectDB();
        $command = "SELECT PD.id, P.nama_lengkap, PS.no_kartu_ujian, PS.lokasi_tempat, PS.lokasi_kota, JP.waktu_mulai, JP.waktu_selesai FROM sirima.PENDAFTARAN_SEMAS AS PS, sirima.PELAMAR AS P, sirima.PENDAFTARAN AS PD, sirima.JADWAL_PENTING AS JP, sirima.PENDAFTARAN_PRODI AS PP, sirima.PROGRAM_STUDI AS PR WHERE PD.id = PS.id_pendaftaran AND PD.pelamar = P.username AND PD.nomor_periode = JP.nomor AND PD.tahun_periode = JP.tahun AND PD.id = '$idPendaftaran' AND PP.id_pendaftaran = PD.id AND PP.kode_prodi = PR.kode AND JP.jenjang = PR.jenjang AND JP.tahun = PD.tahun_periode AND JP.deskripsi = 'Ujian Saringan Masuk'";
        $result =  pg_query($connect, $command);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }

        pg_close();
        return $result;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['command'] === 'Lihat'){
          $_SESSION['id-pendaftaran'] = $_POST['id-pendaftaran'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
        <link href="Page6.css" rel="stylesheet">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Kartu Ujian</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet"> 
        <link href="css/animate.min.css" rel="stylesheet"> 
        <link href="css/main.css" rel="stylesheet">
        <link href="css/kartuujian.css" rel="stylesheet">
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
                            <img src="images/Universitas Inovasi-01.png" id="LogoUIKU" alt="Universitas Inovasi">
                        </a>                   
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul id="ul-nav-bar" class="nav navbar-nav navbar-right">
                          <li><a href="index.php">Beranda</a></li>
                          <li><a href="shortcodes.html ">Tentang Kami</a></li>                  
                        </ul>
                    </div>
                </div>
            </div>
            <div id="img-navbar" class="col-sm-12 text-center bottom-separator">
                <div class="col-sm-4 title">
                    <h1> Lihat Kartu Ujian</h1>
                </div>
            </div>
        </header>
        <!--/#header-->

        <div class="input-id">
         <div class="form-id">
            <form class="col s12" method="post">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="form-group">
                        <input id="id-pendaftaran" type="id-pendaftaran" name="id-pendaftaran" class="form-control" required="required" placeholder="Id Pendaftaran">
                     </div>
                     <div class="form-group">
                        <input data-toggle="modal" data-target="#myModal" type="submit" id="btn-login" class="btn btn-submit btn-login" value="Lihat" name="command">
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>

     <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id = 'modaltitle'>KARTU UJIAN</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="index.php">
                    <?php
                        if(isset($_SESSION['id-pendaftaran'])){
                            echo $_SESSION['id-pendaftaran'];
                            $result = pg_fetch_row(lihatKartuUjian($_SESSION['id-pendaftaran']));
                            $months = array(1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
                            //waktu mulai
                            $month_start = substr($result[5], 3, 1);
                            $day_start = substr($result[5], 8,-9);
                            $year_start = substr($result[5], 0, -15);
                            $hour_start = substr($result[5], 10, -6);
                            $minute_start = substr($result[5], 13, -3);
                            //waktu selesai
                            $month_end = substr($result[6], 3, 1);
                            $day_end = substr($result[6], 8, 2);
                            $year_end = substr($result[6], 0, 4);
                            $hour_end = substr($result[6], 10,-6);
                            $minute_end = substr($result[5], 13,-3);
                        }
                    ?>
                    <table class="table table-striped" id="tblGrid">
                        <thead id="tblHead">
                          <tr>
                            <th>Data</th>
                            <th>Pelamar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Id Pendaftaran </td>
                            <td><?php echo $result[0]?></td>
                          </tr>
                          <tr>
                            <td>Nama Lengkap </td>
                            <td><?php echo $result[1]?></td>
                          </tr>
                          <tr>
                            <td>Nomor kartu ujian </td>
                            <td><?php echo $result[2]?></td>
                          </tr>
                          <tr>
                            <td>Lokasi Ujian </td>
                            <td><?php echo $result[3].", ".$result[4]?></td>
                          </tr>
                          <tr>
                            <td>Waktu Ujian </td>
                            <!-- <td><?php echo $result[5]." - ".$result[6]?></td> -->
                            <td><?php echo $day_start." ".$months[(int)$month_start]." ".$year_start." ".$hour_start.$minute_start." WIB - ".$day_end." ".$months[(int)$month_end]." ".$year_end." ".$hour_end.$minute_end." WIB"?></td>
                          </tr>
                        </tbody>
                      </table>
                  </form>
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
    </div>
    </div>
    </footer>
    <!--/#footer-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
