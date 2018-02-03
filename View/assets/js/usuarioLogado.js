$(document).ready(function() {
    var user;
	$.ajax({
	url: "../Controller/UsuarioLogado.php",
	type: 'POST',
	data: { },
	  success: function(result) {
	    user = jQuery.parseJSON(result);
	  	$("#logado").html(user.nomeUser);

	  },
	  error:function(error){
	  	window.location.href="../View/index.html";
	  }
	});
});
