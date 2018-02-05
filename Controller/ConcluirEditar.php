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
	if($_POST["senha"]!=""){
		$loadSenha = $loginDAO->load("SENHA","where idLOGIN = ".$_SESSION["idLogin"]);
		$testeSenha = mysqli_fetch_array($loadSenha);
		if($testeSenha['SENHA'] == $_POST['senha']){
			$login = new Login($_POST["email"],$_POST["novaSenha"]);
			$updateLogin = $loginDAO->update("SENHA","'".$login->getSenha()."'","idLOGIN =".$_SESSION["idLogin"]);
		}
		else{
			response("senhaErrada",400);
		}
	}

	$inscrito = new Inscrito($_POST["nome"],$_POST["sobrenome"],$_POST["cpf"],$_POST["rg"], $_POST["genero"], $data->dataMY($_POST["nascimento"]));
	$telefone = new Telefone($_POST["ddd"],$_POST["telefone"]);
	$endereco = new Endereco($_POST["rua"], $_POST["numero"], $_POST["cidade"],$_POST["cep"],$_POST["uf"]);

	$updateInscrito = $inscritoDAO->update("P_NOME","'".$inscrito->getNome()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateInscrito = $inscritoDAO->update("S_NOME","'".$inscrito->getSobrenome()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateInscrito = $inscritoDAO->update("SEXO","'".$inscrito->getSexo()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateInscrito = $inscritoDAO->update("DATANASC","'".$inscrito->getNascimento()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);

	$updateTelefone = $telefoneDAO->update("DDD",$telefone->getDdd(),"LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateTelefone = $telefoneDAO->update("NUMERO","'".$telefone->getNumero()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);

	$updateEndereco = $enderecoDAO->update("RUA","'".$endereco->getRua()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateEndereco = $enderecoDAO->update("NUMERO","'".$endereco->getNumero()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateEndereco = $enderecoDAO->update("CIDADE","'".$endereco->getCidade()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateEndereco = $enderecoDAO->update("CEP","'".$endereco->getCep()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);
	$updateEndereco = $enderecoDAO->update("UF","'".$endereco->getUf()."'","LOGIN_idLOGIN =".$_SESSION["idLogin"]);

	$_SESSION["NomeInscrito"]= $inscrito->getNome();

	response("ok",200);
?>