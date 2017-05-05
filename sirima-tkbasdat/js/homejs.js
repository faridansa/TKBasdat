$(document).ready(function() {
	 if(sessionStorage.getItem("username") === "admin") {
        $("#login-reg-nav").remove();
        var logout = "<li><a href= \"#\" id= \"logout-btn\">Log Out</a></li>";
        var pageadmin = "<li class=\"dropdown\"><a href=\"#\">Laman Admin <i class=\"fa fa-angle-down\"></i></a> <ul role=\"menu\" class=\"sub-menu\"><li><a href= \"form_rekapJenjang.php\">Rekap Pendaftaran</a></li><li><a href= \"form_rekapProdi.php\">Daftar Pelamar</a></li></ul></li>";
        var greetings = "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-info fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>Selamat datang, Admin!</p></div></div>";
        $("#for-alert").append(greetings);
        $("#ul-nav-bar").append(pageadmin);
        $("#ul-nav-bar").append(logout);

    } else if (sessionStorage.getItem("username") === "user") {
        $("#login-reg-nav").remove();
        var logout = "<li><a href= \"#\" id= \"logout-btn\">Log Out</a></li>";
        var pageuser = "<li class=\"dropdown\"><a href=\"#\">Informasi SIRIMA <i class=\"fa fa-angle-down\"></i></a> <ul role=\"menu\" class=\"sub-menu\"><li> <a href= \"link-buat-pendaftaran\">Buat Pendaftaran</a> </li><li> <a href= \"riwayatdaftar.html\">Riwayat Pendaftaran</a></li><li> <a href= \"kartuujian.html\">Kartu Ujian</a> </li><li> <a href= \"link-hasil-seleksi\">Hasil Seleksi</a> </li><li>";
        var greetings = "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-info fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>Selamat datang, Grace Angelica!</p></div></div>";
        $("#for-alert").append(greetings);
        $("#ul-nav-bar").append(pageuser);
        $("#ul-nav-bar").append(logout);
    }

    $(document).on('click', '#logout-btn', function(){
        sessionStorage.clear();
        window.location.href = "index.html";
    });
});

// coba find (ctrl+f) "link-rekap-pendaftaran", "link-daftar-pelamar", "link-hasil-seleksi",
// "link-buat-pendaftaran" (tanpa tanda kutip) terus kalo ketemu tinggal di replace sama link page nya