<!DOCTYPE html>
<?php
session_start();
?>
<html>

  <head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../CSS/css_padrao.css">
	<link rel="stylesheet" type="text/css" href="../CSS/css_teste.css">
  </head>

  <body class = "body_registro">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<script src="../JAVASCRIPT/operacoes_tabela.js"></script>
	<script src="../JAVASCRIPT/fone.js"></script>
	<div>
		<!-- Placeholder -->
		<div class = "div_login">

		<h2> Registro </h2>

		<hr>

		<p class="warning">Os campos marcados com '*' são obrigatórios! </p>

		<!-- Conteudo -->
		  <form id="form_login" class="form_registro" action="../PHP_HTML/index.php" method="POST">
			<p>Nome*:<br><input type="text" name="nome" id="nome" value="" maxlength="30"></p>
			<p>Endereço*:<br><input type="text" name="ender" id="ender" value="" maxlength="50"></p>
			<p id="idade1">Idade:<br><input type="text" name="idade" id="idade" value="" onchange="is_idade()" maxlength="2"></p>
			<p id="email1">Email*:<br><input type="text" name="email" id="email" placeholder="example@example.com" onblur="is_email()" maxlength="30"></p>
			<p id="fone1">Telefone*:<br><input type="text" name="fone" id="fone" value="" placeholder="12345678" onchange="is_fone()" maxlength="8"></p>
			<p id="pass">Senha*:<br><input type="password" name="pass1" id="pass1" value=""></p>
			<p id="passC">	
				Confirmar Senha*:<br>
				<input type="password" name="pass2" id="pass2" value="" onblur="is_pass_equal()">
			</p>
			<p>Sexo:</p>
			<p>
				Masculino<input type="radio" name="sexo" id="sexo" value="M">
				Feminino<input type="radio" name="sexo" id="sexo" value="F">
				Outro<input type="radio" name="sexo" id="sexo" value="O">
			</p>
			<p>
				<a href="index.php" class="buttom_cancelar">Cancelar</a>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	 			<button id="btConfirmar" name="submit_registro" type="submit" class="buttom_confirmar">Confirmar</button>
			</p>


		  </form>
		</div>
	</div>

  </body>
</html>
