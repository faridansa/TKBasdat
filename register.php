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

        function register() {
            echo "hoihoio";
            $conn = connectDB();

            $nama = $_POST['fullname'];

            $_SESSION['nama'] = $nama;
            $_SESSION['isUserLogin'] = 'true';
            $_SESSION['isLogin'] = 'true';
            header("Location: index.php");

            pg_close($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['command'] === 'register') {
                echo "string";
                register();
            } 
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIRIMA UI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/UILogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <!-- <div id="for-alert" align="center">
    </div> -->
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <!-- <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>  -->
                </div>
             </div>
        </div>
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
                        <img src="images/ui02.png" id="LogoUI" alt="logo">
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul id = "ul-nav-bar" class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Beranda</a></li>
                        <li><a href="index.php">Tentang Kami</a></li>                    
                    </ul>
                </div>
                <!-- <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </header>
    <!--/#header-->
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                <h1>Daftar Akun</h1>
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-3 col-sm-1">     
                </div>
                <div class="col-md-1 col-sm-1">     
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-form center">
                        <form role="form-horizontal" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class=" control-label">Username</label>
                                <input id="username" type="username" name="username" class="form-control" required="required" placeholder="Username">
                                <span class="help-block">Username hanya terdiri dari huruf atau angka dan boleh menggunakan tanda titik (.)</span>
                            </div>
                           <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required="required" >
                                <span class="help-block">Minimal 6 karakter, case sensitive (A berbeda dengan a)</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Konfirmasi Password</label>
                                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Password" class="form-control" required="required" >
                                <span class="help-block">Minimal 6 karakter, case sensitive (A berbeda dengan a)</span>
                            </div>
                            <div class="form-group">
                                <label for="fullName" class="control-label">Nama Lengkap</label>
                                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required="required" >
                                <span class="help-block">Sesuai kartu identitas (KTP)</span>
                            </div>
                            <div class="form-group">
                                <label for="idNumber" class="control-label">Nomor Identitas (KTP)</label>
                                <input type="text" id="idnumber" name="idnumber" placeholder="Nomor Identitas (KTP)" class="form-control" required="required" >
                                <span class="help-block">Sesuai kartu identitas (KTP)</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label ">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="radio-inline">
                                                <input type="radio" name ="gender" id="gender" value="Laki-laki" required="required">Laki-laki
                                            </label>
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="radio-inline">
                                                <input type="radio" name ="gender"  id="gender" value="Perempuan">Perempuan
                                            </label>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="birthDate" class="control-label">Tanggal Lahir</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control" required="required" >
                                <span class="help-block">Bulan/Hari/Tahun</span>
                            </div>
                            <div class="form-group">
                                <label for="address" class=" control-label">Alamat</label>
                                <input type="text" id="address" name="address" placeholder="Alamat" class="form-control" required="required" >
                                <span class="help-block">Alamat tempat tinggal saat ini</span>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" control-label">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control" required="required" >
                                <span class="help-block">Alamat email yang digunakan</span>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" control-label">Konfirmasi Email</label>
                                <input type="email" name="confirmemail" id="confirmemail" placeholder="Email" class="form-control" required="required" >
                                <span class="help-block">Alamat email yang digunakan</span>
                            </div>                      
                            <div class="form-group">
                                <input id = "insert-command" type="hidden" name="command" value="register">
                                <input type="button" id="register-btn" class="btn btn-submit btn-login" value="Buat Akun">
                                <input id="submit_handle" type="submit" style="display: none">
                            </div>
                        </form>
                    </div>
                </div>
        </section>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/reg.js"></script>   
</body>
</html>
