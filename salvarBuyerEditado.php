<?php
	
	include_once("classes/buyer.class.php");
	include_once("classes/buyerControle.class.php");
	include_once("classes/usuarioControle.class.php");

	session_start();

	$bc = new buyerControle();
	$uc = new usuarioControle();

	$usuario = unserialize($_SESSION['user']);

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
	$senha2 = filter_var($_POST['senha2'], FILTER_SANITIZE_STRING);
	$recebe = $_FILES['perfil'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$apelido = filter_var($_POST['apelido'], FILTER_SANITIZE_STRING);
	$endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_STRING);
	$cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_STRING);
	$estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
	$cc = $_POST['cc'];
	$data = $_POST['data'];
	$endereco2 = filter_var($_POST['endereco2'], FILTER_SANITIZE_STRING);
	$telefone = $_POST['telefone'];
	$telefone2 = $_POST['telefone2'];
	$dataNascimento = $_POST['dataNascimento'];
	$sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
	$ec = filter_var($_POST['ec'], FILTER_SANITIZE_STRING);

	//if($uc->controleAcao("validaCPF", $cpf) == false){
	//	header("location:editarBuyer.php?error=3");
	//	die;
	//}

	if($nome == '' || $email == '' || $senha == '' || $senha2 == '' || $rg == '' || $cpf == '' || $apelido == '' || $endereco == '' || $cidade == '' || $estado == '' || $cc == '' || $data == '' || $telefone == '' || $dataNascimento == '' || $sexo == '' || $ec == '' ){
		header("location:editarBuyer.php?error=1");
		die;
	}

	elseif($senha != $senha2){
		header("location:editarBuyer.php?error=2");
		die;
	}

	$buyer = new buyer();

	if($recebe['name'] != ''){
		$destino = "fotos/".uniqid().".jpg";
		move_uploaded_file($recebe['tmp_name'], $destino);
		$buyer->setFoto($destino);
	}
	elseif($recebe['name'] == ''){
		$buyer->setFoto($usuario->getFoto());
	}

	$buyer->setIdUser($usuario->getIdUser());	
	$buyer->setEmail($email);
	$buyer->setSenha($senha);
	$buyer->setNome($nome);
	$buyer->setRg($rg);
	$buyer->setCpf($cpf);
	$buyer->setApelido($apelido);
	$buyer->setEndereco($endereco);
	$buyer->setCidade($cidade);
	$buyer->setEstado($estado);
	$buyer->setCc($cc);
	$buyer->setDataVencimento($data);
	$buyer->setEnderecoCobranca($endereco2);
	$buyer->setTelefone($telefone);
	$buyer->setTelefone2($telefone2);
	$buyer->setDataNascimento($dataNascimento);
	$buyer->setSexo($sexo);
	$buyer->setEstadoCivil($ec);

	$bc->controleAcao("alterar",$buyer);

	header("location:lista.php");