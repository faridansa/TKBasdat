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
            $conn = connectDB();

            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $regex1 = "/[0-9a-zA-Z\.]{2,20}/";
                if(!preg_match($regex1, $username)){
                    $error1 = "Username tidak sesuai ketentuan";
                } 
            } else {
                $error1 = "Username harus diisi";
            }

            if (isset($_POST['fullname'])) {
                $name = $_POST['fullname'];
                $regex2 = "/[\A-Za-z]/";
                if(!preg_match($regex2, $name)){
                    $error2 = "Nama lengkap tidak sesuai ketentuan";
                } 
            } else {
                $error2 = "Nama lengkap harus diisi";
            }

            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $regex3 = "/.{6,}/";
                if(!preg_match($regex3, $password)) {
                    $error3 = "Password tidak sesuai ketentuan";
                }
            } else {
                $error3 = "Password harus diisi";
            }

            if (isset($_POST['confirmpassword'])) {
                $confirmpass = $_POST['confirmpassword'];
                if($confirmpass !== $password) {
                    $error4 = "Password tidak sama";
                }
            } else {
                $error4 = "Password harus diisi";
            }

            if (isset($_POST['idnumber'])) {
                $idn = $_POST['idnumber'];
                $regex4 = "/[\d]{16}/";
                if(!preg_match($regex4, $idn)) {
                    $error5 = "Nomor Identitas tidak sesuai ketentuan";
                }
            } else {
                $error5 = "Nomor Identitas harus diisi";
            }

            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            } else {
                $error6 = "Alamat harus diisi";
            }

            if (isset($_POST['birthdate'])) {
                $tanggal = $_POST['birthdate'];
            } else {
                $error7 = "Tanggal lahir harus diisi";
            }

            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            } else {
                $error8 = "Jenis kelamin harus diisi";
            }

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $regex5 = "/[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+/";
                if(!preg_match($regex5, $email)){
                    $error9 = "Email tidak sesuai ketentuan";
                } 
            } else {
                $error9 = "Email harus diisi";
            }
             
            if (isset($_POST['confirmemail'])) {
                $confirmemail = $_POST['confirmemail'];
                if($confirmemail !== $email) {
                    $error10 = "Email tidak sama";
                }
            } else {
                $error10 = "Email harus diisi";
            } 

            if (isset($error1)) {
                $_SESSION['error1'] = $error1;
            }
            if (isset($error2)) {
                $_SESSION['error2'] = $error2;
            }
            if (isset($error3)) {
                $_SESSION['error3'] = $error3;
            }
            if (isset($error4)) {
                $_SESSION['error4'] = $error4;
            }
            if (isset($error5)) {
                $_SESSION['error5'] = $error5;
            }
            if (isset($error6)) {
                $_SESSION['error6'] = $error6;
            }
            if (isset($error7)) {
                $_SESSION['error7'] = $error7;
            }
            if (isset($error8)) {
                $_SESSION['error8'] = $error8;
            }
            if (isset($error9)) {
                $_SESSION['error9'] = $error9;
            }
            if (isset($error10)) {
                $_SESSION['error10'] = $error10;
            }
            

            if($conn && !isset($error1) && !isset($error2) && !isset($error3) && !isset($error4) && !isset($error5) && !isset($error6) && !isset($error7) && !isset($error8) && !isset($error9) && !isset($error10)){

                $set = "SET search_path to sirima";
                $res = pg_query($conn, $set);

                $sql1 = "SELECT * FROM sirima.PELAMAR WHERE email = '$email'";
                $result1 = pg_query($conn, $sql1);

                $sql4 = "SELECT * FROM sirima.AKUN WHERE username = '$username'";
                $result4 = pg_query($conn, $sql4);

                $sql5 = "SELECT * FROM sirima.PELAMAR WHERE username = '$username'";
                $result5 = pg_query($conn, $sql5);


                // if(pg_num_rows($result1 == 0) && pg_num_rows($result4) == 0) {
                //     $sql2 = "INSERT INTO sirima.AKUN(username, role, password) VALUES('$username', FALSE, '$password');";
                //     $result2 = pg_query($conn, $sql2);

                //     $sql3 = "INSERT INTO sirima.PELAMAR(username, nama_lengkap, alamat, jenis_kelamin, tanggal_lahir, no_ktp, email) VALUES('$username', '$name', '$address', '$gender', '$tanggal', '$idn', '$email');";
                //     $result3 = pg_query($conn, $sql3);

                //     $_SESSION['nama'] = $name;
                //     $_SESSION['isUserLogin'] = 'true';
                //     $_SESSION['isLogin'] = 'true';
                //     $_SESSION['isDaftar'] = 'true';
                //     header("Location: index.php");
                // } else {
                //     if (pg_num_rows($result1) != 0) {
                //         $errorEmail = 'Email sudah terdaftar.';
                //     } 
                //     if (pg_num_rows($result4) != 0 || pg_num_rows($result5) != 0) {
                //         $errorUname = 'Username sudah terdaftar.';
                //     }
                // }

                if(pg_num_rows($result1) != 0){
                    $errorEmail = 'Email sudah terdaftar.';
                } else if (pg_num_rows($result4) != 0 || pg_num_rows($result5) != 0) {
                    $errorUname = 'Username sudah terdaftar.';
                } else {
                    $sql2 = "INSERT INTO sirima.AKUN(username, role, password) VALUES('$username', FALSE, '$password');";
                    $result2 = pg_query($conn, $sql2);

                    $sql3 = "INSERT INTO sirima.PELAMAR(username, nama_lengkap, alamat, jenis_kelamin, tanggal_lahir, no_ktp, email) VALUES('$username', '$name', '$address', '$gender', '$tanggal', '$idn', '$email');";
                    $result3 = pg_query($conn, $sql3);

                    $_SESSION['nama'] = $name;
                    $_SESSION['isUserLogin'] = 'true';
                    $_SESSION['isLogin'] = 'true';
                    $_SESSION['isDaftar'] = 'true';
                    header("Location: index.php");
                }

                if(isset($errorEmail)) {
                    $_SESSION['errorEmail'] = $errorEmail;
                } else if(isset($errorUname)) {
                    $_SESSION['errorUname'] = $errorUname;
                } 
            }
           pg_close($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['command'] === 'register') {
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
                        <li><a href="shortcodes.html ">Tentang Kami</a></li>                    
                    </ul>
                </div>

            </div>
        </div>
    </header>

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
                <div id="alert-reg" align="center">
                <?php 
                    if (isset($_SESSION['errorEmail']) && isset($_SESSION['errorUname'])) {
                        echo "<div>
                        <div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><p>Email sudah terdaftar</p></div>
                        <div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><p>Username sudah terdaftar</p></div>
                        </div>";
                        unset($_SESSION['errorEmail']);
                        unset($_SESSION['errorUname']);
                    } else if (isset($_SESSION['errorEmail'])) {
                        echo "<div><div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><p>Email sudah terdaftar</p></div></div>";
                        unset($_SESSION['errorEmail']);
                    } else if (isset($_SESSION['errorUname'])) {
                        echo "<div><div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><p>Username sudah terdaftar</p></div></div>";
                        unset($_SESSION['errorUname']);
                    }

                 ?>
                    <div class="contact-form center">
                        <form role="form-horizontal" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class=" control-label">Username</label>
                                <input id="username" type="username" name="username" class="form-control" required="required" placeholder="Username">
                                <span class="help-block">Username hanya terdiri dari huruf atau angka dan boleh menggunakan tanda titik (.)</span>
                                <?php 
                                    if (isset($_SESSION['error1'])) {
                                        echo "<div style='color:red' id=error1>".$_SESSION['error1']."</div>";
                                        unset($_SESSION['error1']);
                                    } 
                                ?>
                            </div>
                           <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required="required" >
                                <span class="help-block">Minimal 6 karakter, case sensitive (A berbeda dengan a)</span>
                                <?php 
                                    if (isset($_SESSION['error3'])) {
                                        echo "<div style='color:red' id=error3>".$_SESSION['error3']."</div>";
                                        unset($_SESSION['error3']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Konfirmasi Password</label>
                                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Password" class="form-control" required="required" >
                                <span class="help-block">Minimal 6 karakter, case sensitive (A berbeda dengan a)</span>
                                <?php 
                                    if (isset($_SESSION['error4'])) {
                                        echo "<div style='color:red' id=error4>".$_SESSION['error4']."</div>";
                                        unset($_SESSION['error4']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="fullName" class="control-label">Nama Lengkap</label>
                                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required="required" >
                                <span class="help-block">Sesuai kartu identitas (KTP)</span>
                                <?php 
                                    if (isset($_SESSION['error2'])) {
                                        echo "<div style='color:red' id=error2>".$_SESSION['error2']."</div>";
                                        unset($_SESSION['error2']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="idNumber" class="control-label">Nomor Identitas (KTP)</label>
                                <input type="text" id="idnumber" name="idnumber" placeholder="Nomor Identitas (KTP)" class="form-control" required="required" >
                                <span class="help-block">Sesuai kartu identitas (KTP)</span>
                                <?php 
                                    if (isset($_SESSION['error5'])) {
                                        echo "<div style='color:red' id=error5>".$_SESSION['error5']."</div>";
                                        unset($_SESSION['error5']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label ">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label class="radio-inline">
                                                <input type="radio" name ="gender" id="gender" value="L" required="required">Laki-laki
                                            </label>
                                        </div>
                                        <div class="col-sm-5">
                                            <label class="radio-inline">
                                                <input type="radio" name ="gender"  id="gender" value="P">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    if (isset($_SESSION['error8'])) {
                                        echo "<div style='color:red' id=error8>".$_SESSION['error8']."</div>";
                                        unset($_SESSION['error8']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="birthDate" class="control-label">Tanggal Lahir</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control" required="required" >
                                <span class="help-block">Bulan/Hari/Tahun</span>
                                <?php 
                                    if (isset($_SESSION['error7'])) {
                                        echo "<div style='color:red' id=error7>".$_SESSION['error7']."</div>";
                                        unset($_SESSION['error7']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="address" class=" control-label">Alamat</label>
                                <input type="text" id="address" name="address" placeholder="Alamat" class="form-control" required="required" >
                                <span class="help-block">Alamat tempat tinggal saat ini</span>
                                <?php 
                                    if (isset($_SESSION['error6'])) {
                                        echo "<div style='color:red' id=error6>".$_SESSION['error6']."</div>";
                                        unset($_SESSION['error6']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" control-label">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control" required="required" >
                                <span class="help-block">Alamat email yang digunakan</span>
                                <?php 
                                    if (isset($_SESSION['error9'])) {
                                        echo "<div style='color:red' id=error9>".$_SESSION['error9']."</div>";
                                        unset($_SESSION['error9']);
                                    } 
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class=" control-label">Konfirmasi Email</label>
                                <input type="email" name="confirmemail" id="confirmemail" placeholder="Email" class="form-control" required="required" >
                                <span class="help-block">Alamat email yang digunakan</span>
                                <?php 
                                    if (isset($_SESSION['error10'])) {
                                        echo "<div style='color:red' id=error10>".$_SESSION['error10']."</div>";
                                        unset($_SESSION['error10']);
                                    } 
                                ?>
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
