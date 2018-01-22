<?php
	include("../Model/Cliente.php");
	include("../Persistencia/Conexao.php");
	include("../Persistencia/ClienteDAO.php");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$dao = new ClienteDAO;
	$conexao= new Conexao("localhost","root","","OSCAR_COMP");
	$conexao->conectar();
	echo "<span style=\"color:#FF0000;\"> $texto </span> \n";
?>