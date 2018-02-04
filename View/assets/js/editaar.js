$(document).ready(function() {
    $('select').material_select();
	Materialize.updateTextFields();

	$("#cancelar").click(function () {
		window.location.href="../View/indexLogado.html";
	});
	var user;
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
		data = $("#nascimento").val();
		telefone = $("#telefone").val();
		var testevazio = true;
		if(($("#senha").val() == "" && $("#senha_confirmacao").val() == "") || ($("#senha").val() != "" && $("#senha_confirmacao").val() != "")){
		testevazio = true;
		}
		else{
		testevazio = false;
		Materialize.toast('Preencha ambas as senhas', 1500, 'rounded red');
		}

		if(!$("#email").val() || !$("#nome").val() || !$("#sobrenome").val() || !$("#cpf").val() || !$("#rg").val() || !$("#genero").val() 
		|| !$("#nascimento").val() || !$("#ddd").val() || !$("#telefone").val() || !$("#rua").val() || !$("#numero").val() || !$("#cidade").val() 
		|| !$("#cep").val() || !$("#uf").val()){
			testevazio = false;
			Materialize.toast('Preencha todos os campos!', 1500, 'rounded red');
		}
		else if(data.length < 10){
    	testevazio = false;
    	Materialize.toast('Data de nascimento inválida!', 1500, 'rounded red');
    	}

    	else if(telefone.length < 10){
    	testevazio = false;
    	Materialize.toast('Telefone inválido!', 1500, 'rounded red');
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
