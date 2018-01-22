<?php 
class Endereco { 
    private $rua; 
    private $numero; 
	private $cidade;
	private $cep;
	private $uf;

    function __construct($rua,$numero,$cidade,$cep,$uf) {
       $this->rua = $rua;
       $this->numero = $numero;
       $this->cidade = $cidade;
       $this->cep = $cep;
        $this->uf = $uf;
   }
    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 