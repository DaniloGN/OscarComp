<?php 
class Endereco { 
    private $rua; 
    private $numero; 
	private $cidade;
	private $cep;
	private $uf;

    public function __construct($rua,$numero,$cidade,$cep,$uf) {
       $this->rua = $rua;
       $this->numero = $numero;
       $this->cidade = $cidade;
       $this->cep = $cep;
       $this->uf = $uf;
   }

    public function getRua(){
      return $this->rua;
    }

    public function getNumero(){
      return $this->numero;
    }

    public function getCidade(){
      return $this->cidade;
    }

    public function getCep(){
      return $this->cep;
    }

    public function getUf(){
      return $this->uf;
    }


    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 