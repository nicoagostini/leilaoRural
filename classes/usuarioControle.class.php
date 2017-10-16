<?php
	include_once("usuario.class.php");
	include_once("bd.class.php");
	include_once("controle.class.php");

	class usuarioControle extends controle{

	protected function inserir($obj){return false;}
	protected function deletar($obj){return false;}
	protected function enviarEmail($obj){return false;}
	protected function inserirBuyer($obj){return false;}
	protected function inserirLote($obj){return false;}
	protected function abrir($obj){return false;}
	protected function unico(){return false;}
	protected function selecionarAbertas(){return false;}
	protected function selecionarStatus($obj){return false;}
	protected function verificarLote(){return false;}
	protected function encerrar($obj){return false;}
	protected function recomenda($obj){return false;}

	protected function verificar($usuario){

			$banco = new bd();
			$resultado = $banco->consulta("select * from user where email = '".$usuario->getEmail()."' and senha = '".$usuario->getSenha()."'");
			if(count($resultado) > 0){
				if($resultado[0][1] === $usuario->getEmail() && $resultado[0][2] === $usuario->getSenha());
					return $resultado;

			}
				else{
					return false;
			}
	}

	protected function inserirUsuario($usuario){
			$banco = new bd();
			$id = $banco->executa("INSERT INTO user(email,senha,nome,foto,tipo) VALUES ('".$usuario->getEmail()."','".$usuario->getSenha()."','".$usuario->getNome()."','".$usuario->getFoto()."','admin')");
	}

	protected function selecionarUm($obj){
		$banco = new bd();
		$user = $banco->consulta("SELECT * FROM user WHERE iduser ='".$obj."'");
		return $user;
	}

	protected function selecionarTodos(){
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM user WHERE tipo = 'admin'");
		return $todos;
	}

	protected function alterar($obj){
		$banco = new bd();
		$banco->executa("UPDATE user SET email = '".$obj->getEmail()."', senha = '".$obj->getSenha()."', nome = '".$obj->getNome()."', foto = '".$obj->getFoto()."' WHERE iduser = '".$obj->getIdUsuario()."'");
		session_start();
		$_SESSION['user'] = serialize($obj);
	}

	protected function destroy(){
		session_start();
		session_destroy();
		header("location:index.php");
	}

	protected function apagar($obj){
		$banco = new bd();
		$banco->executa("DELETE FROM user WHERE iduser='".$obj."'");
	}

	protected function apagarBuyer($obj){
		$banco = new bd();
		$banco->executa("DELETE FROM user WHERE iduser='".$obj->getIdUsuario()."'");
		$banco->executa("DELETE FROM buyer WHERE idbuyer='".$obj->getIdBuyer()."'");
	}

	public function verificaEmail($obj){
		$banco = new bd();
		$user = $banco->consulta("SELECT * FROM user WHERE email ='".$obj."'");
		return $user;
	}

}