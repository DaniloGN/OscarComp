$(document).ready(function() {
	$("#sair").click(function(){
		$.ajax({
		url: "../Controller/Logout.php",
		type: 'POST',
		data: { },
		  success: function(result) {
		  	$("#logado").html("");
		  	window.location.href="../View/index.html";
		  }
		});
	});
});
