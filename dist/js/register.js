$(function() {
       
    
});

//**************FORM: register.php**************
$('#btn_register_cancel').click(function(){
    //alert('funciona!');
    logout();
});

//**************FORM: register.php**************
$('#btn_register_register').click(function(){
    //alert('funciona!');
    register();
});

function logout() {
     
        $.ajax({
            url: '../../dist/services.php',
            type: 'post',
            dataType: 'json',
            data: {
                option  : 'log_out'
            },
            
            success: function (data, status) {
                //alert(data.message);
                if (data.message == 'todook') {
                    window.location.replace("../../index.html");
                }
            },
        });     
}

function register() {
     
    var email       = $("#register_email").val();
    var admin_name  = $("#register_admin_name").val();
    var pass1       = $("#register_pass").val();
    var pass2       = $("#register_confirm_pass").val();
    
        $.ajax({
            url: '../../dist/services.php',
            type: 'post',
            dataType: 'json',
            data: {
                option  : 'register',
                email,
                admin_name,
                pass1,
                pass2
            },
            
            success: function (data, status) {
                //alert(data.message);
                if (data.message == 'todook') {
                    alert("Registro completado con exito!");
                    window.location.replace("../../index.html");
                }else{
                    alert("ERROR: " + data.error);
                    window.location.replace("register.php");
                }
            },
        });     
}