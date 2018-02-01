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

	$data = new Data();
	$inscrito = new Inscrito($_POST["nome"],$_POST["sobrenome"],$_POST["cpf"],$_POST["rg"], $_POST["genero"], $data->dataMY($_POST["nascimento"]));
	$login = new Login($_POST["email"],$_POST["senha"]);
	$telefone = new Telefone($_POST["ddd"],$_POST["telefone"]);
	$endereco = new Endereco($_POST["rua"], $_POST["numero"], $_POST["cidade"],$_POST["cep"],$_POST["uf"]);
	
	$con = mysqli_connect($host, $user, $senha, $bd);

	$loginDAO = new LoginDAO($con);
	$inscritoDAO = new InscritoDAO($con);
	$telefoneDAO = new TelefoneDAO($con);
	$enderecoDAO = new EnderecoDAO($con);


	$fields = "EMAIL,SENHA";
	$params = ("'".$login->getEmail()."','".$login->getSenha()."'");
	$insert = $loginDAO->insert($fields,$params);
	if($insert){
		echo "OK!<br>\n";
	}
	$load = $loginDAO->load("idLOGIN","where EMAIL = '".$login->getEmail()."'");
	$vetor = mysqli_fetch_array($load, MYSQLI_ASSOC);

	$fields = "P_NOME,S_NOME,CPF,RG,SEXO,DATANASC,LOGIN_idLOGIN";
	$params = ("'".$inscrito->getNome()."','".$inscrito->getSobrenome()."','".$inscrito->getCpf()."','".$inscrito->getRg()."','".$inscrito->getSexo()."','".$inscrito->getNascimento()."',".$vetor['idLOGIN']);
	$insert = $inscritoDAO->insert($fields,$params);
	if($insert){
		echo "OK!<br>\n";
	}
	$fields = "DDD,NUMERO,LOGIN_idLOGIN";
	$params = ($telefone->getDdd().",'".$telefone->getNumero()."',".$vetor['idLOGIN']);
	$insert = $telefoneDAO->insert($fields,$params);
	if($insert){
		echo "OK!<br>\n";
	}
	$fields = "RUA,NUMERO,CIDADE,CEP,UF,LOGIN_idLOGIN";
	$params = ("'".$endereco->getRua()."',".$endereco->getNumero().",'".$endereco->getCidade()."',".$endereco->getCep().",'".$endereco->getUf()."',".$vetor['idLOGIN']);
	$insert = $enderecoDAO->insert($fields,$params);
	if($insert){
		echo "OK!<br>\n";
	}
	?>