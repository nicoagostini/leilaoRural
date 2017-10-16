<?php

abstract class Controle{
	
	abstract protected function selecionarUm($obj);
	abstract protected function selecionarTodos();
	abstract protected function inserir($obj);
	abstract protected function inserirUsuario($obj);
	abstract protected function alterar($obj);
	abstract protected function deletar($obj);
	abstract protected function destroy();
	abstract protected function enviarEmail($obj);
	abstract protected function verificar($obj);
	abstract protected function inserirBuyer($obj);
	abstract protected function inserirLote($obj);
	abstract protected function abrir($obj);
	abstract protected function unico();
	abstract protected function apagar($obj);
	abstract protected function apagarBuyer($obj);
	abstract protected function selecionarAbertas();
	abstract protected function selecionarStatus($obj);
	abstract protected function verificarLote();
	abstract protected function encerrar($obj);
	abstract protected function verificaEmail($obj);
	abstract protected function recomenda($obj);

	public function controleAcao($acao, $obj = false){
		switch($acao){
			case "inserir":
				return $this->inserir($obj);
				break;
			case "alterar":
				return $this->alterar($obj);
				break;
			case "deletar":
				return $this->deletar($obj);
				break;
			case "selecionarUm":
				return $this->selecionarUm($obj);
				break;
			case "selecionarTodos":
				return $this->selecionarTodos();
				break;
			case "inserirUsuario":
				return $this->inserirUsuario($obj);
				break;
			case "destroy":
				return $this->destroy();
				break;
			case "enviarEmail":
				return $this->enviarEmail($obj);
				break;
			case "verificar":
				return $this->verificar($obj);
				break;
			case "inserirBuyer":
				return $this->inserirBuyer($obj);
				break;
			case "inserirLote":
				return $this->inserirLote($obj);
				break;
			case "abrir":
				return $this->abrir($obj);
				break;
			case "unico":
				return $this->unico();
				break;
			case "apagar":
				return $this->apagar($obj);
				break;
			case "apagarBuyer":
				return $this->apagar($obj);
				break;
			case "selecionarAbertas":
				return $this->selecionarAbertas();
				break;
			case "selecionarStatus":
				return $this->selecionarStatus($obj);
				break;
			case "verificarLote":
				return $this->verificarLote();
				break;
			case "encerrar":
				return $this->encerrar($obj);
				break;
			case "verificaEmail":
				return $this->verificaEmail($obj);
				break;
			case "recomenda":
				return $this->recomenda($obj);
				break;
			default:
				return "Ação indefinida";
		}
	}
}
?>