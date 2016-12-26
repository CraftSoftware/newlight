$(function() {
       
    
});

//**************FORM: profile_nav.php***********
$('#btn_sign_out').click(function(){
    //alert('funciona!');
    logout();
});


//**************FORM: one.php*******************
$('#step1').click(function(){
    alert('felicitaciones!');
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