$(function() {
    
        
    
});

$('input[type="submit"]').click(function(){
  $('.login').addClass('test')
  setTimeout(function(){
    $('.login').addClass('testtwo')
  },300);
  setTimeout(function(){
    $(".authent").show().animate({right:-320},{easing : 'easeOutQuint' ,duration: 600, queue: false });
    $(".authent").animate({opacity: 1},{duration: 200, queue: false }).addClass('visible');
  },500);
  setTimeout(function(){
    $(".authent").show().animate({right:90},{easing : 'easeOutQuint' ,duration: 600, queue: false });
    $(".authent").animate({opacity: 0},{duration: 200, queue: false }).addClass('visible');
    $('.login').removeClass('testtwo')
  },2500);
  setTimeout(function(){
    $('.login').removeClass('test')
    $('.login div').fadeOut(123);
  },2800);
    
    login();
   
});


function login() {
        var user  = $("#user").val();
        //alert(user);
        var pass  = $("#pass").val();
        //alert(pass);
        
        $.ajax({
            url: 'dist/services.php',
            type: 'post',
            dataType: 'json',
            data: {
                option  : 'log_in',
                //rosterId: $("#rosterId").val(),
                user,
                pass
            },
            
            success: function (data, status) {
                //alert(data.message);
                if (data.message == 'todook') {
                         setTimeout(function(){
                             $('.success').fadeIn();  
                        },2800);
    
                        setTimeout(function(){
                            window.location.replace("pages/production/one.php");
                        },4800);
                } else {
                     setTimeout(function(){
                             $('.nosuccess').fadeIn();  
                        },2800);
                }
            },
        });     
}


$('input[type="text"],input[type="password"]').focus(function(){
  $(this).prev().animate({'opacity':'1'},200)
});
$('input[type="text"],input[type="password"]').blur(function(){
  $(this).prev().animate({'opacity':'.5'},200)
});

$('input[type="text"],input[type="password"]').keyup(function(){
  if(!$(this).val() == ''){
    $(this).next().animate({'opacity':'1','right' : '30'},200)
  } else {
    $(this).next().animate({'opacity':'0','right' : '20'},200)
  }
});

var open = 0;
$('.tab').click(function(){
  $(this).fadeOut(200,function(){
    $(this).parent().animate({'left':'0'})
  });
});