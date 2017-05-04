$(document).ready(function() {
	 if(sessionStorage.getItem("username") === "admin") {
        $("#login-nav").remove();
        $("#register-nav").remove();
        var rekap = "<li> <a href= \"#\">Rekap Pendaftaran</a> </li>";
        var daftarpelamar = "<li><a href= \"#\">Daftar Pelamar</a></li>";
        var logout = "<ul class=\"nav navbar-nav navbar-right\"><li> <a <a href= \"#\" id= \"logout-btn\">Log Out</a></li></ul>";
        $("#ul-nav").append(rekap);
        $("#ul-nav").append(daftarpelamar);
        $("#ul-nav").append(logout);

    } else if (sessionStorage.getItem("username") === "user") {
        $("#login-nav").remove();
        $("#register-nav").remove();
        var buat = "<li> <a href= \"#\">Buat Pendaftaran</a> </li>";
        var riwayat = "<li> <a href= \"#\">Riwayat Pendaftaran</a></li>";
        var kartu = "<li> <a href= \"#\">Kartu Ujian</a> </li>";
        var seleksi = "<li> <a href= \"#\">Hasil Seleksi</a> </li>";
        var logout = "<ul class=\"nav navbar-nav navbar-right\"><li> <a <a href= \"#\" id= \"logout-btn\">Log Out</a></li></ul>";
        $("#ul-nav").append(buat);
        $("#ul-nav").append(riwayat);
        $("#ul-nav").append(kartu);
        $("#ul-nav").append(seleksi);
        $("#ul-nav").append(logout);
    }

    $(document).on('click', '#logout-btn', function(){
        sessionStorage.clear();
        window.location.href = "index.html";
    });
});