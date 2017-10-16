<?php
	include_once("mail.class.php");
	include_once("controle.class.php");

	class mailControle extends controle{

	protected function selecionarUm($obj){return false;}
	protected function selecionarTodos(){return false;}
	protected function inserir($obj){return false;}
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
	protected function verificar($mail){return false;}
	protected function verificaEmail($obj){return false;}
	protected function recomenda($obj){return false;}


	public function enviarEmail($mail){
		mail($mail->getDestinatario(), $mail->getAssunto(), $mail->getMensagem(), $mail->getHeaders());
	}
}