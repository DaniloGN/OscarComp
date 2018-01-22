<?php
	include("../Model/Inscrito.php");
	include("../Model/Login.php");
	include("../Model/Telefone.php");
	include("../Model/Endereco.php");
	include("../Controller/Conexao.php");
	// include("../Controller/CRUD.php");
	$inscrito = new Inscrito()
	
	$nome = $_POST["nome"];
	$sexo =$_POST["sexo"];
	$cpf =$_POST["cpf"];
	$rg =$_POST["rg"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$nascimento = $_POST["nascimento"];
	$endereco = $_POST["endereco"];
	$cidade = $_POST["cidade"];
	$cep = $_POST["cep"];
	$estado = $_POST["estado"];
	




	$conexao= new Conexao("localhost","root","","OSCAR_COMP");
	
?>