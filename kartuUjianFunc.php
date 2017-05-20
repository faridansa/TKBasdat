<?php
    session_start();
    //session_destroy();

    function connectDB(){

        $conn = pg_connect("dbname=noviantialiasih user=postgres password=Apakekgitu1");
        //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
        if(!$conn){
             die("Error connection test :".pg_last_error());
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

    function getData(){
        $_SESSION['id-pendaftaran'] = $_POST['pendaftaran'];
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

            $datafetched = array($result[0],$result[1],$result[2],$result[3],$result[4], $result[5], $result[6], $month_start, $day_start, $year_start, $hour_start, $minute_start, $month_end, $day_end, $year_end, $hour_end, $minute_end);

            echo json_encode($datafetched);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['command'] === 'Lihat'){
            getData();
        }
    }

?>