<?php
	class Buyer {

	private $idUser;
	private $nome;
	private $email;
	private $senha;
	private $tipo;
	private $foto;
	private $rg;
	private $cpf;
	private $apelido;
	private $endereco;
	private $cidade;
	private $estado;
	private $cc;
	private $dataVencimento;
	private $enderecoCobranca;
	private $telefone;
	private $telefone2;
	private $dataNascimento;
	private $sexo;
	private $estadoCivil;
	private $compra1;
	private $compra2;

	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
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

	public function getRg(){
		return $this->rg;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getApelido(){
		return $this->apelido;
	}

	public function setApelido($apelido){
		$this->apelido = $apelido;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getCc(){
		return $this->cc;
	}

	public function setCc($cc){
		$this->cc = $cc;
	}

	public function getDataVencimento(){
		return $this->dataVencimento;
	}

	public function setDataVencimento($dataVencimento){
		$this->dataVencimento = $dataVencimento;
	}

	public function getEnderecoCobranca(){
		return $this->enderecoCobranca;
	}

	public function setEnderecoCobranca($enderecoCobranca){
		$this->enderecoCobranca = $enderecoCobranca;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone2(){
		return $this->telefone2;
	}

	public function setTelefone2($telefone2){
		$this->telefone2 = $telefone2;
	}

	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getEstadoCivil(){
		return $this->estadoCivil;
	}

	public function setEstadoCivil($estadoCivil){
		$this->estadoCivil = $estadoCivil;
	}

	public function getCompra1(){
		return $this->compra1;
	}

	public function setCompra1($compra1){
		$this->compra1 = $compra1;
	}

	public function getCompra2(){
		return $this->compra2;
	}

	public function setCompra2($compra2){
		$this->compra2 = $compra2;
	}

	}
?>