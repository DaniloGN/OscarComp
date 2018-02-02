$(document).ready(function() {
    $('select').material_select();

	$("#cancelar").click(function () {
		window.location.href="../View/index.html";
	});
	
	var id = $_SESSION["idLOGIN"];

	$.ajax({
	url: "../Controller/Inscricao.php",
	type: 'POST',
	data: { 	'idLOGIN' : Id},

	  success: function(result) {
	     ;
	  }
	});
	$("#email").val();
 	$("#senha").val();
	$("#nome").val();
	$("#sobrenome").val();
	$("#cpf").val();
	$("#rg").val();
	$("#genero").val();
	$("#nascimento").val();
	$("#ddd").val();
	$("#telefone").val();
	$("#rua").val();
	$("#numero").val();
	$("#cidade").val();
	$("#cep").val();
	$("#uf").val();
});
