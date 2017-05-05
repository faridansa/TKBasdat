$(document).ready(function() {
    $(document).on('click', '#register-btn', function(){
        var uname = $("#username").val();
        var pass = $("#password").val();
        var cpass = $("#confirmpassword").val();
        var fname = $("#fullname").val();
        var birth = $("#birthdate").val();
        var addr = $("#address").val();
        var email = $("#email").val();
        var cemail = $("#confirmemail").val();
            if(!uname || !pass || !cpass || !fname || !idn || !birth || !addr || !email || !cemail) {
                var greetings = "<div class=\"col-md-4 col-md-offset-4\"><div class=\"alert alert-danger fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button><p>Form harus diisi</p></div></div>";
                $("#for-alert").append(greetings);  
                 console.log("hehehe");
             } else {
                sessionStorage.setItem("username", "user");
                window.location.href = "index.html";
                console.log("hihihi");
             }
 });
});