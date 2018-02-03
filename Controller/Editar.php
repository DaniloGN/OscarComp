<?php
	include("./config.php");
	include("./InscritoDAO.php");
	include("./TelefoneDAO.php");
	include("./EnderecoDAO.php");
	include("./LoginDAO.php");
	include("../Model/Inscrito.php");
	include("../Model/Telefone.php");
	include("../Model/Endereco.php");
	include("../Model/Login.php");
	include("../Controller/ConversaoData.php");

	function response($body,$code){
		http_response_code($code);
		echo json_encode($body,JSON_PRETTY_PRINT)."\n";
		exit();
	}

	$data = new Data();	
	$con = mysqli_connect($host, $user, $senha, $bd);
	session_start();
	if(!isset($_SESSION["idLogin"])){
		response("error",400);
	}
	$loginDAO = new LoginDAO($con);
	$inscritoDAO = new InscritoDAO($con);
	$telefoneDAO = new TelefoneDAO($con);
	$enderecoDAO = new EnderecoDAO($con);

		$loadInscrito = $inscritoDAO->load("*","where LOGIN_idLOGIN = ".$_SESSION["idLogin"]);
		$testeInscrito = mysqli_fetch_array($loadInscrito);

		$loadTelefone = $telefoneDAO->load("*","where LOGIN_idLOGIN = ".$_SESSION["idLogin"]);
		$testeTelefone = mysqli_fetch_array($loadTelefone);

		$loadEndereco = $enderecoDAO->load("*","where LOGIN_idLOGIN = ".$_SESSION["idLogin"]);
		$testeEndereco = mysqli_fetch_array($loadEndereco);

		$user = array('nome' =>$testeInscrito["P_NOME"] , 'sobrenome' =>$testeInscrito["S_NOME"], 'nascimento' =>$data->dataBR($testeInscrito["DATANASC"]) , 'genero' =>$testeInscrito["SEXO"] , 'rg' =>$testeInscrito["RG"], 'cpf' =>$testeInscrito["CPF"] , 'rua' =>$testeEndereco["RUA"] , 'numero' =>$testeEndereco["NUMERO"] , 'cidade' =>$testeEndereco["CIDADE"] , 'cep' =>$testeEndereco["CEP"] , 'uf' =>$testeEndereco["UF"] , 'ddd' =>$testeTelefone["DDD"], 'telefone' =>$testeTelefone["NUMERO"], 'email' => $_SESSION["EmailInscrito"]);
		response($user,200);	

?>