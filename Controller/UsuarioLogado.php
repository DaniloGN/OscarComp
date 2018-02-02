<?php 
	function response($body,$code){
		http_response_code($code);
		echo json_encode($body,JSON_PRETTY_PRINT)."\n";
		exit();
	}
    session_start(); 
    if(!isset($_SESSION["idLogin"])){
    		response('erro',400);
    }
    $user = array('nomeUser' => $_SESSION["NomeInscrito"], 'idUser' => $_SESSION["idLogin"]);
    response($user,200)
?>