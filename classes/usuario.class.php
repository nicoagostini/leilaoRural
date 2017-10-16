<?php
	class usuario {
		private $idUser;
		private $nome;
		private $email;
		private $senha;
		private $tipo;
		private $foto;

		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($id){
			$this->idUsuario = $id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$nomeC = filter_var($nome, FILTER_SANITIZE_STRING);
			$this->nome = $nomeC;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$emailC = filter_var($email, FILTER_SANITIZE_EMAIL);
			$this->email = $emailC;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$senhaC =  filter_var ( $senha, FILTER_SANITIZE_STRING);
			$this->senha = $senhaC;
		}
		public function getTipo(){
			return $this->tipo;
		}
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
		public function getFoto(){
			return $this->foto;
		}
		public function setFoto($foto){
			$this->foto = $foto;
		}
	}
?>