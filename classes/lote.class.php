<?php
class lote{
    
    private $idLote;
    private $nome;
    private $descricao;
    private $encerramento;
    private $lote;
    private $valorMin;
    private $foto1;
    private $foto2;
    private $foto3;
    private $foto4;
    private $foto5;
    private $categoria;
    private $lance;
    private $vencedor;

    public function getIdLote(){
		return $this->idLote;
	}

	public function setIdLote($idLote){
		$this->idLote = $idLote;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getEncerramento(){
		return $this->encerramento;
	}

	public function setEncerramento($encerramento){
		$this->encerramento = $encerramento;
	}

	public function getLote(){
		return $this->lote;
	}

	public function setLote($lote){
		$this->lote = $lote;
	}

	public function getValorMin(){
		return $this->valorMin;
	}

	public function setValorMin($valorMin){
		$this->valorMin = $valorMin;
	}

	public function getFoto1(){
		return $this->foto1;
	}

	public function setFoto1($foto1){
		$this->foto1 = $foto1;
	}

	public function getFoto2(){
		return $this->foto2;
	}

	public function setFoto2($foto2){
		$this->foto2 = $foto2;
	}

	public function getFoto3(){
		return $this->foto3;
	}

	public function setFoto3($foto3){
		$this->foto3 = $foto3;
	}

	public function getFoto4(){
		return $this->foto4;
	}

	public function setFoto4($foto4){
		$this->foto4 = $foto4;
	}

	public function getFoto5(){
		return $this->foto5;
	}

	public function setFoto5($foto5){
		$this->foto5 = $foto5;
	}

	public function getCategoria(){
		return $this->categoria;
	}
	
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getLance(){
		return $this->lance;
	}
	
	public function setLance($lance){
		$this->lance = $lance;
	}

	public function getVencedor(){
		return $this->vencedor;
	}
	
	public function setVencedor($vencedor){
		$this->vencedor = $vencedor;
	}
}