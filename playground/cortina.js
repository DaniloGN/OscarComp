// cortina.js

$(document).ready(function() {
	console.log(`width: ${$(window).width()}`);

	$(".cortina").click(function() {
		$("#l").animate({width:'0px'});
		$("#r").animate({width:'0px'});
		$("#a").fadeOut(2000);
		$("#text").fadeIn(3500);
	})

	$("h1").click(function() {
	})
});
