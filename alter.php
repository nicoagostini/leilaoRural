<?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");
include_once("classes/lote.class.php");
include_once("classes/loteControle.class.php");


$lc = new loteControle();

session_start();
if(!isset($_SESSION['id'])){
	header('location: index.php?erro=2');
}

$usuario = unserialize($_SESSION['user']);

$id = $_POST['id'];

if(isset($_POST['edit'])){
	if($_POST['edit'] == 'abrir'){
		$lc->controleAcao('abrir', $id);
		header("location:admin.php");
	}
}
else{
	header("location:admin.php");
	die;
}