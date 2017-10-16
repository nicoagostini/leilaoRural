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

	if($nome == '' || $email == '' || $senha == '' || $senha2 == '' || $recebe['name'] == ''){
		header("location:cadastraAdmin.php?error=1");
		die;
	}

	elseif($senha != $senha2){
		header("location:cadastraAdmin.php?error=2");
		die;
	}

	$l = $uc->verificaEmail($email);
 
 	if(isset($l[0])){
		header("location:cadastraAdmin.php?error=3");
		die;
	}

	else{
	$destino = "fotos/".uniqid().".jpeg";
	move_uploaded_file($recebe['tmp_name'], $destino);


	$admin = new usuario();
	$admin->setEmail($email);
	$admin->setSenha($senha);
	$admin->setNome($nome);
	$admin->setFoto($destino);

	$uc->controleAcao("inserirUsuario",$admin);

	header("location:admin.php");
}