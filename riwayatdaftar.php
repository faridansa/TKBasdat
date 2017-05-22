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
<!DOCTYPE html>
<html lang="en">
    <head>
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
        <link href="css/responsive.css" rel="stylesheet">   
        <link href="css/riwayatdaftar.css" rel="stylesheet">
        
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
                          <li><a href="index.php">Tentang Kami</a></li>  <?php 
                          if (isset($_SESSION['isUserLogin'])) {
                            echo "<li class='dropdown'> <a href='#'>Informasi SIRIMA <i class='fa fa-angle-down'></i></a> 
                            <ul role='menu' class='sub-menu'>
                            <li> <a href= 'link-buat-pendaftaran'>Buat Pendaftaran</a> </li>
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
          </header>
        <!--/#header-->

        <section id="page-breadcrumb">
            <div class="vertical-center sun">
                 <div class="container">
                    <div class="row">
                        <div class="action">
                            <div class="col-sm-12">
                                <h1 class="title">Riwayat Pendaftaran</h1>
                                <p class="nama-pelamar" >Nama Lengkap : <?php echo $_SESSION['nama'] ?></p>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
       </section>
        <!--/#page-breadcrumb-->
        <div class="table-riwayat">
          <div class="table-responsive">          
            <table class="table table-striped" id="tblGrid">
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
        <!-- Modal content UUI-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <table class="table table-striped" id="tblModal">
                </table>
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
      </footer>
      <!--/#footer-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>  
    <script type="text/javascript" src="js/homejs.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $("#sirima").addClass("active");
          var url = './riwayatPendaftaran.php';

          $(document).on("click", ".modalClick", function(){

            var months = [];
            months['01'] = "Januari";
            months['02'] = "Februari";
            months['03'] = "Maret";
            months['04'] = "April";
            months['05'] = "Mei";
            months['06'] = "Juni";
            months['07'] = "Juli";
            months['08'] = "Agustus";
            months['09'] = "September";
            months['10'] = "Oktober";
            months['11'] = "November";
            months['12'] = "Desember";
            let id = $(this).data('id');
            let periode = $(this).data('periode');
            let jenjang = $(this).data('jenjang');
            let jalur = $(this).data('jalur');


            $(".modal-header").empty();
            var header = `<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id = "modaltitle">Detail Pendaftaran ${jalur}</h4>`;
            $(".modal-header").append(header);
            if(jenjang === "S1" && jalur==="UUI"){
              let rapot = $(this).data('rapot');
              let rekomendasi = $(this).data('rekomendasi');
              let asal_sekolah = $(this).data('asal-sekolah');
              let jenis_sma = $(this).data('jenis-sma');
              let alamat_sekolah = $(this).data('alamat-sekolah');
              let nisn = $(this).data('nisn');
              let tanggal_lulus = $(this).data('tgl-lulus');
              let nilai_uan = $(this).data('uan');
              let prodi1 = $(this).data('prodi-1');
              let prodi2 = $(this).data('prodi-2');
              var tanggal = tanggal_lulus.substring(8);
              var bulan = tanggal_lulus.substring(5,7);
              var tahun = tanggal_lulus.substring(0,4);
              $("#tblModal").empty();
              $("#tblModal").append("<thead id='tblHead'><tr><th>Data</th><th>Pelamar</th></tr></thead>");
              let content = `<tbody><tr><td>Id Pendaftaran</td><td>${id}</td></tr><tr><td>Periode </td><td>${periode}</td></tr><tr><td>Rapot </td><td>${rapot}</td></tr><tr><td>Surat Rekomendasi </td><td>${rekomendasi}</td></tr><tr><td>Asal Sekolah </td><td>${asal_sekolah}</td></tr><tr><td>Jenis SMA </td><td>${jenis_sma}</td></tr><tr><td>Alamat Sekolah </td><td>${alamat_sekolah}</td></tr><tr><td>NISN </td><td>${nisn}</td></tr><tr><td>Tanggal Lulus </td><td>${tanggal} ${months[bulan]} ${tahun}</td></tr><tr><td>Nilai UAN </td><td>${nilai_uan}</td></tr><tr><td>Prodi pilihan 1 </td><td>${prodi1}</td></tr><tr><td>Prodi pilihan 2 </td><td>${prodi2}</td></tr></tbody>`;
              $("#tblModal").append(content);
            } else if(jenjang === "S1" && jalur==="SEMAS SARJANA"){
              let no_kartu_ujian = $(this).data('kartu');
              let asal_sekolah = $(this).data('asal-sekolah');
              let jenis_sma = $(this).data('jenis-sma');
              let alamat_sekolah = $(this).data('alamat-sekolah');
              let nisn = $(this).data('nisn');
              let tanggal_lulus = $(this).data('tgl-lulus');
              let nilai_uan = $(this).data('uan');
              let prodi1 = $(this).data('prodi-1');
              let prodi2 = $(this).data('prodi-2');
              let prodi3 = $(this).data('prodi-3');
              let kota = $(this).data('kota');
              let tempat = $(this).data('tempat');
              var tanggal = tanggal_lulus.substring(8);
              var bulan = tanggal_lulus.substring(5,7);
              var tahun = tanggal_lulus.substring(0,4);

             $("#tblModal").empty();
             $("#tblModal").append("<thead id='tblHead'><tr><th>Data</th><th>Pelamar</th></tr></thead>");
             let content = `<tbody><tr><td>Id Pendaftaran</td><td>${id}</td></tr><tr><td>Periode </td><td>${periode}</td></tr><tr><td>No Kartu Ujian </td><td>${no_kartu_ujian}</td></tr><tr><td>Asal Sekolah </td><td>${asal_sekolah}</td></tr><tr><td>Jenis SMA </td><td>${jenis_sma}</td></tr><tr><td>Alamat Sekolah </td><td>${alamat_sekolah}</td></tr><tr><td>NISN </td><td>${nisn}</td></tr><tr><td>Tanggal Lulus </td><td>${tanggal} ${months[bulan]} ${tahun}</td></tr><tr><td>Nilai UAN </td><td>${nilai_uan}</td></tr><tr><td>Prodi pilihan 1 </td><td>${prodi1}</td></tr><tr><td>Prodi pilihan 2 </td><td>${prodi2}</td></tr><tr><td>Prodi pilihan 3 </td><td>${prodi3}</td></tr><tr><td>Lokasi kota ujian </td><td>${kota}</td></tr><tr><td>Lokasi tempat ujian </td><td>${tempat}</td></tr></tbody>`;
            $("#tblModal").append(content);
            }  else if(jenjang === "S2" && jalur==="SEMAS PASCASARJANA"){
             let no_kartu_ujian = $(this).data('kartu');
             let tpa = $(this).data('tpa');
             let toefl = $(this).data('toefl');
             let jenjang_terakhir = $(this).data('jenjang-terakhir');
             let asal_univ = $(this).data('asal-univ');
             let alamat_univ = $(this).data('alamat-univ');
             let prodi_terakhir = $(this).data('prodi-terakhir');
             let ipk = $(this).data('ipk');
             let tgllulus = $(this).data('tgl-lulus');
             let prodi_pilihan = $(this).data('prodi-pilihan');
             let kota = $(this).data('kota');
             let tempat = $(this).data('tempat');
             var tanggal = tanggal_lulus.substring(8);
             var bulan = tanggal_lulus.substring(5,7);
             var tahun = tanggal_lulus.substring(0,4);

             $("#tblModal").empty();
             $("#tblModal").append("<thead id='tblHead'><tr><th>Data</th><th>Pelamar</th></tr></thead>");
             let content = `<tbody><tr><td>Id Pendaftaran</td><td>${id}</td></tr><tr><td>Periode </td><td>${periode}</td></tr><tr><td>Jenjang Dipilih </td><td>${jenjang}</td></tr><tr><td>No Kartu Ujian </td><td>${no_kartu_ujian}</td></tr><tr><td>Nilai TPA </td><td>${tpa}</td></tr><tr><td>Nilai TOEFL </td><td>${toefl}</td></tr><tr><td>Jenjang Terakhir </td><td>${jenjang_terakhir}</td></tr><tr><td>Asal Universitas </td><td>${asal_univ}</td></tr><tr><td>Alamat Universitas </td><td>${alamat_univ}</td></tr><tr><td>Prodi Terakhir </td><td>${prodi_terakhir}</td></tr><tr><td>Nilai IPK </td><td>${ipk}</td></tr><tr><td>Tanggal Lulus </td><td>${tanggal} ${months[bulan]} ${tahun}</td></tr><tr><td>Prodi pilihan </td><td>${prodi_pilihan}</td></tr><tr><td>Lokasi kota ujian </td><td>${kota}</td></tr><tr><td>Lokasi tempat ujian </td><td>${tempat}</td></tr></tbody>`;
            $("#tblModal").append(content);
              
            }  else if(jenjang === "S3" && jalur==="SEMAS PASCASARJANA"){
             let no_kartu_ujian = $(this).data('kartu');
             let tpa = $(this).data('tpa');
             let toefl = $(this).data('toefl');
             let jenjang_terakhir = $(this).data('jenjang-terakhir');
             let asal_univ = $(this).data('asal-univ');
             let alamat_univ = $(this).data('alamat-univ');
             let prodi_terakhir = $(this).data('prodi-terakhir');
             let ipk = $(this).data('ipk');
             let tgllulus = $(this).data('tgl-lulus');
             let prodi_pilihan = $(this).data('prodi-pilihan');
             let rekomender = $(this).data('rekomender');
             let prop = $(this).data('prop');
             let kota = $(this).data('kota');
             let tempat = $(this).data('tempat');
             var tanggal = tanggal_lulus.substring(8);
             var bulan = tanggal_lulus.substring(5,7);
             var tahun = tanggal_lulus.substring(0,4);

             $("#tblModal").empty();
             $("#tblModal").append("<thead id='tblHead'><tr><th>Data</th><th>Pelamar</th></tr></thead>");
             let content = `<tbody><tr><td>Id Pendaftaran</td><td>${id}</td></tr><tr><td>Periode </td><td>${periode}</td></tr><tr><td>Jenjang Dipilih </td><td>${jenjang}</td></tr><tr><td>No Kartu Ujian </td><td>${no_kartu_ujian}</td></tr><tr><td>Nilai TPA </td><td>${tpa}</td></tr><tr><td>Nilai TOEFL </td><td>${toefl}</td></tr><tr><td>Jenjang Terakhir </td><td>${jenjang_terakhir}</td></tr><tr><td>Asal Universitas </td><td>${asal_univ}</td></tr><tr><td>Alamat Universitas </td><td>${alamat_univ}</td></tr><tr><td>Prodi Terakhir </td><td>${prodi_terakhir}</td></tr><tr><td>Nilai IPK </td><td>${ipk}</td></tr><tr><td>Tanggal Lulus </td><td>${tanggal} ${months[bulan]} ${tahun}</td></tr><tr><td>Prodi pilihan </td><td>${prodi_pilihan}</td></tr><tr><td>Nama Rekomender </td><td>${rekomender}</td></tr><tr><td>Proposal penelitian </td><td>${prop}</td></tr><tr><td>Lokasi kota ujian </td><td>${kota}</td></tr><tr><td>Lokasi tempat ujian </td><td>${tempat}</td></tr></tbody>`;
            $("#tblModal").append(content);
            } 

          });

          $.ajax({
            type: "POST",
            url: url,
            success: function(data){
              var datafetched = JSON.parse(data);
              console.log(datafetched);
              $("#tblGrid").empty();
              $("#tblGrid").append("<thead id='tblHead'><tr><th>Id Pendaftaran</th><th>Nomor Periode</th><th>Tahun Periode</th><th>No Kartu Ujian</th><th>Jalur</th><th>Prodi 1</th><th>Prodi 2</th><th>Prodi 3</th></tr></thead>");
              let contentHeader = '<tbody><tr><td>';
              for (let jalur of datafetched){
                for (let id in jalur) {
                  let a = "<a data-toggle='modal' data- data-target='#myModal' class='modalClick' data-id='"+ jalur[id]['id_pendaftaran']+"' data-periode='" + jalur[id]['nomor_periode']+"-"+jalur[id]["tahun_periode"]+"' data-jenjang='"+ jalur[id]["jenjang"] +"' data-jalur='" + jalur[id]["jalur"]+ "'";
                  
                  if(jalur[id]["jenjang"] === "S1" && jalur[id]["jalur"] === "UUI" ){
                    a += "data-rapot ='"+jalur[id]['rapot']+"' data-rekomendasi = '"+jalur[id]['surat_rekomendasi']+"' data-asal-sekolah = '"+jalur[id]['asal_sekolah']+"' data-jenis-sma = '"+jalur[id]['jenis_sma']+"' data-alamat-sekolah = '"+jalur[id]['alamat_sekolah']+"' data-nisn = '"+jalur[id]['nisn']+"' data-tgl-lulus = '"+jalur[id]['tanggal_lulus']+"' data-uan = '"+jalur[id]['nilai_uan']+"' data-prodi-1 = '"+jalur[id]['1']+"' data-prodi-2 = '"+jalur[id]['2']+"' >";
                  }else if(jalur[id]["jenjang"] === "S1" && jalur[id]["jalur"] === "SEMAS SARJANA" ){
                    a += "data-kartu ='"+jalur[id]['kartu']+"' data-asal-sekolah = '"+jalur[id]['asal_sekolah']+"' data-jenis-sma = '"+jalur[id]['jenis_sma']+"' data-alamat-sekolah = '"+jalur[id]['alamat_sekolah']+"' data-nisn = '"+jalur[id]['nisn']+"' data-tgl-lulus = '"+jalur[id]['tanggal_lulus']+"' data-uan = '"+jalur[id]['nilai_uan']+"' data-prodi-1 = '"+jalur[id]['1']+"' data-prodi-2 = '"+jalur[id]['2']+"' data-prodi-3 = '"+jalur[id]['3']+"' data-kota = '"+jalur[id]['lokasi_kota']+"' data-tempat = '"+jalur[id]['lokasi_tempat']+"' >";
                  }else if(jalur[id]["jenjang"] === "S2" && jalur[id]["jalur"] === "SEMAS PASCASARJANA" ){
                    a += "data-jenjang ='"+jalur[id]['jenjang']+"' data-kartu = '"+jalur[id]['kartu']+"' data-tpa = '"+jalur[id]['nilai_tpa']+"' data-toefl = '"+jalur[id]['nilai_toefl']+"' data-jenjang-terakhir = '"+jalur[id]['njenjang_terakhir']+"' data-asal-univ = '"+jalur[id]['asal_universitas']+"' data-alamat-univ = '"+jalur[id]['alamat_univ']+"' data-prodi-terakhir = '"+jalur[id]['prodi_terakhir']+"' data-ipk = '"+jalur[id]['nilai_ipk']+"' data-tgl-lulus = '"+jalur[id]['tanggal_lulus']+"' data-prodi-pilihan = '"+jalur[id]['1']+"' data-kota = '"+jalur[id]['lokasi_kota']+"' data-tempat = '"+jalur[id]['lokasi_tempat']+"' >";
                  } else if(jalur[id]["jenjang"] === "S3" && jalur[id]["jalur"] === "SEMAS PASCASARJANA" ){
                    a += "data-jenjang ='"+jalur[id]['jenjang']+"' data-kartu = '"+jalur[id]['kartu']+"' data-tpa = '"+jalur[id]['nilai_tpa']+"' data-toefl = '"+jalur[id]['nilai_toefl']+"' data-jenjang-terakhir = '"+jalur[id]['njenjang_terakhir']+"' data-asal-univ = '"+jalur[id]['asal_universitas']+"' data-alamat-univ = '"+jalur[id]['alamat_univ']+"' data-prodi-terakhir = '"+jalur[id]['prodi_terakhir']+"' data-ipk = '"+jalur[id]['nilai_ipk']+"' data-tgl-lulus = '"+jalur[id]['tanggal_lulus']+"' data-rekomender = '"+jalur[id]['rekomender']+"' data-prop = '"+jalur[id]['prop']+"' data-prodi-pilihan = '"+jalur[id]['1']+"' data-kota = '"+jalur[id]['lokasi_kota']+"' data-tempat = '"+jalur[id]['lokasi_tempat']+"' >";
                  }

                  contentHeader += a + jalur[id]["id_pendaftaran"] + "</a></td><td>" + jalur[id]["nomor_periode"] + "</td><td>" + jalur[id]["tahun_periode"] + "</td><td>" + jalur[id]["kartu"] + "</td><td>" + jalur[id]["jalur"] + "</td><td>" + jalur[id]["1"] + "</td><td>" + jalur[id]["2"] + "</td><td>" + jalur[id]["3"];
                }
              }
              let contentFooter = '</td></tr></tbody>';
              $("#tblGrid").append(contentHeader + contentFooter);
            }
          });
        });
    </script>
    </body>
</html>