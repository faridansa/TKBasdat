<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
        if(!$conn){
             die("Connection failed");
        }
        return $conn;
    }

    function riwayatDaftar1($nama) {
        $connect = connectDB();
        $command1 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PELAMAR AS P WHERE PD.id = PS.id_pendaftaran AND PD.pelamar = P.username AND P.nama_lengkap = "$nama";
        $result1 =  pg_query($connect, $command);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }
        if(count($result1) === 3){
            //belum ada jalur
            $command3 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian, PR.nama FROM SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PELAMAR AS P ,SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PROGRAM_STUDI AS PR WHERE PD.id = PP.id_pendaftaran AND PP.kode_prodi = PR.kode AND PD.pelamar = P.username AND PS.id_pendaftaran = PD.id AND P.nama_lengkap = '$nama'";
            $result3 =  pg_query($connect, $command3);
            if(!$result) {
                die("Error ouccured while getting query :").pg_last_error();
            }
           
        } else {
            //belum ada no_kartu_ujian, jalur, prodi3 (tapi yang diisi cuma prodi1 ga ada prodi2&3)
            $command2 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PR.nama FROM SIRIMA.PELAMAR AS P ,SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PROGRAM_STUDI AS PR WHERE PD.id = PP.id_pendaftaran AND PP.kode_prodi = PR.kode AND PD.pelamar = P.username AND P.nama_lengkap = '$nama'";
            $result2 =  pg_query($connect, $command2);
            if(!$result) {
                die("Error ouccured while getting query :").pg_last_error();
            }
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