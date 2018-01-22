<?php
	include("../Model/Inscrito.php");
	include("../Model/Login.php");
	include("../Model/Telefone.php");
	include("../Model/Endereco.php");
	include("../Controller/Conexao.php");
	include("../Controller/CRUD.php");

	$inscrito = new Inscrito($_POST["nome"],$_POST["sobrenome"],$_POST["cpf"],$_POST["rg"], $_POST["sexo"], $_POST["nascimento"]);
	$login = new Login($_POST["email"],$_POST["senha"]);
	$telefone = new Telefone$_POST["ddd"],$_POST["telefone"]);
	$endereco = new Endereco($_POST["rua"], $_POST["numero"], $_POST["cidade"],$_POST["cep"],$_POST["uf"]);

	$conexao= new Conexao("localhost","root","","OSCAR_COMP");
	
?>