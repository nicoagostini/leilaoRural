<?php
	include_once("classes/usuarioControle.class.php");
	include_once("classes/buyerControle.class.php");
	include_once("classes/bd.class.php");

	$userControle = new usuarioControle();
	
	$buyer = new buyer();
	$user = new usuario();
	$bd = new bd();

	$user->setEmail($_POST['email']);
	$user->setSenha($_POST['senha']);
	
	$log = $user;
	
	$resp = $userControle->controleAcao("verificar",$log);

	
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			  header("location: login.php?erro=3");
		}
	
	if($resp[0][5] == "admin"){
		$user->setIdUsuario($resp[0][0]);
		$user->setEmail($resp[0][1]);
		$user->setSenha($resp[0][2]);
		$user->setNome($resp[0][3]);
		$user->setFoto($resp[0][4]);
		$user->setTipo($resp[0][5]);
		$d = serialize($user);
		session_start();
        $_SESSION['id'] = "logado";
        $_SESSION['user'] = $d;
		header("location:admin.php");
	}

	elseif($resp[0][5] == "buyer"){
		$buyer->setIdUser($resp[0][0]);
		$buyer->setEmail($resp[0][1]);
		$buyer->setSenha($resp[0][2]);
		$buyer->setNome($resp[0][3]);
		$buyer->setFoto($resp[0][4]);
		$buyer->setTipo($resp[0][5]);

		$log22  = $bd->consulta("SELECT * FROM buyer WHERE iduser = '".$buyer->getIdUser()."' ");

		$buyer->setRg($log22[0][1]);
		$buyer->setCpf($log22[0][2]);
		$buyer->setApelido($log22[0][3]);
		$buyer->setEndereco($log22[0][4]);
		$buyer->setCidade($log22[0][5]);
		$buyer->setEstado($log22[0][6]);
		$buyer->setCc($log22[0][7]);
		$buyer->setDataVencimento($log22[0][8]);
		$buyer->setEnderecoCobranca($log22[0][9]);
		$buyer->setTelefone($log22[0][10]);
		$buyer->setTelefone2($log22[0][11]);
		$buyer->setDataNascimento($log22[0][12]);
		$buyer->setSexo($log22[0][13]);
		$buyer->setEstadoCivil($log22[0][14]);

		$d = serialize($buyer);
		session_start();
        $_SESSION['id'] = "logado";
        $_SESSION['user'] = $d;
		header("location:lista.php");
	}
	
	elseif($resp == false){
		header("location: login.php?erro=1");
	}