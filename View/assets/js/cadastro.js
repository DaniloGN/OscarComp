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
	var testevazio = true;
	if(!$("#email").val() || !$("#senha").val() || !$("#nome").val() || !$("#sobrenome").val() || !$("#cpf").val() || !$("#rg").val() || !$("#genero").val() 
	|| !$("#nascimento").val() || !$("#ddd").val() || !$("#telefone").val() || !$("#rua").val() || !$("#numero").val() || !$("#cidade").val() 
	|| !$("#cep").val() || !$("#uf").val()){
		testevazio = false;
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
	          window.location.href = "../View/index.html";
	        },
	        error:function(error){
	       	if ( error.responseText.trim() == "email")
	        {
	        	alert('Email já utilizado');
	        }
	        if ( error.responseText.trim() == "cpf")
	        {
	        	alert('CPF já utilizado');
	        }
	        if ( error.responseText.trim() == "rg")
	        {
	        	alert('RG já utilizado');
	        }
	        if ( error.responseText.trim() == "email+cpf")
	        {
	        	alert('Email e CPF já utilizado');
	        }
	        if ( error.responseText.trim() == "email+rg")
	        {
	        	alert('Email e RG já utilizado');
	        }
	        if ( error.responseText.trim() == "rg+cpf")
	        {
	        	alert('CPF e RG já utilizado');
	        }
	        if ( error.responseText.trim() == "email+cpf+rg")
	        {
	        	alert('Email, CPF e RG já utilizado');
	        }
	      
	        }
	        
	  	});
	}
	return false;});
});

