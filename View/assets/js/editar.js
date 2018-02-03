$(document).ready(function() {
    $('select').material_select();
	Materialize.updateTextFields();

	$("#cancelar").click(function () {
		window.location.href="../View/indexLogado.html";
	});
	var user;
	var tipo;
	$.ajax({
	url: "../Controller/Editar.php",
	type: 'POST',
	data: {},

	  success: function(result) {
	user = jQuery.parseJSON(result);
	$("#email").val(user.email);
	$("#nome").val(user.nome);
	$("#sobrenome").val(user.sobrenome);
	$("#cpf").val(user.cpf);
	$("#rg").val(user.rg);
	$("#genero").val(user.genero);
	$("#nascimento").val(user.nascimento);
	$("#ddd").val(user.ddd);
	$("#telefone").val(user.telefone);
	$("#rua").val(user.rua);
	$("#numero").val(user.numero);
	$("#cidade").val(user.cidade);
	$("#cep").val(user.cep);
	$("#uf").val(user.uf);
	Materialize.updateTextFields();
	  },
	error:function(error){
		window.location.href="../View/index.html";
	}
	});
	$("#editar").click(function () {
		var testevazio = true;
		if(($("#senha").val() == "" && $("#senha_confirmacao").val() == "") || ($("#senha").val() != "" && $("#senha_confirmacao").val() != "")){
		alert("vai se foder");
		testevazio = true;
		}
		else{
		testevazio = false;
		alert("Preencha ambas as senhas");
		}

		if(!$("#email").val() || !$("#nome").val() || !$("#sobrenome").val() || !$("#cpf").val() || !$("#rg").val() || !$("#genero").val() 
		|| !$("#nascimento").val() || !$("#ddd").val() || !$("#telefone").val() || !$("#rua").val() || !$("#numero").val() || !$("#cidade").val() 
		|| !$("#cep").val() || !$("#uf").val()){
			testevazio = false;
		}
	 	var campoEmail = $("#email").val();
	 	var campoSenha = $("#senha").val();
	 	var campoNovaSenha = $("#senha_confirmacao").val();
		var campoNome = $("#nome").val();
		var campoSobrenome = $("#sobrenome").val();
		var campoCpf = $("#cpf").val();
		var campoRg = $("#rg").val();
		var campoGenero = $("#genero").val();
		var campoNascimento = $("#nascimento").val();
		var campoDdd = $("#ddd").val();
		var campoTelefone = $("#telefone").val();
		var campoRua = $("#rua").val();
		var campoNumero = $("#numero").val();
		var campoCidade = $("#cidade").val();
		var campoCep = $("#cep").val();
		var campoUf = $("#uf").val();

		if(testevazio == true){
		  $.ajax({
		      url: "../Controller/ConcluirEditar.php",
		      type: 'POST',
		      data: { 	'tipo' : "editar",
		      			'email' : campoEmail,
						'senha' : campoSenha,
						'novaSenha' : campoNovaSenha,
						'nome' : campoNome,
						'sobrenome' : campoSobrenome,
						'cpf' : campoCpf,
						'rg' : campoRg,
						'genero' : campoGenero,
						'nascimento' : campoNascimento,
						'ddd' : campoDdd,
						'telefone' : campoTelefone,
						'rua' : campoRua,
						'numero' : campoNumero,
						'cidade' : campoCidade,
						'cep' : campoCep,
						'uf' : campoUf },

		      success: function(result) {
		      	console.log(result);
		        window.location.href = "../View/indexLogado.html";
		        },
		        error:function(error){
		        console.log(error);
		        alert("Senha antiga não confere!");
		        }
			});
		}
		return false;
	});
});
