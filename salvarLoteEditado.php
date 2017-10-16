<?php

include_once("classes/usuario.class.php");
include_once("classes/loteControle.class.php");

session_start();
$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
}

elseif($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
}

$idLote = $_POST['idLote'];

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
$encerramento = filter_var($_POST['encerramento'], FILTER_SANITIZE_STRING);
$loteD = filter_var($_POST['lote'], FILTER_SANITIZE_STRING);
$valorMin = filter_var($_POST['valorMin'], FILTER_SANITIZE_STRING);
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$foto4 = $_FILES['foto4'];
$foto5 = $_FILES['foto5'];
$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

if($nome == '' || $descricao == '' || $encerramento == '' || $loteD == '' || $valorMin == '' || $categoria == ''){
		header("location:editarLote.php?error=1");
		die;
	}

	$lotec = new lote();

	if($foto1['name'] != ''){
		$destino1 = "fotos/".$lc->controleAcao("unico").".jpg";
		move_uploaded_file($foto1['tmp_name'], $destino1);
		$lotec->setFoto1($destino1);
	}
	elseif($foto1['name'] == ''){
		$uma = $lc->controleAcao("selecionarUm", $idLote);
		$lotec->setFoto1($uma[0][6]);
	}

	if($foto2['name'] != ''){
		$destino2 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto2['tmp_name'], $destino2);
	$lotec->setFoto2($destino2);
	}
	elseif($foto2['name'] == ''){
		$uma = $lc->controleAcao("selecionarUm", $idLote);
		$lotec->setFoto2($uma[0][7]);
	}

	if($foto3['name'] != ''){
		$destino3 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto3['tmp_name'], $destino3);
	$lotec->setFoto3($destino3);
	}
	elseif($foto3['name'] == ''){
		$uma = $lc->controleAcao("selecionarUm", $idLote);
		$lotec->setFoto3($uma[0][8]);
	}

	if($foto4['name'] != ''){
		$destino4 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto4['tmp_name'], $destino4);
	$lotec->setFoto4($destino4);
	}
	elseif($foto4['name'] == ''){
		$uma = $lc->controleAcao("selecionarUm", $idLote);
		$lotec->setFoto4($uma[0][9]);
	}

	if($foto5['name'] != ''){
		$destino5 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto5['tmp_name'], $destino5);
	$lotec->setFoto5($destino5);
	}
	elseif($foto5['name'] == ''){
		$uma = $lc->controleAcao("selecionarUm", $idLote);
		$lotec->setFoto5($uma[0][10]);
	}

	$lotec->setIdLote($idLote);
	$lotec->setNome($nome);
	$lotec->setDescricao($descricao);
	$lotec->setEncerramento($encerramento);
	$lotec->setLote($loteD);
	$lotec->setValorMin($valorMin);
	$lotec->setCategoria($categoria);

	$lc->controleAcao("alterar", $lotec);
	header("location:admin.php");
	die;