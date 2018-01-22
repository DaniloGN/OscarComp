<?php 
class Telefone {
    private $ddd; 
    private $numero; 

	function __construct($ddd,$numero) {
        $this->ddd = $ddd;
        $this->numero = $numero;
   }    
    // function aMemberFunc() { 
    //     print 'Inside `aMemberFunc()`'; 
    // } 
} 
?> 