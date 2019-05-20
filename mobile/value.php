<?php
	
	class value{
		private $email;
		private $nome;
		private $foto;
		private $nasc;
		
		
		public function __construct($email='', $nome='', $foto='', $nasc=''){
			$this->email = $email;
			$this->nome = $nome;
			$this->foto = $foto;
			$this->nasc = $nasc;
		}
		
		public function setEmail($email){
			$this->marca = $email;
		}
		
		public function setNome($nome){
		$this->marca = $nome;
		}		
		
		public function setFoto($foto){
		$this->modelo = $foto;
		}
		
		public function setNasc($nasc){
			$this->modelo = $nasc;
		}
		
		public function getDataJSON(){
			$aux = array(
				'email'=>$this->marca,
				'nome'=>$this->modelo,
				'foto'=>$this->foto,
				'nasc'=>$this->nasc;
			
			return($aux);
		}
	}
?>