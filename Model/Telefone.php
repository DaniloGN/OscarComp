<?php 
class Telefone {
    private $ddd; 
    private $numero; 

	public function __construct($ddd,$numero) {
        $this->ddd = $ddd;
        $this->numero = $numero;
   } 

   public function getDdd(){
   		return $this->ddd;
   }  

   public function getNumero(){
   		return $this->numero;
   }
    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 