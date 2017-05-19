$(document).ready(function() {
    $("#btn-login").click(function(){
    if (sessionStorage.getItem("username") === null) {
        $("#login").submit(function() {
            var unInput = $("#username").val();
            var passInput = $("#key").val();
            var found = false;
                if (unInput == "admin" && passInput == "iniadmin" || unInput == "user" && passInput == "iniuser") {
                    found = true;
                }
            if (found) {
                sessionStorage.setItem("username", unInput);
                window.location.href = "index.html";
                return false;
            } else {
            var greetings = "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-danger fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>Username atau password salah</p></div></div>";
            $("#for-alert").append(greetings);   
            }
        });
        } else {
            window.location.href = "index.html";
        }
    });

});
