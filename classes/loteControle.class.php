<?php

	include_once("lote.class.php");
	include_once("bd.class.php");
	include_once("controle.class.php");
	include_once("mail.class.php");

	class loteControle extends controle{

	protected function inserir($obj){return false;}
	protected function deletar($obj){return false;}
	protected function enviarEmail($obj){return false;}
	protected function verificar($obj){return false;}
	protected function inserirUsuario($obj){return false;}
	protected function inserirBuyer($obj){return false;}
	protected function destroy(){return false;}
	protected function apagarBuyer($obj){return false;}
	protected function verificaEmail($obj){return false;}
	protected function recomenda($obj){return false;}


	public function inserirLote($lote){
			$banco = new bd();
			$banco->executa("INSERT INTO lote(nome, descricao, encerramento, lote, valorMin, foto1, foto2, foto3, foto4, foto5, status, categoria, lance, vencedor) VALUES ('".$lote->getNome()."','".$lote->getDescricao()."','".$lote->getEncerramento()."','".$lote->getLote()."','".$lote->getValorMin()."','".$lote->getFoto1()."','".$lote->getFoto2()."','".$lote->getFoto3()."','".$lote->getFoto4()."','".$lote->getFoto5()."','Criada', '".$lote->getCategoria()."', '".$lote->getLance()."', '')");
	}

	public function selecionarUm($obj){
		$banco = new bd();
		$lote = $banco->consulta("SELECT * FROM lote WHERE idlote ='".$obj."'");
		return $lote;
	}

	public function selecionarTodos(){
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM lote");
		return $todos;
	}

	public function selecionarStatus($obj){
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM lote WHERE status = '".$obj."'");
		return $todos;
	}

	public function selecionarAbertas(){
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM lote WHERE status != 'Criada'");
		return $todos;
	}

	protected function abrir($obj){
		$banco = new bd();
		$banco->executa("UPDATE lote SET status = 'Aberta' WHERE idlote = '".$obj."'");
	}

	protected function alterar($obj){
		$banco = new bd();
		$banco->executa("UPDATE lote SET nome = '".$obj->getNome()."', descricao = '".$obj->getDescricao()."', encerramento = '".$obj->getEncerramento()."', lote = '".$obj->getLote()."', valorMin = '".$obj->getValorMin()."', foto1 = '".$obj->getFoto1()."', foto2 = '".$obj->getFoto2()."', foto3 = '".$obj->getFoto3()."', foto4 = '".$obj->getFoto4()."', foto5 = '".$obj->getFoto5()."', categoria = '".$obj->getCategoria()."' WHERE idlote = '".$obj->getIdLote()."'");
	}
	protected function unico(){
		$str = "AaBbCcDdEeFf1234567890ghijlm";
		$codigo = str_shuffle($str);
		return $codigo;
	}

	protected function apagar($obj){
		$banco = new bd();
		$banco->executa("DELETE FROM lote WHERE idlote='".$obj."'");
	}

	protected function encerrar($obj){
		$banco = new bd();
		$banco->executa("UPDATE lote SET status = 'Encerrada' WHERE idlote = '".$obj."'");
	}

	protected function verificarLote(){
		date_default_timezone_set('America/Sao_Paulo');
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM lote WHERE status != 'Encerrada'");
		$today = date("Y-m-d");
		foreach($todos as $uma){
			if($uma[3] == $today){				
				$this->encerrar($uma[0]);
				return "Encerrada".$uma[0];
			}
		}
	}
}