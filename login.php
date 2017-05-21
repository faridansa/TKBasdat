<?php
    session_start();
        function connectDB() {
            $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
            //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
            
            if (!$conn) {
                $res1 = pg_get_result($conn);
                die("Connection failed: " + pg_result_error($res1));
            }
            return $conn;
        }

        function funcLogin() {
            $conn = connectDB();
            $username = $_POST['username'];
            $password = $_POST['key'];
            
            $set = "SET search_path to sirima";
            $res = pg_query($conn, $set);
            $sql1 = "SELECT username, password FROM AKUN WHERE role = true";
            $result1 = pg_query($conn, $sql1);

            $sql2 = "SELECT a.username, a.password, b.nama_lengkap FROM AKUN a, PELAMAR b WHERE a.username = b.username AND a.role = false";
            $result2 = pg_query($conn, $sql2);

            if(!$result1) {
                die("Error: $sql1");
            }

            if(!$result2) {
                die("Error: $sql2");
            }
            
            $login = false;

            $resultArr1 = pg_fetch_all($result1);            
            
            foreach ($resultArr1 as $d) {
                if($d['username'] == $username && $d['password'] == $password) {
                    $_SESSION['isAdminLogin'] = 'true';
                    $_SESSION['isLogin'] = 'true';
                    header("Location: index.php");
                    $login = true;
                }
            }
            
            $resultArr2 = pg_fetch_all($result2);

            foreach ($resultArr2 as $d) {
                if($d['username'] == $username && $d['password'] == $password) {
                    $nama = $d['nama_lengkap'];
                    $_SESSION['nama'] = $nama;
                    $_SESSION['isUserLogin'] = 'true';
                    $_SESSION['isLogin'] = 'true';
                    header("Location: index.php");
                    $login = true;
                }
            }

            if($login === false) {
                $_SESSION['failed-login'] = "true";
            }

            pg_close($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'login') {
            funcLogin();
            $_SESSION['isCalled'] = "true";
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
     
    <link rel="shortcut icon" href="images/UILogo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
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
                        <li><a href="index.php ">Tentang Kami</a></li>                    
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                <h1>Masuk Akun</h1>
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-3 col-sm-1">     
                </div>
                <div class="col-md-1 col-sm-1">     
                </div>
                <div class="col-md-4 col-sm-6">
                <div id="for-alert" align="center">
                <?php 
                   if (!isset($_SESSION['isLogin']) && isset($_SESSION['failed-login']) ) {
                        echo "<div><div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><p>Username atau password salah</p></div></div>";
                        unset($_SESSION['failed-login']);
                    }
                 ?>
                    <div class="contact-form center">
                        <form role="form" action="#" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <input id="username" type="username" name="username" class="form-control" required="required" placeholder="username">
                            </div>
                            <div class="form-group">
                                <input id = "key" type="password" name="key" class="form-control" required="required" placeholder="password">
                            </div>                       
                            <div class="form-group">
                                <input id = "insert-command" type="hidden" name="command" value="login">
                                <input type="submit" name="submit" id="btn-login" class="btn btn-submit btn-login" value="Masuk">
                            </div>
                        </form>
                    </div>
                </div>
        </section>

            <div class="row">
                    <div class="col-xs-12 text-center">
                        <p>Belum punya akun?</p><a href="register.php"><strong>Daftar sekarang</strong></a></p>
                    </div>
                </div>
            </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>
