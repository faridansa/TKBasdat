$(document).ready(function() {
    $(document).on('click', '#register-btn', function(){
        var uname = $("#username").val();
        var pass = $("#password").val();

        if(uname && pass) {
        sessionStorage.setItem("username", "user");
        window.location.href = "index.html";
     } 
 });
});