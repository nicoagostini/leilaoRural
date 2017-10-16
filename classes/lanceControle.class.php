<?php
	include_once("lance.class.php");
	include_once("controle.class.php");
	include_once("bd.class.php");

	class lanceControle extends controle{

	protected function selecionarUm($obj){return false;}
	protected function selecionarTodos(){return false;}
	protected function inserirUsuario($obj){return false;}
	protected function alterar($obj){return false;}
	protected function deletar($obj){return false;}
	protected function destroy(){return false;}
	protected function inserirBuyer($obj){return false;}
	protected function inserirLote($obj){return false;}
	protected function abrir($obj){return false;}
	protected function unico(){return false;}
	protected function apagar($obj){return false;}
	protected function apagarBuyer($obj){return false;}
	protected function selecionarAbertas(){return false;}
	protected function selecionarStatus($obj){return false;}
	protected function verificarLote(){return false;}
	protected function encerrar($obj){return false;}
	protected function enviarEmail($mail){return false;}
	protected function verificar($mail){return false;}
	protected function verificaEmail($mail){return false;}
	protected function recomenda($obj){return false;}

	protected function inserir($obj){
		$banco = new bd();
		date_default_timezone_set('America/Sao_Paulo');
		$today = date("Y-m-d");
		$banco->executa("INSERT INTO lance(idlance, idLote, valor, idusuario, nome, data) VALUES ('','".$obj->getIdLote()."','".$obj->getValor()."','".$obj->getIdUsuario()."','".$obj->getNome()."','".$today."')");
		$banco->executa("UPDATE lote SET lance = '".$obj->getValor()."', vencedor = '".$obj->getNome()."' WHERE idlote = '".$obj->getIdLote()."'");
		$categoria = $banco->consulta("SELECT categoria FROM lote WHERE idlote = '".$obj->getIdLote()."'");
		$c1 = $banco->consulta("SELECT compra1 FROM buyer WHERE iduser = '".$obj->getIdUsuario()."'");
		if($c1[0][0] == '' ){
			$banco->executa("UPDATE buyer SET compra1 ='".$categoria[0][0]."'");
		}
		else{
			$c2 = $banco->consulta("SELECT compra2 FROM buyer WHERE iduser = '".$obj->getIdUsuario()."'");
			if($c2[0][0] == '' || $c2[0][0] != 'Array'){
				$banco->executa("UPDATE buyer SET compra2 ='".$c1[0][0]."'");
				$banco->executa("UPDATE buyer SET compra1 ='".$categoria[0][0]."'");
			}
			else{
				$banco->executa("UPDATE buyer SET compra2 ='".$c1[0][0]."'");
				$banco->executa("UPDATE buyer SET compra1 ='".$categoria[0][0]."'");
				}
			}
		}
	}