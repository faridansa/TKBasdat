$(document).ready(function() {

    $(document).on('click', '#logout-btn', function(){
        $.get('logout.php');
        window.location.href = "index.php";
    });
});
