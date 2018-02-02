<?php 
	function response($body,$code){
		http_response_code($code);
		echo json_encode($body,JSON_PRETTY_PRINT)."\n";
		exit();
	}
	session_start();

	session_destroy();
    response("deslogado",200);
?>