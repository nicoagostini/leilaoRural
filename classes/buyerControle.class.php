<?php

	include_once("buyer.class.php");
	include_once("bd.class.php");
	include_once("controle.class.php");

	class buyerControle extends controle{

	protected function inserir($obj){return false;}
	protected function deletar($obj){return false;}
	protected function enviarEmail($obj){return false;}
	protected function verificar($obj){return false;}
	protected function inserirUsuario($obj){return false;}
	protected function inserirLote($obj){return false;}
	protected function abrir($obj){return false;}
	protected function unico(){return false;}
	protected function apagar($obj){return false;}
	protected function selecionarAbertas(){return false;}
	protected function selecionarStatus($obj){return false;}
	protected function apagarBuyer($obj){return false;}
	protected function verificarLote(){return false;}
	protected function encerrar($obj){return false;}
	protected function verificaEmail($obj){return false;}

	public function inserirBuyer($buy){
			$banco = new bd();
			$id = $banco->insereID("INSERT INTO user(email,senha,nome,foto,tipo) VALUES ('".$buy->getEmail()."','".$buy->getSenha()."','".$buy->getNome()."','".$buy->getFoto()."','buyer')");
			$banco->executa("INSERT INTO buyer(iduser,rg, cpf, apelido, endereco, cidade, estado, cc, datavencimento, enderecocobranca, telefone, telefone2, datanascimento, sexo, estadocivil) VALUES ('".$id."','".$buy->getRg()."','".$buy->getCpf()."','".$buy->getApelido()."','".$buy->getEndereco()."','".$buy->getCidade()."','".$buy->getEstado()."','".$buy->getCc()."','".$buy->getDataVencimento()."','".$buy->getEnderecoCobranca()."','".$buy->getTelefone()."','".$buy->getTelefone2()."','".$buy->getDataNascimento()."','".$buy->getSexo()."','".$buy->getEstadoCivil()."')");
	}

	public function selecionarUm($obj){
		$banco = new bd();
		$buyer = $banco->consulta("SELECT * FROM buyer WHERE iduser ='".$obj."'");
		return $buyer;
	}

	protected function alterar($obj){
		$banco = new bd();
		$banco->executa("UPDATE user SET email = '".$obj->getEmail()."', senha = '".$obj->getSenha()."', nome = '".$obj->getNome()."', foto = '".$obj->getFoto()."' WHERE iduser = '".$obj->getIdUser()."'");
		$banco->executa("UPDATE buyer SET rg = '".$obj->getRg()."', cpf = '".$obj->getCpf()."', apelido = '".$obj->getApelido()."', endereco = '".$obj->getEndereco()."', cidade = '".$obj->getCidade()."', estado = '".$obj->getEstado()."', cc = '".$obj->getCc()."', datavencimento = '".$obj->getDataVencimento()."', enderecocobranca = '".$obj->getEnderecoCobranca()."', telefone = '".$obj->getTelefone()."', telefone2 = '".$obj->getTelefone2()."', datanascimento = '".$obj->getDataNascimento()."', sexo = '".$obj->getSexo()."', estadocivil = '".$obj->getEstadoCivil()."' WHERE iduser = '".$obj->getIdUser()."'");
	}

	public function selecionarTodos(){
		$banco = new bd();
		$todos = $banco->consulta("SELECT * FROM usuario");
		return $todos;
	}

	public function destroy(){
		session_start();
		session_destroy();
		header("location:index.php");
	}

	public function recomenda($id){
		$banco = new bd();
		$c1 = $banco->consulta("SELECT compra1 FROM buyer WHERE iduser = '".$id."'");
		$c2 = $banco->consulta("SELECT compra2 FROM buyer WHERE iduser = '".$id."'");


		if($c1[0][0] == '' || $c1[0][0] == 'Array'){

			$sug = "1";

			return $sug;

		}
		else{

			if($c2[0][0] == '' || $c2[0][0] == 'Array'){
				$su1 = $banco->consulta("SELECT * FROM lote WHERE categoria = '".$c1[0][0]."' AND status = 'Aberta'");
				$sug = [$su1[0]];

			}
			else{

				$su1 = $banco->consulta("SELECT * FROM lote WHERE categoria = '".$c1[0][0]."' AND status = 'Aberta'");
				$su2 = $banco->consulta("SELECT * FROM lote WHERE categoria = '".$c2[0][0]."' AND status = 'Aberta'");
				$sug = [$su1[0], $su2[0]];

			}

			return $sug;
		}
	}
}