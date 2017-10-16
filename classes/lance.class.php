<?php

class lance {

	private $idLance;
	private $idLote;
	private $valor;
	private $idUsuario;
	private $nome;
	private $data;

	public function getIdLance(){
		return $this->idLance;
	}

	public function setIdLance($idLance){
		$this->idLance = $idLance;
	}

	public function getIdLote(){
		return $this->idLote;
	}

	public function setIdLote($idlote){
		$this->idLote = $idlote;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

}