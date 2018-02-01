<?php
	include("./config.php");
	include("./LoginDAO.php");
	include("../Model/Login.php");

	$login = new Login($_POST["email"],$_POST["senha"]);
	
	$con = mysqli_connect($host, $user, $senha, $bd);

	$loginDAO = new LoginDAO($con);
	$inscritoDAO = new InscritoDAO($con);

	$loadLogin = $loginDAO->load("idLOGIN, EMAIL","where EMAIL = '".$login->getEmail()."' and SENHA = '".$login->getSenha()."'");
	$vetor = mysqli_fetch_array($loadLogin, MYSQLI_ASSOC);
	$loadInscrito = $inscritoDAO->load("NOME","where LOGIN_idLOGIN = ".$vetor["idLOGIN"]);
	$vetorInscrito = mysqli_fetch_array($loadInscrito, MYSQLI_ASSOC);
	if($vetor){
		session_start();
		$_SESSION["EmailInscrito"]=$vetor["EMAIL"];
		$_SESSION["NomeInscrito"]=$vetorInscrito["NOME"];
		echo "ok";
	}
	else{
		echo "erro";
	}

?>