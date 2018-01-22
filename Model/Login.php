<?php 
class Endereco { 
    private $email; 
	private $senha;

	function __construct($email,$senha) {
       $this->email = $email;
       $this->senha = $senha;
   }
}
?>