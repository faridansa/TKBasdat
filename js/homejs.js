$(document).ready(function() {
	 if(sessionStorage.getItem("username") === "admin") {
        $("#login-reg-nav").remove();
        var logout = "<li><a href= \"#\" id= \"logout-btn\">Log Out</a></li>";
        var pageadmin = "<li class=\"dropdown\"><a href=\"#\">Laman <i class=\"fa fa-angle-down\"></i></a> <ul role=\"menu\" class=\"sub-menu\"><li> <a href= \"#\">Rekap Pendaftaran</a> </li><li><a href= \"#\">Daftar Pelamar</a></li></ul></li>";
        var greetings = "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-info fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>Selamat datang, Admin!</p></div></div>";
        $("#for-alert").append(greetings);
        $("#ul-nav-bar").append(pageadmin);
        $("#ul-nav-bar").append(logout);

    } else if (sessionStorage.getItem("username") === "user") {
        $("#login-reg-nav").remove();
        var logout = "<li><a href= \"#\" id= \"logout-btn\">Log Out</a></li>";
        var pageuser = "<li class=\"dropdown\"><a href=\"#\">Laman <i class=\"fa fa-angle-down\"></i></a> <ul role=\"menu\" class=\"sub-menu\"><li> <a href= \"#\">Buat Pendaftaran</a> </li><li> <a href= \"#\">Riwayat Pendaftaran</a></li><li> <a href= \"#\">Kartu Ujian</a> </li><li> <a href= \"#\">Hasil Seleksi</a> </li><li>";
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