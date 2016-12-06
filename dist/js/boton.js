var success = false;
$("button").click(function(){
  $("button").addClass("bounce");
  setTimeout(showMessage, 2000);  
})
function showMessage() {
  if (success == false) {
    $("button").removeClass("bounce");
    $("button").css({ 
      background: "#c0392b",
      transition: "all 0.4 ease"
    });
    $("button").html("ERROR");
    success = true;
    setTimeout(restart, 2000); 
  } else if(success == true) {
    $("button").removeClass("bounce");
    $("button").css({ 
      background: "#2980b9",
      transition: "all 0.4 ease"
    });
    $("button").html("SUCCESS");
    success = false; 
    setTimeout(restart, 2000); 
  }
}
function restart() {
  $("button").html("SEND");
  $("button").css({
    background: "#16a085",
    transition: "all 0.4 ease"
  })
}