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
include_once("classes/loteControle.class.php");

$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }
elseif(isset($_GET['error'])){
		if($_GET['error'] == '1'){
			echo "Favor, preencha todos os campos.";
		}
}
elseif($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
}


$idLote = $_POST['idLote'];

$uma = $lc->controleAcao("selecionarUm", $idLote);

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

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Alterar dados </a> || <a href='cadastraAdmin.php'>Cadastrar novo administrador</a> || <a href='cadastraLote.php'>Novo Lote</a> || <a href='listarAdmins.php'>Lista de admnistradores</a> || <a href='destroy.php'>Sair</a></div></div><br>";

echo "<form  enctype='multipart/form-data' action='salvarLoteEditado.php' method='post'>";
echo "<input type='hidden' name='idLote' value='".$idLote."'></input>";
echo "<div class='control-group'>Id Lote: <input type = 'text' name = 'idLote' value ='".$lotec->getIdLote()."' disabled = 'disabled'></input><br>";
echo "<div class='control-group'>Nome: <input type = 'text' name = 'nome' value ='".$lotec->getNome()."' required = 'required'></input><br>";
echo "<div class='control-group'>Descrição: <input type = 'text' name = 'descricao' value ='".$lotec->getDescricao()."' required = 'required'></input><br>";
echo "<div class='control-group'>Encerramento: <input type = 'date' name = 'encerramento' value ='".$lotec->getEncerramento()."' required = 'required'></input><br>";
echo "<div class='control-group'>Lote: <input type = 'text' name = 'lote' value ='".$lotec->getLote()."' required = 'required'></input><br>";
echo "<div class='control-group'>Valor Mínimo: <input type = 'text' name = 'valorMin' value ='".$lotec->getValorMin()."' required = 'required'></input><br>";
echo "Foto 1: <input type = 'file' name = 'foto1'></input><br>";
echo "Foto 2: <input type = 'file' name = 'foto2'></input><br>";
echo "Foto 3: <input type = 'file' name = 'foto3'></input><br>";
echo "Foto 4: <input type = 'file' name = 'foto4'></input><br>";
echo "Foto 5: <input type = 'file' name = 'foto5'></input><br>";
echo "Categoria:		
		<input type='radio' name='categoria' value='suíno' checked> Suíno<br>
  		<input type='radio' name='categoria' value='ovino'> Ovino<br>
  		<input type='radio' name='categoria' value='bovino'> Bovino<br>
  		<input type='radio' name='categoria' value='equino'> Equino<br>
  		<input type='radio' name='categoria' value='caprino'> Caprino<br>
  		<input type='radio' name='categoria' value='aves'> Aves<br>";
echo "<div class='control-group'><button type='submit' id='Salvar' name='Salvar' class='btn'>Salvar</button></div></form>";
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
include_once("classes/loteControle.class.php");

$usuario = unserialize($_SESSION['user']);

$lc = new loteControle();

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }
elseif(isset($_GET['error'])){
    if($_GET['error'] == '1'){
      echo "Please, fill all sites.";
    }
}
elseif($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
}


$idLote = $_POST['idLote'];

$uma = $lc->controleAcao("selecionarUm", $idLote);

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

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Welcome, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='admin.php'>Admin panel </a> ||<a href='editarAdmin.php'>Change admin date </a> || <a href='cadastraAdmin.php'>Register new admin</a> || <a href='cadastraLote.php'>New lot</a> || <a href='listarAdmins.php'>Admins list</a> || <a href='destroy.php'>Log out</a></div></div><br>";

echo "<form  enctype='multipart/form-data' action='salvarLoteEditado.php' method='post'>";
echo "<input type='hidden' name='idLote' value='".$idLote."'></input>";
echo "<div class='control-group'>Lot ID: <input type = 'text' name = 'idLote' value ='".$lotec->getIdLote()."' disabled = 'disabled'></input><br>";
echo "<div class='control-group'>Name: <input type = 'text' name = 'nome' value ='".$lotec->getNome()."' required = 'required'></input><br>";
echo "<div class='control-group'>Description: <input type = 'text' name = 'descricao' value ='".$lotec->getDescricao()."' required = 'required'></input><br>";
echo "<div class='control-group'>Closing: <input type = 'date' name = 'encerramento' value ='".$lotec->getEncerramento()."' required = 'required'></input><br>";
echo "<div class='control-group'>Lot: <input type = 'text' name = 'lote' value ='".$lotec->getLote()."' required = 'required'></input><br>";
echo "<div class='control-group'>Minimum price: <input type = 'text' name = 'valorMin' value ='".$lotec->getValorMin()."' required = 'required'></input><br>";
echo "Image 1: <input type = 'file' name = 'foto1'></input><br>";
echo "Image 2: <input type = 'file' name = 'foto2'></input><br>";
echo "Image 3: <input type = 'file' name = 'foto3'></input><br>";
echo "Image 4: <input type = 'file' name = 'foto4'></input><br>";
echo "Image 5: <input type = 'file' name = 'foto5'></input><br>";
echo "Category:    
    <input type='radio' name='categoria' value='suíno' checked> Swine<br>
      <input type='radio' name='categoria' value='ovino'> Sheeo<br>
      <input type='radio' name='categoria' value='bovino'> Bovine<br>
      <input type='radio' name='categoria' value='equino'> Equine<br>
      <input type='radio' name='categoria' value='caprino'> Goar<br>
      <input type='radio' name='categoria' value='aves'> Birds<br>";
echo "<div class='control-group'><button type='submit' id='Salvar' name='Salvar' class='btn'>Save</button></div></form>";
?>
</div>
</body>
</html>

<?php
}
?>