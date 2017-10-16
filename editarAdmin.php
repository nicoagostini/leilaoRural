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
        <a href="editarAdmin.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="editarAdmin.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
	   <img src="logo.png">
	</div>
	   
    <div class="container">
  <?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");


$usuario = unserialize($_SESSION['user']);
$uc = new usuarioControle();


if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }
elseif(isset($_GET['error'])){
		if($_GET['error'] == '1'){
			echo "Favor, preencha todos os campos.";
		}
		elseif($_GET['error'] == '2'){
			echo "Insira a mesma senha nos dois campos.";
		}
}
elseif($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
  }

$id = $usuario->getIdUsuario();

$user = $uc->controleAcao("selecionarUm", $id);

$us = new usuario();

$us->setIdUsuario($id);
$us->setNome($user[0][3]);
$us->setEmail($user[0][1]);
$us->setSenha($user[0][2]);
$us->setFoto($user[0][4]);

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Seja bem vindo, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='admin.php'>Painel do administrador</a> || <a href='cadastraAdmin.php'>Cadastrar novo administrador</a> || <a href='cadastraLote.php'>Novo Lote</a> || <a href='listarAdmins.php'>Lista de admnistradores</a> || <a href='destroy.php'>Sair</a></div></div><br>";

echo "<form  enctype='multipart/form-data' action='salvarAdminEditado.php' method='post'>";
echo "<fieldset>";
echo "<div class='formulario'>";
echo "<legend>Editar Dados</legend>";
echo "Nome:<div class='control-group'><input type='text' class='form-control' name='nome' value='".$us->getNome()."' autofocus='autofocus' required='required'></input></div><br>";
echo "Email:<div class='control-group'><input type='email' class='form-control' name='email' value='".$us->getEmail()."' autofocus='autofocus' required='required'></input></div><br>";
echo "Senha:<div class='control-group'><input type='password' class='form-control' name='senha' value='".$us->getSenha()."' required='required'></input></div><br>";
echo "Confirmar senha:<div class='control-group'><input type='password' class='form-control' name='senha2' value='".$us->getSenha()."' required='required'></input></div><br>";
echo "Foto de perfil:<div class='control-group'><input type='file' name='perfil'></input></div><br>
	<div class='control-group'><button type='submit' id='Salvar' name='Salvar' class='btn'>Salvar</button></div>
	</div></form>";

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
  <div id="lg" align="right">
        <a href="editarAdmin.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="editarAdmin.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  <div id="cabecalhosite" >
     <img src="logo.png">
  </div>
     
    <div class="container">
  <?php

include_once("classes/usuario.class.php");
include_once("classes/usuarioControle.class.php");

$usuario = unserialize($_SESSION['user']);
$uc = new usuarioControle();


if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }
elseif(isset($_GET['error'])){
    if($_GET['error'] == '1'){
      echo "Please, fill all fields.";
    }
    elseif($_GET['error'] == '2'){
      echo "Insert the same password in both sites.";
    }
}
elseif($usuario->getTipo() != 'admin'){
    header('location: index.php?erro=2');
  }

$id = $usuario->getIdUsuario();

$user = $uc->controleAcao("selecionarUm", $id);

$us = new usuario();

$us->setIdUsuario($id);
$us->setNome($user[0][3]);
$us->setEmail($user[0][1]);
$us->setSenha($user[0][2]);
$us->setFoto($user[0][4]);

echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$usuario->getFoto()."'><h2> Welcome, ".$usuario->getNome().".</h2></div>";

echo "<div id='menu' align='center'><br><a href='admin.php'>Admin panel</a> || <a href='cadastraAdmin.php'>Register new admin</a> || <a href='cadastraLote.php'>New lot</a> || <a href='listarAdmins.php'>Admin list</a> || <a href='destroy.php'>Log out</a></div></div><br>";

echo "<form  enctype='multipart/form-data' action='salvarAdminEditado.php' method='post'>";
echo "<fieldset>";
echo "<div class='formulario'>";
echo "<legend>Edit data</legend>";
echo "Name:<div class='control-group'><input type='text' class='form-control' name='nome' value='".$us->getNome()."' autofocus='autofocus' required='required'></input></div><br>";
echo "Email:<div class='control-group'><input type='email' class='form-control' name='email' value='".$us->getEmail()."' autofocus='autofocus' required='required'></input></div><br>";
echo "Password:<div class='control-group'><input type='password' class='form-control' name='senha' value='".$us->getSenha()."' required='required'></input></div><br>";
echo "Confirm password:<div class='control-group'><input type='password' class='form-control' name='senha2' value='".$us->getSenha()."' required='required'></input></div><br>";
echo "User picture:<div class='control-group'><input type='file' name='perfil'></input></div><br>
  <div class='control-group'><button type='submit' id='Salvar' name='Salvar' class='btn'>Save</button></div>
  </div></form>";

?>
</div>
</body>
</html>

<?php
}
?>