<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("dbname=noviantialiasih user=postgres password=Apakekgitu1");
        //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
        if(!$conn){
             die("Connection failed");
        }
        return $conn;
    }

    function riwayatDaftar() {
        $connect = connectDB();
        $nama = $_SESSION['nama'];
        $command1 = "SELECT PD.id FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PELAMAR AS P WHERE PD.pelamar = P.username AND P.nama_lengkap = '$nama';";
        $result1 =  pg_query($connect, $command1);
        if(!$result1) {
            die("Error occured while getting query :").pg_last_error();
        }
        $id_pendaftaran = pg_fetch_row($result1)[0];
        $riwayatPelamar = array();

        //cek ada di dalam UUI
        $command2 = "SELECT PU.id_pendaftaran, nomor_periode, tahun_periode FROM SIRIMA.PENDAFTARAN P, SIRIMA.PENDAFTARAN_UUI PU WHERE id_pendaftaran=id AND id='$id_pendaftaran';";

        $riwayatUUI = pg_fetch_all(pg_query($connect, $command2)); 
        $riwayatUUIdata = array();
        if($riwayatUUI != ""){
            foreach ($riwayatUUI as $key => $value) {
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP WHERE PS.kode = PP.kode_prodi and PP.id_pendaftaran = '$id_pendaftaran';";
                $prodi = pg_fetch_all(pg_query($connect, $sql)); 
                $riwayatUUIdata[$value['id_pendaftaran']] = array(
                    "id_pendaftaran" => $value['id_pendaftaran'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => "KOSONG",
                    "jalur" => "UUI",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    );

                foreach ($prodi as $k => $v) {
                   $riwayatUUIdata[$value['id_pendaftaran']][$k+1] = $v['jenjang']." ".$v['nama']." ".$v['jenis_kelas'];
                }
            }
            array_push($riwayatPelamar, $riwayatUUIdata);
        }
        

        //cek ada di dalam semas sarjana
        $command3 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian FROM SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PENDAFTARAN_SEMAS_SARJANA AS PSS, SIRIMA.PENDAFTARAN AS PD WHERE PS.id_pendaftaran = PD.id AND PSS.id_pendaftaran = PD.id AND PD.id = '$id_pendaftaran';";

        $riwayatSemasSarjana = pg_fetch_all(pg_query($connect, $command3));
        $riwayatSemasSarjanadata = array();
        if($riwayatSemasSarjana != ""){
            foreach ($riwayatSemasSarjana as $key => $value) {
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP WHERE PS.kode = PP.kode_prodi and PP.id_pendaftaran = '$id_pendaftaran';";
                $prodi = pg_fetch_all(pg_query($connect, $sql));

                $riwayatSemasSarjanadata[$value['id']] = array(
                    "id_pendaftaran" => $value['id'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => $value['no_kartu_ujian'],
                    "jalur" => "SEMAS SARJANA",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    );

                foreach ($prodi as $k => $v) {
                   $riwayatSemasSarjanadata[$value['id']][$k+1] = $v['jenjang']." ".$v['nama']." ".$v['jenis_kelas'];
                }
            } 

            array_push($riwayatPelamar, $riwayatSemasSarjanadata);
        }

        //cek ada di dalam semas pascasarjana
       $command4 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian FROM SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PENDAFTARAN_SEMAS_PASCASARJANA AS PSP, SIRIMA.PENDAFTARAN AS PD WHERE PS.id_pendaftaran = PD.id AND PSP.id_pendaftaran = PD.id AND PD.id = '$id_pendaftaran';";

        $riwayatSemasPascasarjana = pg_fetch_all(pg_query($connect, $command4));
        $riwayatSemasPascaSarjanadata = array();
        if($riwayatSemasPascasarjana != ""){
            foreach ($riwayatSemasPascasarjana as $key => $value) {
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP WHERE PS.kode = PP.kode_prodi and PP.id_pendaftaran = '$id_pendaftaran';";
                $prodi = pg_fetch_all(pg_query($connect, $sql));
                $riwayatSemasPascaSarjanadata[$value['id']] = array(
                    "id_pendaftaran" => $value['id'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => $value['no_kartu_ujian'],
                    "jalur" => "SEMAS PASCASARJANA",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    );

                if($prodi != ""){
                    foreach ($prodi as $k => $v) {
                       $riwayatSemasPascaSarjanadata[$value['id']][$k+1] = $v['jenjang']." ".$v['nama']." ".$v['jenis_kelas'];
                    }
                }
            } 

            array_push($riwayatPelamar, $riwayatSemasPascaSarjanadata);
        }

        echo json_encode($riwayatPelamar);
    }

    riwayatDaftar();

?>