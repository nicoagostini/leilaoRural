<?php
     session_start();
        if(isset($_GET['lg'])){
           $lgg = $_GET['lg'];
          $_SESSION['language'] = $lgg;
        }
        else{
          $_SESSION['language'] = 'en';
        }
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
  	<div id="lg" align="right">
        <a href="lista.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="lista.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
	<?php

include_once("classes/buyer.class.php");
include_once("classes/loteControle.class.php");
include_once("classes/buyerControle.class.php");

$lc = new loteControle();
$bc = new buyerControle();


$buyer = unserialize($_SESSION['user']);

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }


$todas = $lc->controleAcao("selecionarAbertas");

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$buyer->getFoto()."'><h2> Seja bem vindo, ".$buyer->getNome().".</h2></div>";
echo "<div id='menu' align='center'><br><a href='lista.php'>Lista </a> || <a href='editarBuyer.php'>Alterar dados cadastrais </a> || <a href='destroy.php'>Sair</a></div></div><br>";?>
<table border="1px" id="lista" class="table">
<thead>
	<tr>
		<th>Id Lote</th>
		<th>Nome</th>
		<th>Encerramento</th>
		<th>Lote</th>
		<th>Lance Mínimo</th>
		<th>Foto 1</th>
		<th>Categoria</th>
		<th>Status</th>
		<th>Edição</th>
	</tr>
</thead>
<tbody>
	<tr>
<?php
foreach($todas as $uma){
	echo "<td>".$uma[0]."</td>";
	echo "<td>".$uma[1]."</td>";
	echo "<td>".$uma[3]."</td>";
	echo "<td>".$uma[4]."</td>";
	echo "<td>".$uma[5]."</td>";
	echo "<td><img width = '50px' heigth='50px' src='".$uma[6]."'></td>";
	echo "<td>".$uma[12]."</td>";
	echo "<td>".$uma[11]."</td>";
	echo "<td>";

		if($uma[11] == 'Aberta'){
			echo "<form action='especifica.php?id=".$uma[0]."' method='post'><input type='submit' value='Visualizar'></input></form></td>";
		}

		elseif($uma[11] == 'Encerrada'){
			echo "<form action='especifica.php?id=".$uma[0]."' method='post'><input type='submit' value='Visualizar'></input></form></td>";
		}

	echo"</tr>";
}
echo "</tbody></table>";

echo "<div id='recomendados'><h2> Recomendado para você! </h2>";

$oi = $bc->controleAcao("recomenda", $buyer->getIdUser());

if($oi == '1'){
	echo "Ainda não há nada aqui, faça alguma compra!";
}
else{

	foreach($oi as $uma){
		echo "<table border='1px'>";
		echo "<td id='rec' heigth='150px' width='150px'>";
		echo "<a href='especifica.php?id=".$uma[0]."'><img src='".$uma[6]."' heigth='90px' width='90px'></a>";
		echo "<p>".$uma[1]."</p>";
		echo "</td>";
	}
	echo "</table></div>";
}
?>
</div>
</body>
<script>
$(document).ready(function() {
    $('#lista').DataTable();
} );
</script>
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
  	<div id="lg" align="right">
        <a href="lista.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="lista.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
	<?php

include_once("classes/buyer.class.php");
include_once("classes/loteControle.class.php");
include_once("classes/buyerControle.class.php");

$lc = new loteControle();
$bc = new buyerControle();

$buyer = unserialize($_SESSION['user']);

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }


$todas = $lc->controleAcao("selecionarAbertas");

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$buyer->getFoto()."'><h2> Welcome, ".$buyer->getNome().".</h2></div>";
echo "<div id='menu' align='center'><br><a href='lista.php'>List </a> || <a href='editarBuyer.php'>Change data </a> || <a href='destroy.php'>Log out</a></div></div><br>";?>
<table border="1px" id="lista" class="table">
<thead>
	<tr>
		<th>Lot ID</th>
		<th>Name</th>
		<th>Closing</th>
		<th>Lot</th>
		<th>Minimum Bid</th>
		<th>Image 1</th>
		<th>Category</th>
		<th>Status</th>
		<th>Edition</th>
	</tr>
</thead>
<tbody>
	<tr>
<?php
foreach($todas as $uma){
	echo "<td>".$uma[0]."</td>";
	echo "<td>".$uma[1]."</td>";
	echo "<td>".$uma[3]."</td>";
	echo "<td>".$uma[4]."</td>";
	echo "<td>".$uma[5]."</td>";
	echo "<td><img width = '50px' heigth='50px' src='".$uma[6]."'></td>";
	echo "<td>";
	if($uma[12] == 'suíno'){echo 'Swine </td>';}elseif($uma[12] == 'equino'){echo 'Equine </td>';}elseif($uma[12] == 'ovino'){echo 'Sheep </td>';}elseif($uma[12] == 'bovino'){echo 'Bovine </td>';}elseif($uma[12] == 'aves'){echo 'Birds </td>';}elseif($uma[12] == 'caprino'){echo 'Goat </td>';};
	echo "<td>";
		if($uma[11] == 'Criada'){echo 'Created </td>';}elseif($uma[11] == 'Aberta'){echo 'Open</td>';}elseif($uma[11] == 'Encerrada'){echo 'Closed</td>';};
	echo "<td>";

		if($uma[11] == 'Aberta'){
			echo "<form action='especifica.php?id=".$uma[0]."' method='post'><input type='submit' value='View'></input></form></td>";
		}

		elseif($uma[11] == 'Encerrada'){
			echo "<form action='especifica.php?id=".$uma[0]."' method='post'><input type='submit' value='View'></input></form></td>";
		}

	echo"</tr>";
}
echo "</tbody></table>";

echo "<div id='recomendados'><h2> Recomended to you! </h2>";

$oi = $bc->controleAcao("recomenda", $buyer->getIdUser());

if($oi == '1'){
	echo "There's nothing here yet, buy something!";
}
else{

	foreach($oi as $uma){
		echo "<table border='1px'>";
		echo "<td id='rec' heigth='150px' width='150px'>";
		echo "<a href='especifica.php?id=".$uma[0]."'><img src='".$uma[6]."' heigth='90px' width='90px'></a>";
		echo "<p>".$uma[1]."</p>";
		echo "</td>";
	}
	echo "</table></div>";
}
?>
</div>
</body>
<script>
$(document).ready(function() {
    $('#lista').DataTable();
} );
</script>
</html>

<?php
}
?>