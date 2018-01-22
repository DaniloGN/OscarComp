<?php 
class Inscrito { 
    private $nome; 
	private $sobrenome;
	private $cpf ;
	private $rg;
    private $sexo;
    private $nascimento;
    
    public function __construct($nome,$sobrenome,$cpf,$rg,$sexo,$nascimento) {
    	$this->nome = $nome;
      	$this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->sexo = $sexo;
        $this->nascimento = $nascimento;
   }

   public function getNome(){
        return $this->nome;
   }

   public function getSobrenome(){
        return $this->sobrenome;
   }

   public function getCpf(){
        return $this->cpf;
   }

   public function getRg(){
        return $this->rg;
   }

   public function getSexo(){
        return $this->sexo;
   }

   public function getNascimento(){
        return $this->nascimento;
   }



    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 