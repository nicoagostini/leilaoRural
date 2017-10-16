<?php
	include_once("classes/loteControle.class.php");

	$lc = new loteControle();

	var_dump($lc->controleAcao("verificarLote"));

	if(isset($_POST['encerrar'])){
		$lc->controleAcao("encerrar", $_POST['encerrar']);
		header("location:admin.php");
		die();
	}