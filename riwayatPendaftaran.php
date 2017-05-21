<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
        //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
        if(!$conn){
             die("Connection failed");
        }
        return $conn;
    }

    function riwayatDaftar() {
        $connect = connectDB();
        $nama = $_SESSION['nama'];
        $command1 = "SELECT P.username FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PELAMAR AS P WHERE PD.pelamar = P.username AND P.nama_lengkap = '$nama';";
        $result1 =  pg_query($connect, $command1);
        if(!$result1) {
            die("Error occured while getting query :").pg_last_error();
        }
        $pelamar = pg_fetch_row($result1)[0];
        $riwayatPelamar = array();

        //cek ada di dalam UUI
        $command2 = "SELECT PU.id_pendaftaran, nomor_periode, tahun_periode FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_UUI PU WHERE PU.id_pendaftaran = PD.id AND PD.pelamar ='$pelamar';";

        $riwayatUUI = pg_fetch_all(pg_query($connect, $command2)); 
        $riwayatUUIdata = array();
        if($riwayatUUI != ""){
            foreach ($riwayatUUI as $key => $value) {
                //cari semua prodi si pelamar daftar menggunakan username
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PENDAFTARAN AS PD WHERE PD.id = PP.id_pendaftaran AND PS.kode = PP.kode_prodi and PD.pelamar ='$pelamar';"
                $prodi = pg_fetch_all(pg_query($connect, $sql));
                print_r($prodi);
                $data = "SELECT rapot, surat_rekomendasi, asal_sekolah, jenis_sma, alamat_sekolah, nisn, tgl_lulus, nilai_uan FROM SIRIMA.PENDAFTARAN_UUI WHERE id_pendaftaran = '$id_pendaftaran';";
                $dataModal = pg_fetch_all(pg_query($connect, $data));
                $riwayatUUIdata[$value['id_pendaftaran']] = array(
                    "id_pendaftaran" => $value['id_pendaftaran'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => "KOSONG",
                    "jalur" => "UUI",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    "jenjang" => "S1",
                    "rapot" => $dataModal[0]['rapot'],
                    "surat_rekomendasi" => $dataModal[0]['surat_rekomendasi'],
                    "asal_sekolah" => $dataModal[0]['asal_sekolah'],
                    "jenis_sma" => $dataModal[0]['jenis_sma'],
                    "alamat_sekolah" => $dataModal[0]['alamat_sekolah'],
                    "nisn" => $dataModal[0]['nisn'],
                    "tanggal_lulus" => $dataModal[0]['tgl_lulus'],
                    "nilai_uan" => $dataModal[0]['nilai_uan']
                    );

                foreach ($prodi as $k => $v) {
                   $riwayatUUIdata[$value['id_pendaftaran']][$k+1] = $v['jenjang']." ".$v['nama']." ".$v['jenis_kelas'];
                }
            }
            array_push($riwayatPelamar, $riwayatUUIdata);
        }
        

        //cek ada di dalam semas sarjana
        $command3 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian FROM SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PENDAFTARAN_SEMAS_SARJANA AS PSS, SIRIMA.PENDAFTARAN AS PD WHERE PS.id_pendaftaran = PD.id AND PSS.id_pendaftaran = PD.id AND PD.pelamar = '$pelamar';";
        $riwayatSemasSarjana = pg_fetch_all(pg_query($connect, $command3));
        $riwayatSemasSarjanadata = array();
        if($riwayatSemasSarjana != ""){
            foreach ($riwayatSemasSarjana as $key => $value) {
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PENDAFTARAN AS PD WHERE PD.id = PP.id_pendaftaran AND PS.kode = PP.kode_prodi and PD.pelamar ='$pelamar';";
                $prodi = pg_fetch_all(pg_query($connect, $sql));
                $data = "SELECT PSS.asal_sekolah, PSS.jenis_sma, PSS.alamat_sekolah, PSS.nisn, PSS.tgl_lulus, PSS.nilai_uan, PS.lokasi_tempat, PS.lokasi_kota FROM SIRIMA.PENDAFTARAN_SEMAS_SARJANA AS PSS, SIRIMA.PENDAFTARAN_SEMAS AS PS WHERE PSS.id_pendaftaran = PS.id_pendaftaran AND PS.id_pendaftaran = '$id_pendaftaran'";

                 $dataModal = pg_fetch_all(pg_query($connect, $data));
                $riwayatSemasSarjanadata[$value['id']] = array(
                    "id_pendaftaran" => $value['id'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => $value['no_kartu_ujian'],
                    "jalur" => "SEMAS SARJANA",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    "jenjang" => "S1",
                    "asal_sekolah" => $dataModal[0]['asal_sekolah'],
                    "jenis_sma" => $dataModal[0]['jenis_sma'],
                    "alamat_sekolah" => $dataModal[0]['alamat_sekolah'],
                    "nisn" => $dataModal[0]['nisn'],
                    "tanggal_lulus" => $dataModal[0]['tgl_lulus'],
                    "nilai_uan" => $dataModal[0]['nilai_uan'],
                    "lokasi_kota" => $dataModal[0]['lokasi_kota'],
                    "lokasi_tempat" => $dataModal[0]['lokasi_tempat'],
                    );

                foreach ($prodi as $k => $v) {
                   $riwayatSemasSarjanadata[$value['id']][$k+1] = $v['jenjang']." ".$v['nama']." ".$v['jenis_kelas'];
                }
            } 

            array_push($riwayatPelamar, $riwayatSemasSarjanadata);
        }

        //cek ada di dalam semas pascasarjana
       $command4 = "SELECT PD.id, PD.nomor_periode, PD.tahun_periode, PS.no_kartu_ujian, PSP.jenjang FROM SIRIMA.PENDAFTARAN_SEMAS AS PS, SIRIMA.PENDAFTARAN_SEMAS_PASCASARJANA AS PSP, SIRIMA.PENDAFTARAN AS PD WHERE PS.id_pendaftaran = PD.id AND PSP.id_pendaftaran = PD.id AND PD.pelamar = '$pelamar';";

        $riwayatSemasPascasarjana = pg_fetch_all(pg_query($connect, $command4));
        $riwayatSemasPascaSarjanadata = array();
        if($riwayatSemasPascasarjana != ""){
            foreach ($riwayatSemasPascasarjana as $key => $value) {
                $sql = "SELECT PS.jenjang, PS.nama, PS.jenis_kelas FROM SIRIMA.PROGRAM_STUDI AS PS, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PENDAFTARAN AS PD WHERE PD.id = PP.id_pendaftaran AND PS.kode = PP.kode_prodi and PD.pelamar ='$pelamar';";
                $prodi = pg_fetch_all(pg_query($connect, $sql));
                $data = "SELECT PSP.jenjang, PSP.nilai_tpa, PSP.nilai_toefl, PSP.jenjang_terakhir, PSP.asal_univ, PSP.alamat_univ, PSP.prodi_terakhir, PSP.nilai_ipk, PSP.tgl_lulus,PSP.nama_rekomender, PSP.prop_penelitian, PS.lokasi_tempat, PS.lokasi_kota FROM SIRIMA.PENDAFTARAN_SEMAS_PASCASARJANA AS PSP, SIRIMA.PENDAFTARAN AS PD, SIRIMA.PENDAFTARAN_SEMAS AS PS WHERE PSP.id_pendaftaran = PD.id AND  id_pendaftaran = '$id_pendaftaran'";
                $dataModal = pg_fetch_all(pg_query($connect, $data));
                $riwayatSemasPascaSarjanadata[$value['id']] = array(
                    "id_pendaftaran" => $value['id'],
                    "nomor_periode" => $value['nomor_periode'], 
                    "tahun_periode" => $value['tahun_periode'],
                    "kartu" => $value['no_kartu_ujian'],
                    "jalur" => "SEMAS PASCASARJANA",
                    1 => "KOSONG",
                    2 => "KOSONG",
                    3 => "KOSONG",
                    "jenjang" => $value['jenjang'],
                    "nilai_tpa" => $dataModal[0]['nilai_tpa'],
                    "nilai_toefl" => $dataModal[0]['nilai_toefl'],
                    "jenjang_terakhir" => $dataModal[0]['jenjang_terakhir'],
                    "asal_univ" => $dataModal[0]['asal_univ'],
                    "alamat_univ" => $dataModal[0]['alamat_univ'],
                    "prodi_terakhir" => $dataModal[0]['prodi_terakhir'],
                    "nilai_ipk" => $dataModal[0]['nilai_ipk'],
                    "tanggal_lulus" => $dataModal[0]['tanggal_lulus'],
                    "rekomender" => $dataModal[0]['nama_rekomender'],
                    "prop" => $dataModal[0]['prop_penelitian'],
                    "lokasi_kota" => $dataModal[0]['lokasi_kota'],
                    "lokasi_tempat" => $dataModal[0]['lokasi_tempat']
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