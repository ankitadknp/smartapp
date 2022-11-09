jQuery(document).ready(function () {
    setTimeout(function () {
        $('input').attr('autocomplete', 'off');

        jQuery(".login_email").val("");
        jQuery(".login_password").val("");
    }, 100);
});


$("#show_hide_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
});

$("#show_hide_cpassword a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_cpassword input').attr("type") == "text"){
        $('#show_hide_cpassword input').attr('type', 'password');
        $('#show_hide_cpassword i').addClass( "fa-eye-slash" );
        $('#show_hide_cpassword i').removeClass( "fa-eye" );
    }else if($('#show_hide_cpassword input').attr("type") == "password"){
        $('#show_hide_cpassword input').attr('type', 'text');
        $('#show_hide_cpassword i').removeClass( "fa-eye-slash" );
        $('#show_hide_cpassword i').addClass( "fa-eye" );
    }
});


setTimeout(function (){
    $(".alert").hide();
  }, 3000);
