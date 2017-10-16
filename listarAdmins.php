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
        <a href="listarAdmins.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="listarAdmins.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>

  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
<?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");

$uc = new usuarioControle();

$usuario = unserialize($_SESSION['user']);

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

if($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
  }

$todos = $uc->controleAcao("selecionarTodos");

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Alterar dados </a> || <a href='cadastraAdmin.php'>Cadastrar novo administrador</a> || <a href='cadastraLote.php'>Novo Lote</a> || <a href='admin.php'>Painel administrador</a> || <a href='destroy.php'>Sair</a></div></div><br>";

?>

<table border="1px" id="lista" class="table">
	<thead><tr>
		<th>Id</th>
		<th>Email</th>
		<th>Nome</th>
		<th>Foto</th>
		<th>Ação</th>
	</tr>
	</thead>
	<tbody>
	<tr>
<?php
foreach($todos as $um){
	echo "<td>".$um[0]."</td>";
	echo "<td>".$um[1]."</td>";
	echo "<td>".$um[3]."</td>";
	echo "<td><img src='".$um[4]."' heigth='200px' width='200px'></td>";
	echo "<td><form action='apagarAdmin.php' method='post'><input type='hidden' value='".$um[0]."' name='id'></input><input type='submit' value='Excluir'></input></form></td>";
	echo "</tr>";
}
echo "</tbody></table>"; 
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
        <a href="listarAdmins.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="listarAdmins.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
  </div>
  
  <div id="cabecalhosite" >
     <img src="logo.png">
  </div>
     
    <div class="container">
<?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");

$uc = new usuarioControle();

$usuario = unserialize($_SESSION['user']);

if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }

if($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
  }

$todos = $uc->controleAcao("selecionarTodos");

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Welcome, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Change admin data </a> || <a href='cadastraAdmin.php'>Register new admin</a> || <a href='cadastraLote.php'>New lot</a> || <a href='admin.php'>Admin panel</a> ||  <a href='destroy.php'>Log out</a></div></div><br>";

?>

<table border="1px" id="lista" class="table">
  <thead><tr>
    <th>Id</th>
    <th>Email</th>
    <th>Name</th>
    <th>Picture</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <tr>
<?php
foreach($todos as $um){
  echo "<td>".$um[0]."</td>";
  echo "<td>".$um[1]."</td>";
  echo "<td>".$um[3]."</td>";
  echo "<td><img src='".$um[4]."' heigth='200px' width='200px'></td>";
  echo "<td><form action='apagarAdmin.php' method='post'><input type='hidden' value='".$um[0]."' name='id'></input><input type='submit' value='Exclude'></input></form></td>";
  echo "</tr>";
}
echo "</tbody></table>"; 
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