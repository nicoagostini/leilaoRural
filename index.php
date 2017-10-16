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
        <a href="index.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="index.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
      <div id="cabecalhosite" >
        <img src="logo.png">
      </div>

      <div class="container">
        <h1> Seja bem vindo ao novo leilão rural! </h1>
        <h2> Sinta-se à vontade para fazer lances com segurança e confiabilidade, nosso sistema é completamente seguro.</h2>
        <p> Para fins de segurança e evitar que dados sigilosos fossem mostrados para todas as pessoas que acessasem o site, preferimos por trabalhar com todos os usuários cadastrados e logados.</p>
        <p> Então, para usufruir de nosso site, cadastre-se ou faça login se já for cadastrado!</p>
        <h3> Desejamos a todos, ótimos negócios e que retornem sempre que desejarem.</h3>
        <p><a href="login.php"><button type="button" class="btn btn-primary">Login</button></a><p>
         <br>
         <p> Novo por aqui?<br> <a href="cadastraBuyer.php"><button type="button" class="btn btn-sucess">Cadastre - se</button></a></p>
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
        <a href="index.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="index.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
      <div id="cabecalhosite" >
        <img src="logo.png">
      </div>

      <div class="container">
        <h1> Welcome to the new leilão rural! </h1>
        <h2> Feel free to bid safely and reliably, our system is completely secure.</h2>
        <p> For security purposes and to prevent sensitive data from being shown to all persons accessing the site, we prefer to work with all registered and logged in users.</p>
        <p> To enjoy our site, sign up or login if you are already registered!</p>
        <h3> We wish you all a great deal and return whenever you wish.</h3>
        <p><a href="login.php"><button type="button" class="btn btn-primary">Login</button></a><p>
         <br>
         <p> New member?<br> <a href="cadastraBuyer.php"><button type="button" class="btn btn-sucess">Register</button></a></p>
       </div>
     </body>
     </html>

<?php
}
?>