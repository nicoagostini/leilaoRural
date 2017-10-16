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

include_once("classes/usuario.class.php");
include_once("classes/buyer.class.php");

$usuario = unserialize($_SESSION['user']);

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
  <?php echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Alterar dados </a> || <a href='cadastraAdmin.php'>Cadastrar novo administrador</a> || <a href='cadastraLote.php'>Novo Lote</a> || <a href='listarAdmins.php'>Lista de admnistradores</a> || <a href='destroy.php'>Sair</a></div></div><br>";
?>
<form  class="form-horizontal" enctype="multipart/form-data" action="salvarLote.php" method="post">
	<fieldset>
		<div class="formulario">
		<legend>Cadastro de Lote</legend>
<div class="control-group">
<input type="text" name="nome" placeholder="Nome" class=" form-control" autofocus="autofocus" required="required"></input><br>
</div>	
<div class="control-group">
<input type="text" name="descricao" placeholder="Descrição" class=" form-control" required="required"></input><br>
</div>	
<div class="control-group">
<input type="date" name="encerramento" class=" form-control" required="required"></input><br>
</div>	
<div class="control-group">
<input type="text" name="lote" placeholder="Lote" class=" form-control" required="required"></input><br>
</div>	
<div class="control-group">
<input type="text" name="valorm" placeholder="Valor inicial" class=" form-control" required="required"></input><br>
</div>	
<div class="control-group">
		Fotos (no mínimo 1, no máximo 5):
		<input type="file" name="foto1"></input><br>
		<input type="file" name="foto2"></input><br>
		<input type="file" name="foto3"></input><br>
		<input type="file" name="foto4"></input><br>
		<input type="file" name="foto5"></input><br>

</div>	
<div class="control-group">
		Categoria:		
		<input type="radio" name="categoria" value="suíno" checked> Suíno<br>
  		<input type="radio" name="categoria" value="ovino"> Ovino<br>
  		<input type="radio" name="categoria" value="bovino"> Bovino<br>
  		<input type="radio" name="categoria" value="equino"> Equino<br>
  		<input type="radio" name="categoria" value="caprino"> Caprino<br>
  		<input type="radio" name="categoria" value="aves"> Aves<br>
</div>	
<div class="control-group">
		<button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Cadastrar</button>
</div>	
	</form>
</div>
</div>

</html>

<?php

}

  if($_SESSION['language'] == 'en'){

include_once("classes/usuario.class.php");
include_once("classes/buyer.class.php");

$usuario = unserialize($_SESSION['user']);

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
  <?php echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Change Admin data </a> || <a href='cadastraAdmin.php'>Register new admin</a> || <a href='admin.php'>Admin panel</a> || <a href='listarAdmins.php'>Admin list</a> || <a href='destroy.php'>Sair</a></div></div><br>";
?>
<form  class="form-horizontal" enctype="multipart/form-data" action="salvarLote.php" method="post">
  <fieldset>
    <div class="formulario">
    <legend>New lot</legend>
<div class="control-group">
<input type="text" name="nome" placeholder="Name" class=" form-control" autofocus="autofocus" required="required"></input><br>
</div>  
<div class="control-group">
<input type="text" name="descricao" placeholder="Description" class=" form-control" required="required"></input><br>
</div>  
<div class="control-group">
<input type="date" name="encerramento" class=" form-control" required="required"></input><br>
</div>  
<div class="control-group">
<input type="text" name="lote" placeholder="Lot" class=" form-control" required="required"></input><br>
</div>  
<div class="control-group">
<input type="text" name="valorm" placeholder="Inicial value" class=" form-control" required="required"></input><br>
</div>  
<div class="control-group">
    Images (min 1, max 5):
    <input type="file" name="foto1"></input><br>
    <input type="file" name="foto2"></input><br>
    <input type="file" name="foto3"></input><br>
    <input type="file" name="foto4"></input><br>
    <input type="file" name="foto5"></input><br>

</div>  
<div class="control-group">
    Category:    
    <input type="radio" name="categoria" value="suíno" checked> Swine<br>
      <input type="radio" name="categoria" value="ovino"> Sheep<br>
      <input type="radio" name="categoria" value="bovino"> Bovine<br>
      <input type="radio" name="categoria" value="equino"> Equine<br>
      <input type="radio" name="categoria" value="caprino"> Goat<br>
      <input type="radio" name="categoria" value="aves"> Birds<br>
</div>  
<div class="control-group">
    <button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Register</button>
</div>  
  </form>
</div>
</div>

</html>


<?php
}
?>