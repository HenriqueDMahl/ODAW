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
		  <form id="form_login" class="form_login" action="" method="POST">
			<hr>
			<h3>Usuário</h3><input type="text" name="login" id="login" value="">
			<h3>Senha</h3><input type="password" name="pass" id="pass" value="">
			
			
			<br>
			<br>
			<button type="submit">Confirmar</button>
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
