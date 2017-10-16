<?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");

session_start();
$usuario = unserialize($_SESSION['user']);

$uc = new usuarioControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

if($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
}

$iduser = $_POST['id'];


$uc->controleAcao("apagar", $iduser);
header("location:listarAdmins.php");
die();