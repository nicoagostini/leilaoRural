<?php
     session_start();
      if(!$_SESSION){
        $_SESSION['language'] = 'en';
      }
      else{
        if(isset($_GET['lg'])){
           $lgg = $_GET['lg'];
          $_SESSION['language'] = $lgg;
        }
        else{
          $_SESSION['language'] = 'en';
        }
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
        <a href="login.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="login.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  
  <div id="cabecalho" >
     <img src="logo.png">
  </div>
     
    <div class="container">
      <form class="form-horizontal" action="verifica.php" method="post">
<fieldset>
<br>
<!-- Form Name -->
<div class="formulario">
<legend>Acessar o Sistema</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="senha">Email</label>
    <div class="controls">
      <input id="email" name="email" type="text" placeholder="Digite seu email aqui" class=" form-control">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="senha">Senha</label>
  <div class="controls">
    <input id="senha" name="senha" type="password" placeholder="Senha" class=" form-control">
  </div>
</div>
<?php
if(isset($_GET['erro'])){
  if($_GET['erro']==1){
    echo 'Email ou senha não está correto, digite novamente.';
  }
  if($_GET['erro']==2){
    echo 'Para acessar essa página você precisa estar logado.';
  }
  if($_GET['erro']==3){
    echo 'Digite um email válido!';
  }
}
?>
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button type="submit" id="Acessar" name="Acessar" class="btn">Acessar</button>
  </div>
</div>

</fieldset>
</form>
<br>
<p> Novo por aqui? <a href="cadastraBuyer.php">Cadastre - se</a></p>

</div>

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
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
        <a href="login.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="login.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  
  <div id="cabecalho" >
     <img src="logo.png">
  </div>
     
    <div class="container">
      <form class="form-horizontal" action="verifica.php" method="post">
<fieldset>
<br>
<!-- Form Name -->
<div class="formulario">
<legend>Access the system</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="senha">Email</label>
    <div class="controls">
      <input id="email" name="email" type="text" placeholder="Write your email here" class=" form-control">
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="senha">Password</label>
  <div class="controls">
    <input id="senha" name="senha" type="password" placeholder="Password" class=" form-control">
  </div>
</div>
<?php
if(isset($_GET['erro'])){
  if($_GET['erro']==1){
    echo 'Email or password incorect. Please, try again.';
  }
  if($_GET['erro']==2){
    echo 'You need to be logged in to access this page.';
  }
  if($_GET['erro']==3){
    echo 'Need a valid email!';
  }
}
?>
<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button type="submit" id="Acessar" name="Acessar" class="btn">Access</button>
  </div>
</div>

</fieldset>
</form>
<br>
<p> New member? <a href="cadastraBuyer.php">Sign up</a></p>

</div>

    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php 
}
?>

