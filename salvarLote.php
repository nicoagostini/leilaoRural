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

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$descricao = filter_var($_POST['descricao'], FILTER_SANITIZE_STRING);
	$encerramento = filter_var($_POST['encerramento'], FILTER_SANITIZE_STRING);
	$loteC = filter_var($_POST['lote'], FILTER_SANITIZE_STRING);
	$valorMin = filter_var($_POST['valorm'], FILTER_SANITIZE_STRING);
	$foto1 = $_FILES['foto1'];
	$foto2 = $_FILES['foto2'];
	$foto3 = $_FILES['foto3'];
	$foto4 = $_FILES['foto4'];
	$foto5 = $_FILES['foto5'];
	$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);


	if($nome == '' || $descricao == '' || $encerramento == '' || $loteC == '' || $valorMin == '' || $foto1['name'] == '' || $categoria == ''){
		header("location:cadastraLote.php?error=1");
		die;
	}

	$lote = new lote();

	if($foto1['name'] != ''){
	$destino1 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto1['tmp_name'], $destino1);
	$lote->setFoto1($destino1);
	}

	if($foto2['name'] != ''){
	$d2 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto2['tmp_name'], $d2);
	$lote->setFoto2($d2);
	}

	if($foto3['name'] != ''){
	$destino3 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto3['tmp_name'], $destino3);
	$lote->setFoto3($destino3);
	}

	if($foto4['name'] != ''){
	$destino4 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto4['tmp_name'], $destino4);
	$lote->setFoto4($destino4);
	}

	if($foto5['name'] != ''){
	$destino5 = "fotos/".$lc->controleAcao("unico").".jpg";
	move_uploaded_file($foto5['tmp_name'], $destino5);
	$lote->setFoto5($destino5);
	}




	$lote->setNome($nome);
	$lote->setDescricao($descricao);
	$lote->setEncerramento($encerramento);
	$lote->setLote($loteC);
	$lote->setValorMin($valorMin);
	$lote->setCategoria($categoria);
	$lote->setLance($valorMin);

	$lc->controleAcao("inserirLote",$lote);

	header("location:admin.php");