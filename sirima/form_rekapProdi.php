<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rekap By Prodi | SIRIMA</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet"> 
  <link href="css/animate.min.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/UILogo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/lightbox.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>   

        <!--Import materialize.css-->
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
        <script>
        $(document).ready(function() {
          $('select').material_select();
        });
        </script>
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

                    <a class="navbar-brand" href="index.html">
                        <img src="images/Universitas Inovasi-01.png" width="100px" alt="logo">
                    </a>
                    
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="riwayatdaftar.html">Riwayat Pendaftaran</a></li>
                                <li><a href="kartuujian.html">Kartu Ujian</a></li>
                                <li><a href="aboutus2.html">Kartu Ujian juga yey</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                            </ul>
                        </li>                    
                        <li class="dropdown"><a href="blog.html">Lihat Pendaftaran <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Rekap Pendaftaran Jenjang</a></li>
                                <li><a href="blog.html">Daftar Pelamar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">About US <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="#footer">Contact</a></li>
                                <li><a href="contact2.html">Map</a></li>
                            </ul>
                        </li>                         
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
         <div class="container">
                <div class="col-sm-12 text-center bottom-separator">
                    <h1 class="title">SIRIMA</h1>
                    <p>(Form Pemilihan Program Studi)</p>
                </div>
             <img src="images/home/under.png" class="img-responsive inline" alt="">
        </div>
    </div>
</div>
</section>
<!--/#page-breadcrumb-->

<section id="company-information" class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="col-md-3 col-sm-1">     
        </div>
        <div class="col-md-1 col-sm-1">     
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="center-block">
                <div class="row">
                    <form class="col s12" action="daftarPelamar.php" method="post">
                        <div class="row">
                           <label>Periode</label>
                           <select>
                              <option value="" disabled selected>Pilih Periode</option>
                              <option value="1">3 - 2017</option>
                              <option value="2">2 - 2016</option>
                              <option value="3">1 - 2015</option>
                          </select>               
                      </div>
                      <div class="row">
                       <label>Prodi</label>
                       <select>
                          <option value="" disabled selected>Pilih Prodi</option>
                          <optgroup label="Reguler">
                              <option value="1">S1 Kedokteran Reguler</option>
                              <option value="2">S1 Matematika Reguler</option>
                              <option value="3">S1 Teknik Sipil Reguler</option>
                              <option value="4">S1 Ilmu Komputer Reguler</option>
                              <option value="5">S2 Kedokteran Reguler</option>
                              <option value="6">S2 Fisika Reguler</option>
                              <option value="7">S2 Teknik Sipil Reguler</option>
                              <option value="8">S2 Ilmu Komputer Reguler</option>
                              <option value="9">S3 Kedokteran Reguler</option>
                              <option value="10">S3 Biologi Reguler</option>
                              <option value="11">S3 Teknik Sipil Reguler</option>
                              <option value="12">S3 Ilmu Komputer Reguler</option>
                          </optgroup>
                          <optgroup label="Internasional">
                              <option value="13">S1 Kedokteran Internasional</option>
                              <option value="14">S1 Biologi Internasional</option>
                              <option value="15">S1 Teknik Industri Internasional</option>
                              <option value="16">S1 Ilmu Komputer Internasional</option>
                          </optgroup>
                          <optgroup label="Paralel">
                              <option value="17">S1 Kedokteran Paralel</option>
                              <option value="18">S1 Biologi Paralel</option>
                              <option value="19">S1 Teknik Industri Paralel</option>
                              <option value="20">S1 Ilmu Komputer Paralel</option>
                          </optgroup>
                      </select>               
                      <div class="center-align">
                        <button class="btn btn-submit btn-login" type="submit" name="submit">Pilih</button>
                    </div>
                </form>       
            </div>
        </div>      
    </div>
</section>
</body>
</html>
