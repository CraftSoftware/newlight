$(function() {
       
    
});



//**************FORM: one.php*******************
$('#step1').click(function(){
    //alert('felicitaciones!');

    $(".step1").fadeOut("1000");

    setTimeout(function(){
        $(".step2").fadeIn("1000");
    },700);
    
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