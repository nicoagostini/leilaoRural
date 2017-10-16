<?php
	
	include_once("classes/usuario.class.php");
	include_once("classes/usuarioControle.class.php");

	$uc = new usuarioControle();

	session_start();
	if(!isset($_SESSION['id'])){
		header('location: index.php?erro=2');
	}

    $usuario = unserialize($_SESSION['user']);

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
	$senha2 = filter_var($_POST['senha2'], FILTER_SANITIZE_STRING);
	$recebe = $_FILES['perfil'];

	if($nome == '' || $email == '' || $senha == '' || $senha2 == ''){
		header("location:editarAdmin.php?error=1");
		die;
	}

	elseif($senha != $senha2){
		header("location:editarAdmin.php?error=2");
		die;
	}

	$admin = new usuario();

	if($recebe['name'] != ''){
		$destino = "fotos/".uniqid().".jpg";
		move_uploaded_file($recebe['tmp_name'], $destino);
		$admin->setFoto($destino);
	}
	elseif($recebe['name'] == ''){
		$admin->setFoto($usuario->getFoto());
	}

	$admin->setIdUsuario($usuario->getIdUsuario());
	$admin->setEmail($email);
	$admin->setSenha($senha);
	$admin->setNome($nome);
	$admin->setTipo('admin');

	$uc->controleAcao("alterar",$admin);

	header("location:admin.php");