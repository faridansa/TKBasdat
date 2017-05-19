<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
        if(!$conn){
             die("Connection failed");
        }
        return $conn;
    }

    function riwayatDaftar1($nama) {
        $connect = connectDB();
        $command1 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian
        FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PELAMAR AS P
WHERE PD.id = PS.id_pendaftaran AND PP.id_pendaftaran = PD.id AND P.username = PD.pelamar AND P.nama_lengkap = '$nama'; ";
        $result1 =  pg_query($connect, $command);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }
        
        $command2 = "SELECT  FROM WHERE ";
        $result2 =  pg_query($connect, $command2);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }

        $command3 = "SELECT FROM WHERE ";
        $result3 =  pg_query($connect, $command3);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }

        pg_close();
        return $result;
    }


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['command'] === 'Lihat'){
            getData();
        }
    }
?>