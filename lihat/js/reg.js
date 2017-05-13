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
            if(uname) {
             sessionStorage.setItem("username", "user");
                window.location.href = "index.html";
                console.log("hihihi");
            } 
 });
});