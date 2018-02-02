<?php
include("./config.php");
include("./LoginDAO.php");
include("./InscritoDAO.php");
include("../Model/Login.php");


function response($body,$code){
	http_response_code($code);
	echo json_encode($body,JSON_PRETTY_PRINT)."\n";
	exit();
}

$login = new Login($_POST["email"],$_POST["senha"]);

$con = mysqli_connect($host, $user, $senha, $bd);

$loginDAO = new LoginDAO($con);
$inscritoDAO = new InscritoDAO($con);

$loadLogin = $loginDAO->load("idLOGIN, EMAIL","where EMAIL = '".$login->getEmail()."' and SENHA = '".$login->getSenha()."'");
$vetor = mysqli_fetch_array($loadLogin, MYSQLI_ASSOC);

if($vetor){
	$loadInscrito = $inscritoDAO->load("P_NOME","where LOGIN_idLOGIN = ".$vetor["idLOGIN"]);
	$vetorInscrito = mysqli_fetch_array($loadInscrito, MYSQLI_ASSOC);
	session_start();
	$_SESSION["idLogin"]=$vetor["idLOGIN"];
	$_SESSION["EmailInscrito"]=$vetor["EMAIL"];
	$_SESSION["NomeInscrito"]=$vetorInscrito["P_NOME"];
	response("ok",200);
}
else{
	response("erro",400);
}

?>
