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
			echo "<script> alert('Favor, preencha todos os campos.')</script>";
		}
		elseif($_GET['error'] == '2'){
			echo "<script> alert('Insira a mesma senha nos dois campos.')</script>";
		}
    elseif($_GET['error'] == '3'){
      echo "<script> alert('Email já cadastrado.')</script>";
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
    <div id="lg" align="right">
        <a href="cadastraAdmin.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="cadastraAdmin.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
  <div class="container">
 <?php
echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Alterar dados </a> || <a href='cadastraAdmin.php'>Cadastrar novo administrador</a> || <a href='cadastraLote.php'>Novo Lote</a> || <a href='listarAdmins.php'>Lista de admnistradores</a> || <a href='destroy.php'>Sair</a></div></div><br>";
?>
<form class="form-horizontal" enctype="multipart/form-data" action="salvarAdmin.php" method="post">
	<fieldset>
		<div class="formulario">
		<legend>Cadastro de Administrador</legend>
<div class="control-group">
		<input type="text" name="nome" class=" form-control" placeholder="Nome" autofocus="autofocus" required="required"></input><br>
</div>	
<div class="control-group">
		<input type="email" class=" form-control" name="email" placeholder="Email" autofocus="autofocus" required="required"></input><br>
</div>	
<div class="control-group">
		<input type="password" class=" form-control" name="senha" placeholder="Senha" required="required"></input><br>
</div>	
<div class="control-group">
		<input type="password" class=" form-control" name="senha2" placeholder="Senha" required="required"></input><br>
</div>	
<div class="control-group">
		<input type="file" name="perfil"></input><br>
</div>	
<div class="control-group">
		<button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Cadastrar</button>
</div>
	</form>
	<body>
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
      echo "<script> alert('Please, fill all sites.')</script>";
    }
    elseif($_GET['error'] == '2'){
      echo "<script> alert('Insert the same password in both sites.')</script>";
    }
    elseif($_GET['error'] == '3'){
      echo "<script> alert('Email already registered.')</script>";
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
    <div id="lg" align="right">
        <a href="cadastraAdmin.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="cadastraAdmin.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
     <img src="logo.png">
  </div>
  <div class="container">
 <?php
echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Welcome, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='editarAdmin.php'>Change admin data </a> || <a href='admin.php'>Admin panel</a> || <a href='cadastraLote.php'>New lot</a> || <a href='listarAdmins.php'>Admins list</a> || <a href='destroy.php'>Log out</a></div></div><br>";
?>
<form class="form-horizontal" enctype="multipart/form-data" action="salvarAdmin.php" method="post">
  <fieldset>
    <div class="formulario">
    <legend>Admin register</legend>
<div class="control-group">
    <input type="text" name="nome" class=" form-control" placeholder="Name" autofocus="autofocus" required="required"></input><br>
</div>  
<div class="control-group">
    <input type="email" class=" form-control" name="email" placeholder="Email" autofocus="autofocus" required="required"></input><br>
</div>  
<div class="control-group">
    <input type="password" class=" form-control" name="senha" placeholder="Password" required="required"></input><br>
</div>  
<div class="control-group">
    <input type="password" class=" form-control" name="senha2" placeholder="Password" required="required"></input><br>
</div>  
<div class="control-group">
    <input type="file" name="perfil"></input><br>
</div>  
<div class="control-group">
    <button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Register</button>
</div>
  </form>
  <body>
</html>

<?php
}
?>