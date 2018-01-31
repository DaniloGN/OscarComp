$(document).ready(function() {
  $("#estatueta_div img").click(function() {
    // $("#cortina").fadeOut(2000);
    $("#cortina").hide();
    // $(".hiden").fadeIn(3500);
    $(".hiden").show();
  });

  $("a").click(function() {
    console.log("fff");
    $("#cortina").animate({height:'0px'});
    $("#texto_cortina").fadeOut(2000);
    $(".hiden").fadeIn(2500);
  })
});
