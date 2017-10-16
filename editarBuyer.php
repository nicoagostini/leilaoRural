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

include_once("classes/buyer.class.php");
include_once("classes/usuario.class.php");
include_once("classes/buyerControle.class.php");
include_once("classes/usuarioControle.class.php");


$buyer = unserialize($_SESSION['user']);
$bc = new buyerControle();
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
    elseif($_GET['error'] == '3'){
      echo "Insira um CPF válido.";
    }
}

$id = $buyer->getIdUser();
$user = $uc->controleAcao("selecionarUm", $id);
$buy = $bc->controleAcao("selecionarUm", $id);

$b = new Buyer();


$b->setIdUser($id);
$b->setNome($user[0][3]);
$b->setEmail($user[0][1]);
$b->setSenha($user[0][2]);
$b->setTipo($user[0][5]);
$b->setFoto($user[0][4]);
$b->setRg($buy[0][1]);
$b->setCpf($buy[0][2]);
$b->setApelido($buy[0][3]);
$b->setEndereco($buy[0][4]);
$b->setCidade($buy[0][5]);
$b->setEstado($buy[0][6]);
$b->setCc($buy[0][7]);
$b->setDataVencimento($buy[0][8]);
$b->setEnderecoCobranca($buy[0][9]);
$b->setTelefone($buy[0][10]);
$b->setTelefone2($buy[0][11]);
$b->setDataNascimento($buy[0][12]);
$b->setSexo($buy[0][13]);
$b->setEstadoCivil($buy[0][14]);
$b->setCompra1($buy[0][15]);
$b->setCompra2($buy[0][16]);



echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$b->getFoto()."'><h2> Seja bem vindo, ".$b->getNome().".</h2></div>";
echo "<div id='menu' align='center'><br><a href='lista.php'>Lista </a> || <a href='editarBuyer.php'>Alterar dados cadastrais </a> || <a href='destroy.php'>Sair</a></div></div><br>";

?>

<form  class="form-horizontal" enctype="multipart/form-data" action="salvarBuyerEditado.php" method="post">
        <fieldset>
          <div class="formulario">
            <legend>Alteração de Dados</legend>
            <div class="control-group">
              Nome: * <input type="text" name="nome" value=<?php echo $b->getNome()?> class=" form-control" required="required"></input><br>
            </div>  
            <div class="control-group"> 
              Email: * <input type="email" name="email" value=<?php echo $b->getEmail()?> class=" form-control" required="required"></input><br>
            </div>  
            <div class="control-group">   
              Senha: * <input type="password" name="senha" value=<?php echo $b->getSenha()?> class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">   
              Confirmar a senha: * <input type="password" name="senha2" value=<?php echo $b->getSenha()?> class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">     
              Foto: * <input type="file" name="perfil"></input><br>
            </div>
            <div class="control-group">     
              RG: * <input type="text" name="rg" value=<?php echo $b->getRg()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              CPF: * <input type="text" name="cpf" value=<?php echo $b->getCpf()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Apelido: * <input type="text" name="apelido" value=<?php echo $b->getApelido()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Endereço: * <input type="text" name="endereco" value=<?php echo $b->getEndereco()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Cidade: * <input type="text" name="cidade" value=<?php echo $b->getCidade()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Estado: * <input type="text" name="estado" value=<?php echo $b->getEstado()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Número do Cartão de crédito: * <input type="text" name="cc" value=<?php echo $b->getCc()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Data de vencimento: * <input type="month" name="data"  value= <?php echo $b->getDataVencimento()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Endereço de cobrança: * <input type="text" name="endereco2" value=<?php echo $b->getEnderecoCobranca()?> class=" form-control" required="required"></input><br>
              </div
              <div class="control-group">     
                Telefone: * <input type="text" name="telefone" value=<?php echo $b->getTelefone()?> class=" form-control" required="required"></input><br>
              </div>
              <div class="control-group">     
                Telefone Opcional:<input type="text" name="telefone2" value=<?php echo $b->getTelefone2()?> class=" form-control"></input><br>
              </div>
              <div class="control-group">     
                Data de nascimento: * <input type="date" name="dataNascimento" value= <?php echo $b->getDataNascimento()?> class="form-control" required="required"></input><br>
              </div>
              <div class="control-group">     
                Sexo: *<br>
                <input type="radio" name="sexo" value="masculino" checked> Masculino<br>
                <input type="radio" name="sexo" value="feminino"> Feminino<br><br>
              </div>
              <div class="control-group">     
                Estado Civil: *<br>
                <input type="radio" name="ec" value="solteiro" checked> Solteiro<br>
                <input type="radio" name="ec" value="casado"> Casado<br>
                <input type="radio" name="ec" value="divorciado"> Divorciado<br>
                <input type="radio" name="ec" value="viuvo"> Viúvo<br>
              </div>
              <div class="control-group"> 
                <button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Atualizar</button>
              </div>
              <p style="color: red;"> * campos obrigatórios </p>
            </fieldset>
          </form>
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

include_once("classes/buyer.class.php");
include_once("classes/usuario.class.php");
include_once("classes/buyerControle.class.php");
include_once("classes/usuarioControle.class.php");

$buyer = unserialize($_SESSION['user']);
$bc = new buyerControle();
$uc = new usuarioControle();


if(!isset($_SESSION['id'])){
    header('location: index.php?erro=2');
  }
elseif(isset($_GET['error'])){
    if($_GET['error'] == '1'){
      echo "Please, fill all sites.";
    }
    elseif($_GET['error'] == '2'){
      echo "Fill the same password in both sites.";
    }
    elseif($_GET['error'] == '3'){
      echo "Insira um CPF válido.";
    }
}

$id = $buyer->getIdUser();
$user = $uc->controleAcao("selecionarUm", $id);
$buy = $bc->controleAcao("selecionarUm", $id);

$b = new Buyer();


$b->setIdUser($id);
$b->setNome($user[0][3]);
$b->setEmail($user[0][1]);
$b->setSenha($user[0][2]);
$b->setTipo($user[0][5]);
$b->setFoto($user[0][4]);
$b->setRg($buy[0][1]);
$b->setCpf($buy[0][2]);
$b->setApelido($buy[0][3]);
$b->setEndereco($buy[0][4]);
$b->setCidade($buy[0][5]);
$b->setEstado($buy[0][6]);
$b->setCc($buy[0][7]);
$b->setDataVencimento($buy[0][8]);
$b->setEnderecoCobranca($buy[0][9]);
$b->setTelefone($buy[0][10]);
$b->setTelefone2($buy[0][11]);
$b->setDataNascimento($buy[0][12]);
$b->setSexo($buy[0][13]);
$b->setEstadoCivil($buy[0][14]);
$b->setCompra1($buy[0][15]);
$b->setCompra2($buy[0][16]);



echo "<div class='navbar-inverse'><div id='perfil'><img width = '20%' heigth='20%' src='".$b->getFoto()."'><h2> Welcome, ".$b->getNome().".</h2></div>";
echo "<div id='menu' align='center'><br><a href='lista.php'>List </a> || <a href='editarBuyer.php'>Change data </a> || <a href='destroy.php'>Log out</a></div></div><br>";

?>

<form  class="form-horizontal" enctype="multipart/form-data" action="salvarBuyerEditado.php" method="post">
        <fieldset>
          <div class="formulario">
            <legend>Change data</legend>
            <div class="control-group">
              Name: * <input type="text" name="nome" value=<?php echo $b->getNome()?> class=" form-control" required="required"></input><br>
            </div>  
            <div class="control-group"> 
              Email: * <input type="email" name="email" value=<?php echo $b->getEmail()?> class=" form-control" required="required"></input><br>
            </div>  
            <div class="control-group">   
              Password: * <input type="password" name="senha" value=<?php echo $b->getSenha()?> class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">   
              Confirm password: * <input type="password" name="senha2" value=<?php echo $b->getSenha()?> class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">     
              Image: * <input type="file" name="perfil"></input><br>
            </div>
            <div class="control-group">     
              ID: * <input type="text" name="rg" value=<?php echo $b->getRg()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              SIN: * <input type="text" name="cpf" value=<?php echo $b->getCpf()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Nickname: * <input type="text" name="apelido" value=<?php echo $b->getApelido()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Address: * <input type="text" name="endereco" value=<?php echo $b->getEndereco()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              City: * <input type="text" name="cidade" value=<?php echo $b->getCidade()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              State: * <input type="text" name="estado" value=<?php echo $b->getEstado()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              CC Number: * <input type="text" name="cc" value=<?php echo $b->getCc()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Due date: * <input type="month" name="data"  value= <?php echo $b->getDataVencimento()?> class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Billing address: * <input type="text" name="endereco2" value=<?php echo $b->getEnderecoCobranca()?> class=" form-control" required="required"></input><br>
              </div
              <div class="control-group">     
                Telephone: * <input type="text" name="telefone" value=<?php echo $b->getTelefone()?> class=" form-control" required="required"></input><br>
              </div>
              <div class="control-group">     
                Optional Telephone:<input type="text" name="telefone2" value=<?php echo $b->getTelefone2()?> class=" form-control"></input><br>
              </div>
              <div class="control-group">     
                Birth date: * <input type="date" name="dataNascimento" value= <?php echo $b->getDataNascimento()?> class="form-control" required="required"></input><br>
              </div>
              <div class="control-group">     
                Sex: *<br>
                <input type="radio" name="sexo" value="masculino" checked> Male<br>
                <input type="radio" name="sexo" value="feminino"> Female<br><br>
              </div>
              <div class="control-group">     
                Civil State: *<br>
                <input type="radio" name="ec" value="solteiro" checked> Single<br>
                <input type="radio" name="ec" value="casado"> Married<br>
                <input type="radio" name="ec" value="divorciado"> Divorced<br>
                <input type="radio" name="ec" value="viuvo"> Widower<br>
              </div>
              <div class="control-group"> 
                <button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Save</button>
              </div>
              <p style="color: red;"> * required </p>
            </fieldset>
          </form>
      </div>
      </body>
      </html>

<?php
}
?>