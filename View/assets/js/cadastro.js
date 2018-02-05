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

$("#cancelar").click(function () {
	window.location.href="../View/index.html";
});

$("#cadastrar").click(function()
{	
	cpf = $("#cpf").val();
	data = $("#nascimento").val();
	telefone = $("#telefone").val();
	cep = $("#cep").val();
	ddd = $("#ddd").val();

	var testevazio = true;
	if($("#senha").val() != $("#senha_confirmacao").val()){
		testevazio = false;
		Materialize.toast('Senhas não são iguais!', 1500, 'rounded red');
	}

	if(!$("#email").val() || !$("#senha").val() || !$("#nome").val() || !$("#sobrenome").val() || !$("#cpf").val() || !$("#rg").val() || !$("#genero").val() 
	|| !$("#nascimento").val() || !$("#ddd").val() || !$("#telefone").val() || !$("#rua").val() || !$("#numero").val() || !$("#cidade").val() 
	|| !$("#cep").val() || !$("#uf").val()){
		Materialize.toast('Preencha todos os campos!', 1500, 'rounded red');
		testevazio = false;
	}

	else if ($("#email").val().indexOf("@") == -1 ||
      $("#email").val().indexOf(".") == -1 ||
      $("#email").val() == "" ||
      $("#email").val() == null) {
      	testevazio = false;
      	Materialize.toast('Por favor, indique um e-mail válido!', 1500, 'rounded red');
        $("#email").focus();

    } 
    
    else if(cpf.length < 11){
    	testevazio = false;
    	Materialize.toast('CPF inválido!', 1500, 'rounded red');
    }


    else if(data.length < 10){
    	testevazio = false;
    	Materialize.toast('Data de nascimento inválida!', 1500, 'rounded red');
    }

    else if(telefone.length < 10){
    	testevazio = false;
    	Materialize.toast('Telefone inválido!', 1500, 'rounded red');
    }
	else if(cep.length < 9){
	testevazio = false;
	Materialize.toast('CEP inválido!', 1500, 'rounded red');
	}
	else if(ddd.length < 2){
    	testevazio = false;
    	Materialize.toast('DDD inválido!', 1500, 'rounded red');
    }


 	var campoEmail = $("#email").val();
 	var campoSenha = $("#senha").val();
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
	      url: "../Controller/Inscricao.php",
	      type: 'POST',
	      data: { 	'email' : campoEmail,
					'senha' : campoSenha,
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
	          window.location.href = "../View/indexLogado.html";
	          user = jQuery.parseJSON(result);
	  		$("#logado").html(user.nomeUser);
	        },
	        error:function(error){
	       	if ( error.responseText.trim() == "email")
	        {
	        	Materialize.toast('Email já utilizado!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "cpf")
	        {
	        	Materialize.toast('CPF já utilizado!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "rg")
	        {
	        	Materialize.toast('RG já utilizado!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "email+cpf")
	        {
	       		Materialize.toast('Email e CPF já utilizados!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "email+rg")
	        {
	        	Materialize.toast('Email e RG já utilizados!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "rg+cpf")
	        {
	        	Materialize.toast('RG e CPF já utilizados!', 1500, 'rounded red');
	        }
	        if ( error.responseText.trim() == "email+cpf+rg")
	        {
	    	   Materialize.toast('Email,CPF e RG já utilizados!', 1500, 'rounded red');
	        }
	      
	        }
	        
	  	});
	}
	return false;});
});
