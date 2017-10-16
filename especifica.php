<?php
     session_start();

if($_SESSION['language'] == 'pt'){
?>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Leilão Rural</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
  
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
  <?php

include_once("classes/usuario.class.php");
include_once("classes/buyer.class.php");
include_once("classes/loteControle.class.php");

$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

$id = $_GET['id'];

$uma = $lc->controleAcao("selecionarUm", $id);

$lotec = new lote();
$lotec->setIdLote($uma[0][0]);
$lotec->setNome($uma[0][1]);
$lotec->setDescricao($uma[0][2]);
$lotec->setEncerramento($uma[0][3]);
$lotec->setLote($uma[0][4]);
$lotec->setValorMin($uma[0][5]);
$lotec->setFoto1($uma[0][6]);
$lotec->setFoto2($uma[0][7]);
$lotec->setFoto3($uma[0][8]);
$lotec->setFoto4($uma[0][9]);
$lotec->setFoto5($uma[0][10]);
$lotec->setCategoria($uma[0][12]);
$lotec->setLance($uma[0][13]);
$lotec->setVencedor($uma[0][14]);

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";
if($usuario->getTipo() == 'buyer'){
echo "<div id='menu' align='center'><br><a href='lista.php'>Painel do admin </a> || <a href='editarBuyer.php'>Alterar dados cadastrais </a> || <a href='destroy.php'>Sair</a></div></div><br>";
}
if($usuario->getTipo() == 'admin'){
echo "<div id='menu' align='center'><br><a href='admin.php'>Lista </a> || <a href='editarBuyer.php'>Alterar dados cadastrais </a> || <a href='destroy.php'>Sair</a></div></div><br>";
}

echo "Id Lote:<div class='control-group'> <input type = 'text' class='form-control' name = 'idLote' value ='".$lotec->getIdLote()."' disabled = 'disabled'></input></div><br>";
echo "Nome:<div class='control-group'> <input type = 'text' class='form-control' name = 'nome' value ='".$lotec->getNome()."' disabled = 'disabled'></input></div><br>";
echo "Descrição:<div class='control-group'> <input type = 'text' class='form-control' name = 'descricao' value ='".$lotec->getDescricao()."' disabled = 'disabled'></input></div><br>";
echo "Encerramento:<div class='control-group'> <input type = 'date' class='form-control' name = 'encerramento' value ='".$lotec->getEncerramento()."' disabled = 'disabled'></input></div><br>";
echo "Lote: <div class='control-group'><input type = 'text' class='form-control' name = 'lote' value ='".$lotec->getLote()."' disabled = 'disabled'></input></div><br>";
echo "Valor Mínimo:<div class='control-group'> <input type = 'text' class='form-control' name = 'valorMin' value ='".$lotec->getValorMin()."' disabled = 'disabled'></input></div><br>";
echo "<div class='control-group'>Foto 1: <img width='200px' heigth='200px' src='".$lotec->getFoto1()."'></div><br>";
echo "<div class='control-group'>Foto 2: <img width='200px' heigth='200px' src='".$lotec->getFoto2()."'></div><br>";
echo "<div class='control-group'>Foto 3: <img width='200px' heigth='200px' src='".$lotec->getFoto3()."'></div><br>";
echo "<div class='control-group'>Foto 4: <img width='200px' heigth='200px' src='".$lotec->getFoto4()."'></div><br>";
echo "<div class='control-group'>Foto 5: <img width='200px' heigth='200px' src='".$lotec->getFoto5()."'></div><br>";
echo " Categoria: <div class='control-group'> <input type =' text' class='form-control' name = 'categoria' disabled = 'disabled' value = '".$lotec->getCategoria()."'></input></div>";


if($uma[0][11] == 'Aberta'){

	if(isset($_GET['error'])){
		if($_GET['error'] == '1'){
			echo"<script>alert('O lance precisa ser maior que o lance mínimo!')</script>";
		}
		if($_GET['error'] == '2'){
			echo"<script>alert('O lance precisa ser maior que o lance atual!')</script>";
		}
	}

	$_SESSION['vMin'] = $lotec->getValorMin();
	$_SESSION['atual'] = $lotec->getLance();

	echo "<br>Lance Atual: <input type = 'text' disabled = 'disabled' name='atual' value='".$lotec->getLance()."'></input>";
	echo "<br><form action='salvarLance.php' method='post'>Seu lance: <input type='hidden' name='idLote' value='".$lotec->getIdLote()."'></input><input type = 'text' name='lanceN' id='lanceN' required='required'></input><input type='submit' value='Enviar'></input></form>";
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<?php
}

if($uma[0][11] == 'Encerrada'){
	if($lotec->getVencedor() != ''){
		echo "<h3> Vencedor é ".$lotec->getVencedor()." com o lance de R$ ".$lotec->getLance().".</h3>";
	}
	else{
		echo "<h3> O lote foi encerrado sem nenhum lance.</h3>";	
	}
}
?>
</div>
</body>
</html>
<?php
}
if($_SESSION['language'] == 'en'){
?>

<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Leilão Rural</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	  <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
  
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
  <?php

include_once("classes/usuario.class.php");
include_once("classes/buyer.class.php");
include_once("classes/loteControle.class.php");

$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

$id = $_GET['id'];

$uma = $lc->controleAcao("selecionarUm", $id);

$lotec = new lote();
$lotec->setIdLote($uma[0][0]);
$lotec->setNome($uma[0][1]);
$lotec->setDescricao($uma[0][2]);
$lotec->setEncerramento($uma[0][3]);
$lotec->setLote($uma[0][4]);
$lotec->setValorMin($uma[0][5]);
$lotec->setFoto1($uma[0][6]);
$lotec->setFoto2($uma[0][7]);
$lotec->setFoto3($uma[0][8]);
$lotec->setFoto4($uma[0][9]);
$lotec->setFoto5($uma[0][10]);
$lotec->setCategoria($uma[0][12]);
$lotec->setLance($uma[0][13]);
$lotec->setVencedor($uma[0][14]);

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Welcome, ".$usuario->getNome().".</h2></div>";
if($usuario->getTipo() == 'buyer'){
echo "<div id='menu' align='center'><br><a href='lista.php'>Lots list </a> || <a href='editarBuyer.php'>Change user data </a> || <a href='destroy.php'>Log out</a></div></div><br>";
}
if($usuario->getTipo() == 'admin'){
echo "<div id='menu' align='center'><br><a href='admin.php'>Admin panel </a> || <a href='editarAdmin.php'>Change admin data </a> || <a href='destroy.php'>Log out</a></div></div><br>";
}

echo "Lot ID:<div class='control-group'> <input type = 'text' class='form-control' name = 'idLote' value ='".$lotec->getIdLote()."' disabled = 'disabled'></input></div><br>";
echo "Name:<div class='control-group'> <input type = 'text' class='form-control' name = 'nome' value ='".$lotec->getNome()."' disabled = 'disabled'></input></div><br>";
echo "Description:<div class='control-group'> <input type = 'text' class='form-control' name = 'descricao' value ='".$lotec->getDescricao()."' disabled = 'disabled'></input></div><br>";
echo "Closing:<div class='control-group'> <input type = 'date' class='form-control' name = 'encerramento' value ='".$lotec->getEncerramento()."' disabled = 'disabled'></input></div><br>";
echo "Lot: <div class='control-group'><input type = 'text' class='form-control' name = 'lote' value ='".$lotec->getLote()."' disabled = 'disabled'></input></div><br>";
echo "Minimum bid:<div class='control-group'> <input type = 'text' class='form-control' name = 'valorMin' value ='".$lotec->getValorMin()."' disabled = 'disabled'></input></div><br>";
echo "<div class='control-group'>Image 1: <img width='200px' heigth='200px' src='".$lotec->getFoto1()."'></div><br>";
echo "<div class='control-group'>Image 2: <img width='200px' heigth='200px' src='".$lotec->getFoto2()."'></div><br>";
echo "<div class='control-group'>Image 3: <img width='200px' heigth='200px' src='".$lotec->getFoto3()."'></div><br>";
echo "<div class='control-group'>Image 4: <img width='200px' heigth='200px' src='".$lotec->getFoto4()."'></div><br>";
echo "<div class='control-group'>Image 5: <img width='200px' heigth='200px' src='".$lotec->getFoto5()."'></div><br>";
echo " Category: <div class='control-group'> <input type =' text' class='form-control' name = 'categoria' disabled = 'disabled' value = '".$lotec->getCategoria()."'></input></div>";


if($uma[0][11] == 'Aberta'){

	if(isset($_GET['error'])){
		if($_GET['error'] == '1'){
			echo"<script>alert('The bid need to be bigger than the minimum bid!')</script>";
		}
		if($_GET['error'] == '2'){
			echo"<script>alert('The bid need to be bigger than the actual bid!')</script>";
		}
	}

	$_SESSION['vMin'] = $lotec->getValorMin();
	$_SESSION['atual'] = $lotec->getLance();

	echo "<br>Actual bid: <input type = 'text' disabled = 'disabled' name='atual' value='".$lotec->getLance()."'></input>";
	echo "<br><form action='salvarLance.php' method='post'>Your bid: <input type='hidden' name='idLote' value='".$lotec->getIdLote()."'></input><input type = 'text' name='lanceN' id='lanceN' required='required'></input><input type='submit' value='Submit'></input></form>";
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<?php
}

if($uma[0][11] == 'Encerrada'){
	if($lotec->getVencedor() != ''){
		echo "<h3> The winner is ".$lotec->getVencedor()." with the bid of R$ ".$lotec->getLance().".</h3>";
	}
	else{
		echo "<h3> The lot was closed without any bid.</h3>";	
	}
}
?>
</div>
</body>
</html>

<?php
}
?>