<?php

include_once("classes/usuario.class.php");
include_once("classes/loteControle.class.php");

session_start();
$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

if($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
}

$idLote = $_POST['idLote'];

$lc->controleAcao("apagar", $idLote);
header("location:admin.php");
die();