<?php
    session_start();
    function funcCheckLogin() {
    if (!isset($_SESSION['isLogin'])) {
      header("Location: login.php");
    }
    if(!isset($_SESSION['isUserLogin'])) {
      header("Location: index.php");    
    }
  }
  funcCheckLogin();
?>
<html lang="en">
    <head>
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
        <link href="css/responsive.css" rel="stylesheet">   
        <link href="css/kartuujian.css" rel="stylesheet">
        
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
                           <?php 
                          if (isset($_SESSION['isUserLogin'])) {
                            echo "<li class='dropdown'> <a href='#'>Informasi SIRIMA <i class='fa fa-angle-down'></i></a> 
                            <ul role='menu' class='sub-menu'>
                            <li> <a href= 'semas1.php'>Buat Pendaftaran</a> </li>
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
            <div id="img-navbar" class="col-sm-12 text-center bottom-separator">
                <div class="col-sm-4 title">
                    <h1> Lihat Kartu Ujian</h1>
                </div>
            </div>
        </header>
        <!--/#header-->

        <div class="input-id">
            <div class="row">
                <form class="col s12" id="inputid"> 
                    <div class="form-group">
                        <input id="pendaftaran" type="id-pendaftaran" name="pendaftaran" class="form-control" required="required" placeholder="Id Pendaftaran" onvalid="openModal();"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="Lihat" name="command">
                        <button class="btn btn-submit btn-login" data-target="#myModal" id="btn-login"> LIHAT </button>
                    </div>
                </form>
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
                    <table class="table table-striped" id="tblGrid">
                    </table>
                    <button id="back-button" type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back
                    </button>
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
    <script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/homejs.js"></script> 

    <script type="text/javascript">
        function openModal(){
            $("#myModal").modal();
        }
        $(document).ready(function(){

            $("#sirima").addClass("active");

            $("#inputid").submit(function(e){
                var url = './kartuujianFungsi.php';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#inputid").serialize(),
                    success: function(data){
                        
                        var datafetched = JSON.parse(data);
                       if(datafetched[0] !== null) {
                        $("#tblGrid").empty();
                        $("#tblGrid").append("<thead id='tblHead'><tr><th>Data</th><th>Pelamar</th></tr></thead>");
                        var months = {'1' : 'Januari','2' : 'Februari','3' :'Maret','4' :'April','5' :'Mei','6' :'Juni','7' :'Juli','8' :'Agustus','9' :'September','10' :'Oktober','11' :'November','12' :'Desember'};
                        let content = `<tbody><tr><td>Id Pendaftaran</td><td>${datafetched[0]}</td></tr><tr><td>Nama Lengkap </td><td>${datafetched[1]}</td></tr><tr><td>Nomor Kartu Ujian </td><td>${datafetched[2]}</td></tr><tr><td>Lokasi Ujian </td><td>${datafetched[3]}, ${datafetched[4]}</td></tr><tr><td>Waktu Ujian </td><td>${datafetched[8]} ${months[datafetched[7]]} ${datafetched[9]} ${datafetched[10]}${datafetched[11]} WIB - ${datafetched[13]} ${months[datafetched[12]]} ${datafetched[14]} ${datafetched[15]}${datafetched[16]} WIB</td></tr></tbody>`;
                        $("#tblGrid").append(content);
                    
                        openModal();
                       }else{
                        alert("Id tidak ditemukan");
                       }
                    }
                });
                e.preventDefault();
            });
        });

    </script>  
    </body>
</html>