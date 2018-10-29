<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/css_padrao.css">
  </head>
  
  <body class = "body_login">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<div>
	    <!-- Placeholder -->
		<div class = "div_login">
			<img src="../IMAGENS/login.png" />
		
	    <!-- Conteudo -->
		  <form id="form_login" class="form_login" action="../PHP_HTML/telaInicial.php" method="POST">
			<hr>
			<h3>Usuário</h3><input type="text" name="login" id="login" value="">
			<h3>Senha</h3><input type="password" name="pass" id="pass" value="">
			
			
			<br>
			<br>
			<button type="submit" name="submit_login">Confirmar</button>
			<br>
			
			<div>
				<br>
				<a href="registro.php" > Registrar-se</a>
				<br>
				<br>
				<a href="" onclick="nova_senha()"> Esqueci a senha! </a>
			</div>
		  </form>
	  </div>
	</div>
  
  </body>
</html>

<?php
	if (isset($_POST["submit_registro"])) {
		if( $_POST["nome"] != "" && $_POST["ender"] != "" && $_POST["pass1"] != "" && $_POST["email"] != "" && $_POST["fone"] != ""){
			
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');

			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}
			//echo 'Conexao bem sucedida <br>';

			mysql_select_db($db,$conexao);
			
			$table = "usuarios";
			$campos = "(nome_usu,end,sexo,idade,email,telefone,lista_grupos,lista_notas,pass)";
			
			$insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". $_POST["ender"] . "','". $_POST["sexo"] ."','". $_POST["idade"] ."','". $_POST["email"] ."','". $_POST["fone"] ."','','','". $_POST["pass1"] ."');";
			
			$consulta = mysql_query($insert,$conexao);
		}
	}
?>

































