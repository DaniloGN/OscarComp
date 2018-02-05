$(document).ready(function() {

	$(".button-colapse").sideNav();
    var user;
	$.ajax({
	url: "../Controller/UsuarioLogado.php",
	type: 'POST',
	data: { },
	  success: function(result) {
	    user = jQuery.parseJSON(result);
	  	$("#logado").html(user.nomeUser + '<i class="material-icons right">arrow_drop_down</i>');

	  },
	  error:function(error){
	  	window.location.href="../View/index.html";
	  }
	});
});
