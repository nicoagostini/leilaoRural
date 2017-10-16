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
        <a href="cadastraBuyer.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="cadastraBuyer.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
  	
  	<div id="cabecalho" >
  		<img src="logo.png">
  	</div>
  	<div class="container">
  		<form  class="form-horizontal" enctype="multipart/form-data" action="salvarBuyer.php" method="post">
  			<fieldset>
  				<div class="formulario">
  					<legend>Cadastro</legend>
  					<div class="control-group">
  						Nome: * <input type="text" name="nome" placeholder="Nome" class=" form-control" autofocus="autofocus" required="required"></input><br>
  					</div>	
  					<div class="control-group">	
  						Email: * <input type="email" name="email" placeholder="Email" class=" form-control" autofocus="autofocus" required="required"></input><br>
  					</div>	
  					<div class="control-group">		
  						Senha: * <input type="password" name="senha" placeholder="Senha" class=" form-control" required="required"></input><br>
  					</div>

  					<div class="control-group">		
  						Confirmar a senha: * <input type="password" name="senha2" placeholder="Senha" class=" form-control" required="required"></input><br>
  					</div>

  					<div class="control-group">			
  						Foto: * <input type="file" name="perfil"></input><br>
  					</div>
  					<div class="control-group">			
  						RG: * <input type="text" name="rg" placeholder="RG" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						CPF: * <input type="text" name="cpf" placeholder="CPF" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Apelido: * <input type="text" name="apelido" placeholder="Apelido" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Endereço: * <input type="text" name="endereco" placeholder="Ex.: Rua Azul, 455, Centro" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Cidade: * <input type="text" name="cidade" placeholder="Cidade" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Estado: * <input type="text" name="estado" placeholder="Estado" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Número do Cartão de crédito: * <input type="text" name="cc" placeholder="Nº do cartão" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Data de vencimento: * <input type="month" name="data" class=" form-control" required="required"></input><br>
  					</div>
  					<div class="control-group">			
  						Endereço de cobrança: * <input type="text" name="endereco2" placeholder="Endereço" class=" form-control" required="required"></input><br>
  						</div
  						<div class="control-group">			
  							Telefone: * <input type="text" name="telefone" placeholder="Telefone" class=" form-control" required="required"></input><br>
  						</div>
  						<div class="control-group">			
  							Telefone Opcional:<input type="text" name="telefone2" placeholder="Telefone Móvel (opcional)" class=" form-control"></input><br>
  						</div>
  						<div class="control-group">			
  							Data de nascimento: * <input type="date" name="dataNascimento" class=" form-control"class=" form-control"required="required"></input><br>
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
  							<button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Cadastrar</button>
  						</div>
  						<p style="color: red;"> * campos obrigatórios </p>
  					</fieldset>
  				</form>
  			</div>
  		</body>
  		</html>
  		<?php
  		if(isset($_GET['error'])){
  			if($_GET['error'] == '1'){
  				echo "<script>alert('Favor, preencha todos os campos.');</script>";
  			}
  			elseif($_GET['error'] == '2'){
  				echo "<script>alert('Insira a mesma senha nos dois campos.');</script>";
  			}
  			elseif($_GET['error'] == '3'){
  				echo "<script>alert('Insira um CPF válido.');</script>";
  			}
  		}
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
        <a href="cadastraBuyer.php?lg=en"><button type="button" class="btn btn-sucess">EN</button></a>
        <a href="cadastraBuyer.php?lg=pt"><button type="button" class="btn btn-sucess">PT</button></a>
      </div>
    
    <div id="cabecalho" >
      <img src="logo.png">
    </div>
    <div class="container">
      <form  class="form-horizontal" enctype="multipart/form-data" action="salvarBuyer.php" method="post">
        <fieldset>
          <div class="formulario">
            <legend>Register</legend>
            <div class="control-group">
              Name: * <input type="text" name="nome" placeholder="Name" class=" form-control" autofocus="autofocus" required="required"></input><br>
            </div>  
            <div class="control-group"> 
              Email: * <input type="email" name="email" placeholder="Email" class=" form-control" autofocus="autofocus" required="required"></input><br>
            </div>  
            <div class="control-group">   
              Password: * <input type="password" name="senha" placeholder="Password" class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">   
              Confirm password: * <input type="password" name="senha2" placeholder="Password" class=" form-control" required="required"></input><br>
            </div>

            <div class="control-group">     
              Picture: * <input type="file" name="perfil"></input><br>
            </div>
            <div class="control-group">     
              ID: * <input type="text" name="rg" placeholder="ID" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              SIN number: * <input type="text" name="cpf" placeholder="SIN" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Nickname: * <input type="text" name="apelido" placeholder="Nickname" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Adress: * <input type="text" name="endereco" placeholder="Ex.: Blue st., 455, Downtown" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              City: * <input type="text" name="cidade" placeholder="City" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              State: * <input type="text" name="estado" placeholder="State" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Credit card number: * <input type="text" name="cc" placeholder="CC number" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Due date: * <input type="month" name="data" class=" form-control" required="required"></input><br>
            </div>
            <div class="control-group">     
              Billing address: * <input type="text" name="endereco2" placeholder="Address" class=" form-control" required="required"></input><br>
              </div
              <div class="control-group">     
                Phone number: * <input type="text" name="telefone" placeholder="Phone number" class=" form-control" required="required"></input><br>
              </div>
              <div class="control-group">     
                Optional Phone number:<input type="text" name="telefone2" placeholder="Optional phone number" class=" form-control"></input><br>
              </div>
              <div class="control-group">     
                Date of birth: * <input type="date" name="dataNascimento" class=" form-control"class=" form-control"required="required"></input><br>
              </div>
              <div class="control-group">     
                Sex: *<br>
                <input type="radio" name="sexo" value="masculino" checked> Male<br>
                <input type="radio" name="sexo" value="feminino"> Female<br><br>
              </div>
              <div class="control-group">     
                Civil state: *<br>
                <input type="radio" name="ec" value="solteiro" checked> Single<br>
                <input type="radio" name="ec" value="casado"> Married<br>
                <input type="radio" name="ec" value="divorciado"> Divorced<br>
                <input type="radio" name="ec" value="viuvo"> Widower<br>
              </div>
              <div class="control-group"> 
                <button type="submit" id="Cadastrar" name="Cadastrar" class="btn">Register</button>
              </div>
              <p style="color: red;"> * Required Fields </p>
            </fieldset>
          </form>
        </div>
      </body>
      </html>
      <?php
      if(isset($_GET['error'])){
        if($_GET['error'] == '1'){
          echo "<script>alert('Please, fill all fields.');</script>";
        }
        elseif($_GET['error'] == '2'){
          echo "<script>alert('Insert the same password in both sites.');</script>";
        }
        elseif($_GET['error'] == '3'){
          echo "<script>alert('Insert a valid SIN.');</script>";
        }
      }

}

?>      
  		?>