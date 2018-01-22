<?php 
class Inscrito { 
    private $nome; 
	private $sobrenome;
	private $cpf ;
	private $rg;
    
    function __construct($nome,$sobrenome,$cpf,$rg) {
    	$this->nome = $nome;
      	$this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->rg = $rg;
   }
    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 