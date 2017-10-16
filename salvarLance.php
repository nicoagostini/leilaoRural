<?php

include_once("classes/usuario.class.php");
include_once("classes/buyer.class.php");
include_once("classes/lanceControle.class.php");

session_start();

$idLote = $_POST['idLote'];
$lanceN = $_POST['lanceN'];

$vmin = $_SESSION['vMin'];
$atual = $_SESSION['atual'];


if($lanceN <= $vmin){
	header("location:especifica.php?id=".$idLote."&error=1");
	die();
}
elseif($lanceN <= $atual){
	header("location:especifica.php?id=".$idLote."&error=2");
	die();
}

$usuario = unserialize($_SESSION['user']);

$l = new lance();
$lc = new lanceControle();

if($usuario->getTipo() == 'admin'){

	$l->setIdLote($idLote);
	$l->setValor($lanceN);
	$l->setNome($usuario->getNome());
	$l->setIdUsuario($usuario->getIdUsuario());

	$lc->controleAcao("inserir", $l);

	header("location:especifica.php?id=".$idLote."");
	die();
}
else{

	$l->setIdLote($idLote);
	$l->setValor($lanceN);
	$l->setNome($usuario->getNome());
	$l->setIdUsuario($usuario->getIdUser());

	$lc->controleAcao("inserir", $l);

	header("location:especifica.php?id=".$idLote."");
	die();
}