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

    function displayTable() {
      $db = connect();
      $periode = explode(" - ",$_POST['periode']);
      $nomor = $periode[0];
      $tahun = $periode[1];
      $jenjang = $_POST['jenjang'];

      $sql ="SELECT nama as nama_prodi, jenis_kelas, nama_fakultas, kuota, jumlah_pelamar, jumlah_diterima
            FROM SIRIMA.PENERIMAAN_PRODI LEFT OUTER JOIN SIRIMA.PROGRAM_STUDI
            ON kode_prodi = kode
            WHERE (nomor_periode = '$nomor') AND (tahun_periode = '$tahun') AND (jenjang = '$jenjang')
            ORDER BY nama ASC";

      $result = pg_query($db, $sql);
      if(!$result) {
        die("Error in SQL query: " . pg_last_error());
      } 

      if (pg_num_rows($result) > 0) {
        echo "
          <table class='responsive-table' id='table_id'>
            <thead>
             <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Jenis Kelas</th>
                <th>Nama Fakultas</th>
                <th>Kuota</th>
                <th>Jumlah Pelamar</th>
                <th>Jumlah Diterima</th>
             </tr>
            </thead>
            <tbody>
        ";
      }
      // output data result row
      $i = 1;
      while($row = pg_fetch_row($result)) {
        echo "
          <tr>
            <td>".$i."</td>
            <td>".$row[0]."</td>
            <td>".$row[1]."</td>
            <td>".$row[2]."</td>
            <td>".$row[3]."</td>
            <td>".$row[4]."</td>
            <td>".$row[5]."</td>
          </tr>
        ";
        $i++;
      }
      echo "
          </tbody>
        </table>
      ";

    pg_close($db);
    }

    function getDetail(){
        $jenjang = $_POST['jenjang'];
        $periode = explode(" - ",$_POST['periode']);
        $tahun = $periode[1];
        echo $jenjang.' tahun periode '.$tahun;
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rekap Pendaftaran | SIRIMA</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

        <link rel="shortcut icon" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="src/css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="src/js/materialize.min.js"></script>
        <script type="text/javascript" src="src/js/my_javascript.js"></script>
        

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
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
                    <h1>Rekap Pendaftaran</h1>
                    <p>Jenjang : <?php getDetail(); ?></p>
                </div>
             <!-- <img src="images/home/under.png" class="img-responsive inline" alt=""> -->
        </div>
    </div>
</div>
</section>
<!--/#page-breadcrumb-->

<section id="company-information" class="padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <?php
          displayTable();
        ?>
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
    <script type="text/javascript" src="js/myTable.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
</body>
</html>