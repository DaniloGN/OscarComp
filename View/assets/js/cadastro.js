$(window).scroll(function(){
	if ($(window).scrollTop() > 650) {
		$(".mudar").addClass("teste");
		$(".brand-logo > img").removeClass("imagem_logo");
	}
	else if ($(window).scrollTop() < 650){
		$(".mudar").removeClass("teste");
		$(".brand-logo > img").addClass("imagem_logo");
	};
});

$(document).ready(function() {
    $('select').material_select();
  });
