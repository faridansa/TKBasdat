<?php
    session_start();
    function connectDB(){
        $conn = pg_connect("dbname=graceangelica user=postgres password=bocahtengil");
        //$conn = pg_connect("host = localhost port = 5433 dbname = kelompok_a04 user = postgres password = h4h4h1h1");
        if(!$conn){
             echo("Error Connecting to The Database");
        }
        return $conn;
    }

    function cekHasilSeleksi($idPendaftaran) {
        $connect = connectDB();
        $command = "SELECT PD.id, P.nama_lengkap, PP.status_lulus FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PELAMAR AS P, SIRIMA.PENDAFTARAN_PRODI AS PP WHERE PP.id_pendaftaran = PD.id AND PD.pelamar = P.username AND PD.id = '$idPendaftaran'";
        $result =  pg_query($connect, $command);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }
        return $result;
    }

    function lihatHasilSeleksiLulus($idPendaftaran) {
        $connect = connectDB();
        $command = "SELECT PD.id, P.nama_lengkap, PP.status_lulus, PS.nama, PD.npm, PS.jenjang, PS.jenis_kelas FROM SIRIMA.PENDAFTARAN AS PD, SIRIMA.PELAMAR AS P, SIRIMA.PENDAFTARAN_PRODI AS PP, SIRIMA.PROGRAM_STUDI AS PS WHERE PP.id_pendaftaran = PD.id AND PD.pelamar = P.username AND PD.id = '$idPendaftaran' AND PS.kode = PP.kode_prodi";
        $result =  pg_query($connect, $command);
        if(!$result) {
            die("Error ouccured while getting query :").pg_last_error();
        }
        return $result;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['command'] === 'Lihat'){
            $_SESSION['id-pendaftaran'] = $_POST['pendaftaran'];
            $result = pg_fetch_row(cekHasilSeleksi($_SESSION['id-pendaftaran']));
            if($result[2] === "t") {
                $result = pg_fetch_row(lihatHasilSeleksiLulus($_SESSION['id-pendaftaran']));
            }
            echo json_encode($result);
        }
    }
?>