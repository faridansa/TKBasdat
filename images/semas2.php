<?php
    session_start();
    if(!isset($_SESSION['isUserLogin'])) {
      header("Location: login.php");    
    } 

    function connectDB() {
        $conn = pg_connect("
            host=localhost 
            port=5432 
            dbname=dbfirda 
            user=postgres");
        
        if (!$conn) {
            $res1 = pg_get_result($conn);
            die("Connection failed: " + pg_result_error($res1));
        }
        return $conn;
    }
       
    //constraint form


    
    $sql = "INSERT INTO PENDAFTARAN_SEMAS_SARJANA(id_pendaftaran, asal_sekolah, jenis_sma, alamat_sekolah, nisn, tgl_lulus, nilai_uan) VALUES ();";
    $sql1 = "INSERT INTO PENDAFTARAN_SEMAS(id_pendaftaran, status, hadir, nilai_ujian, no_kartu_ujian, lokasi_kota, lokasi_tempat) VALUES ();";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIRIMA | Form Pendaftaran Semas Sarjana </title>

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
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
 
    <link rel="shortcut icon" href="../images/UILogo.png">  

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
                        <h1><img src="images/uikecil.png" id="LogoUI" alt="logo"></h1>
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul id="ul-nav-bar" class="nav navbar-nav navbar-right">
                        <li><a href="../index.html">Beranda</a></li>
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
    <!--/#header-->

    <section id="home-slider">
        <div class="container">              
          <ol class="breadcrumb">
            <li><a href="semas1.php">Pilih Jenjang</a></li>
            <li class="active">Form Pendaftaran</li>        
          </ol>
        </div>

        <div class="container">
            <h1>Form Pendafataran Semas Sarjana S1</h1>
            <form class="col s12">
                <div class="input-field col s8">
                    <label>Asal Sekolah</label>
                    <input type="text" class="validate" required="required" value="<?php echo $asalsekolah;?>">
                </div>
                <div class="form-group">
                    <label id="jenissma">Jenis SMA</label>
                    <select class="form-control" required="required">
                        <option value="" disabled selected>Pilih Jenis SMA</option>
                        <option>IPA</option>
                        <option>IPS</option>
                        <option>Bahasa</option>
                    </select>
                </div>
                <div class="input-field col s8">
                    <label>Alamat Sekolah</label>
                    <input type="text" class="validate" required="required" value="<?php echo $alamatSekolah;?>">
                </div>
                <div class="input-field col s8">
                    <label>NISN</label>
                    <input type="text" class="validate" required="required" value="<?php echo $nisn;?>">
                </div>
                <div class="input-field col s8">
                    <label>Tanggal Lulus</label>
                    <div id="datetimepicker" class="input-append">
                        <input type="date" required="required" value="<?php echo $datelulus;?>"></input>
                    </div>
                </div>
                <div class="input-field col s8">
                    <label>Nilai UAN</label>
                    <input type="text" class="validate" required="required" value="<?php echo $nilaiuan?>">
                </div>
                <div class="form-group">
                    <label id="prodi1">Prodi Pilihan 1</label>
                    <select class="form-control" required="required">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option disabled>Kelas Reguler</option>
                        <option>Kedokteran</option>
                        <option>Matermatika</option>
                        <option>Teknik Sipil</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Paralel</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Internasional</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label id="prodi2">Prodi Pilihan 2</label>
                    <select class="form-control">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option disabled>Kelas Reguler</option>
                        <option>Kedokteran</option>
                        <option>Matematika</option>
                        <option>Teknik Sipil</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Paralel</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Internasional</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                    </select>
                    <span>Prodi pilihan 2 tidak boleh sama dengan prodi pilihan 1 atau 3</span>
                </div>
                <div class="form-group">
                    <label id="prodi3">Prodi Pilihan 3</label>
                    <select class="form-control">
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option disabled>Kelas Reguler</option>
                        <option>Kedokteran</option>
                        <option>Matermatika</option>
                        <option>Teknik Sipil</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Paralel</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                        <option disabled>Kelas Internasional</option>
                        <option>Kedokteran</option>
                        <option>Biologi</option>
                        <option>Teknik Industri</option>
                        <option>Ilmu Komputer</option>
                    </select>
                    <span>Prodi pilihan 3 tidak boleh sama dengan prodi pilihan 1 atau 2</span>
                </div>
                <div class="form-group">
                    <label id="kotaujian">Lokasi Kota Ujian</label>
                    <select class="form-control" required="required">
                        <option value="" disabled selected>Pilih Kota</option>
                        <option>Jakarta</option>
                        <option>Medan</option>
                        <option>Palembang</option>
                        <option>Padang</option>
                        <option>Makassar</option>
                        <option>Pontianak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label id="tempatujian">Lokasi Tempat Ujian</label>
                    <select class="form-control" required="required">
                        <option value="" disabled selected>Pilih Tempat Ujian</option>
                        <option>Stadion Kuningan</option>
                        <option>SMA 121 Jakarta</option>
                        <!--
                        <option>SMA 919 Medan</option>
                        <option>SMA 10 Palembang</option>
                        <option>SMA 3 Padang</option>
                        <option>Kampus Induk</option>
                        <option>SMA 67 Pontianak</option>-->
                    </select>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action"><a href="semas3.html">Simpan</a></button>
            </form>
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
