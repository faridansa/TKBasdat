<?php
    session_start();
    if(!isset($_SESSION['isUserLogin'])) {
      header("Location: login.php");    
    } 

    function connectDB() {
        $conn = pg_connect("host=localhost port=5432 dbname=a204 user=postgres");
        
        if (!$conn) {
            $err = pg_get_result($conn);
            die("Connection failed: " + pg_result_error($err));
        }
        return $conn;
    }
       
    //constraint form
    function register(){
        $conn = connectDB();

        if(isset($_POST['asalsekolah'])){
            $asalsekolah = $_POST['asalsekolah'];
        }else{
            $sekolahErr = "Asal sekolah belum diisi"; 
        }

        if(isset($_POST['jenissma'])){
            $jenissma = $_POST['jenissma'];
        }else{
            $jenisErr = "Jenis SMA belum dipilih";
        }

        if(isset($_POST['alamatSekolah'])){
            $alamatSekolah = $_POST['alamatSekolah'];
        }else{
            $alamatErr = "Alamat Sekolah belum diisi";
        }

        if(isset($_POST['nisn'])){
            $nisn = $_POST['nisn'];
            $regex1 = "/[\d]{10}/";
            if(!preg_match($regex1, $nisn)){
                $nisnErr = "Nomor NISN tidak sesuai";
            }
        }else{
            $nisnErr = "Nomor NISN belum diisi"
        }

        if(isset($_POST['datelulus'])){
            $datelulus = $_POST['datelulus'];
        }else{
            $dateErr = "Tanggal lulus belum pilih";
        }

        if(isset($_POST['nilaiuan'])){
            $nilaiuan = $_POST['nilaiuan'];
            $regex2 = "[0-9]+(\.[0-9][0-9]?)?";
            if(!preg_match($regex2, $nilaiuan)){
                $uanErr = "Nilai tidak sesuai. 2 digit dibelakang koma";
            }
        }else{
            $uanErr = "Nilai UAN belum diisi";
        }

        if(isset($_POST['prodi1'])){
            $prodi1 = $_POST['prodi1'];
        }else{
            $prodi1Err = "Prodi belum dipilih";
        }

        if(isset($_POST['prodi2'])){
            $prodi1 = $_POST['prodi1'];
            $prodi2 = $_POST['prodi2'];
            $prodi3 = $_POST['prodi3'];
            if($prodi1 == $prodi2 || $prodi2 == $prodi3)){
                $prodi2Err = "Prodi " $prodi2 "sudah dipilih";
            }
        }
        
        if(isset($_POST['prodi3'])){
            $prodi1 = $_POST['prodi1'];
            $prodi2 = $_POST['prodi2'];
            $prodi3 = $_POST['prodi3'];
            if($prodi1 == $prodi3 || $prodi2 == $prodi3)){
                $prodi3Err = "Prodi " $prodi3 "sudah dipilih";
            }
        }

        //calling all error
        if(isset($sekolahErr)){
            $_SESSION['sekolahErr'] = $sekolahErr;
        }
        if(isset($jenisErr)){
            $_SESSION['jenisErr'] = $jenisErr;
        }
        if(isset($alamatErr)){
            $_SESSION['alamatErr'] = $alamatErr;
        }
        if(isset($nisnErr)){
            $_SESSION['nisnErr'] = $nisnErr;
        }
        if(isset($dateErr)){
            $_SESSION['dateErr'] = $dateErr;
        }
        if(isset($uanErr)){
            $_SESSION['uanErr'] = $uanErr;
        }
        if(isset($pro)){
            $_SESSION['dateErr'] = $dateErr;
        }
        

        if($conn && !isset($sekolahErr) && !isset($jenisErr) && !isset($alamatErr) && !isset($nisnErr) && !isset($dateErr) && !isset($uanErr) && !isset($prodi1Err) && !isset($prodi2Err) && !isset($prodi3Err)){

            set 
        }
    }

    //sql
    $set = "SET search_path to SIRIMA"
    $getuser = "SELECT username FROM PELAMAR"
    $sql1 = "SELECT id FROM PENDAFTARAN ORDER BY id_pendaftaran DESC LIMIT 1;";
    $sql2 = "INSERT INTO PENDAFTARAN (id, status_lulus, status_verifikasi, npm, pelamar, nomor_periode, tahun_periode) VALUES ($sql1+1, null, null);";
    $sql3 = "INSERT INTO PENDAFTARAN_SEMAS(id_pendaftaran, status_hadir, nilai_ujian, no_kartu_ujian, lokasi_kota, lokasi_tempat) VALUES ($sql1, null, null, null, $kotaujian, $tempatujian);";
    $sql4 = "INSERT INTO PENDAFTARAN_SEMAS_SARJANA(id_pendaftaran, asal_sekolah, jenis_sma, alamat_sekolah, nisn, tgl_lulus, nilai_uan) VALUES ($sql1, $asalsekolah, $jenissma, $alamatSekolah, $nisn, $datelulus, $nilaiuan);";

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
                    <input type="text" class="validate" required="required">
                    <?php
                        if(isset($_SESSION['sekolahErr'])){
                            echo "<div style = 'color:red' id=sekolahErr>".$_SESSION['sekolahErr']."</div>";
                            unset($_SESSION['sekolahErr']);
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label id="jenissma">Jenis SMA</label>
                    <select class="form-control" required="required">
                        <option value="" disabled selected>Pilih Jenis SMA</option>
                        <option>IPA</option>
                        <option>IPS</option>
                        <option>Bahasa</option>
                    </select>
                    <?php
                        if(isset($_SESSION['jenisErr'])){
                            echo "<div style = 'color:red' id=jenisErr>".$_SESSION['jenisErr']."</div>";
                            unset($_SESSION['jenisErr']);
                        }
                    ?>
                </div>
                <div class="input-field col s8">
                    <label>Alamat Sekolah</label>
                    <input type="text" class="validate" required="required" value="<?php echo $alamatSekolah;?>">
                    <?php
                        if(isset($_SESSION['alamatErra'])){
                            echo "<div style = 'color:red' id=alamatErr>".$_SESSION['alamatErr']."</div>";
                            unset($_SESSION['alamatErr']);
                        }
                    ?>
                </div>
                <div class="input-field col s8">
                    <label>NISN</label>
                    <input type="text" class="validate" required="required" value="<?php echo $nisn;?>">
                    <?php
                        if(isset($_SESSION['nisnErr'])){
                            echo "<div style = 'color:red' id=nisnErr>".$_SESSION['nisnErr']."</div>";
                            unset($_SESSION['nisnErr']);
                        }
                    ?>
                </div>
                <div class="input-field col s8">
                    <label>Tanggal Lulus</label>
                    <div id="datetimepicker" class="input-append">
                        <input type="date" required="required" value="<?php echo $datelulus;?>"></input>
                        <?php
                        if(isset($_SESSION['dateErr'])){
                            echo "<div style = 'color:red' id=dateErr>".$_SESSION['dateErr']."</div>";
                            unset($_SESSION['dateErr']);
                        }
                    ?>
                    </div>
                </div>
                <div class="input-field col s8">
                    <label>Nilai UAN</label>
                    <input type="text" class="validate" required="required" value="<?php echo $nilaiuan?>">
                    <?php
                        if(isset($_SESSION['uanErr'])){
                            echo "<div style = 'color:red' id=uanErr>".$_SESSION['uanErr']."</div>";
                            unset($_SESSION['uanErr']);
                        }
                    ?>
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
