$(document).ready(function() {
    $(document).on('click', '#register-btn', function(event){
    	event.preventDefault();
        $('#submit_handle').click();
        var uname = $("#username").val();
        var pass = $("#password").val();
        var cpass = $("#confirmpassword").val();
        var fname = $("#fullname").val();
        var id = $("#idnumber").val();
        var gender = $("#gender").val();
        var bdate = $("#birthdate").val();
        var addr = $("#address").val();
        var email = $("#email").val();       
        var cemail = $("#confirmemail").val();
        var test = (email !== "" && cemail !== "");
        var test1 = (gender !== "");
        var test2 = (bdate !== "");
        var test3 = (gender !== "" && bdate !== "");

        if(uname && pass && fname && id) {
        	if(test && test1 && test2) {
        		sessionStorage.setItem("username", uname);
              sessionStorage.setItem("nama", fname);
              var form = $("#login-form");
              form.submit();
          }
          
      } 
  });
});