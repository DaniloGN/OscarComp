<?php
	Class Conexao{
		var $server;
		var $user;
		var $pwd;
		var $bd;
		var $link;
		
		public function _construct(){
		}
		public function Conexao($server,$user,$pwd,$bd){
		$this->server = $server;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->bd = $bd;

		}
		public function conectar(){	
			if(!$this->link){
				$this->link = mysqli_connect($this->server,$this->user,$this->pwd,$this->bd);
				if($this->link){
					echo "Conectado..<br><br>";
				}
				else{
					die("Não conectou".mysqli_error());
				}
			}
		}
		public function getLink(){
			return $this->link;
		}
	}
?>