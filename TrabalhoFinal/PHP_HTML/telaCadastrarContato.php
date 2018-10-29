<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/css_padrao.css">
  </head>
  
  <body class = "body_registro">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<div>
	    <!-- Placeholder -->
		<div class = "div_login">
		
		<h2> Cadastrar Contato </h2>
		
		<hr>
		
		<p class="warning">Os campos marcados com '*' são obrigatórios! </p>
		
	    <!-- Conteudo -->
		  <form id="form_login" class="form_registro" action="" method="POST">
			<p>Nome*:<br><input type="text" name="nome" id="textbox" value=""></p>
			<p>Endereço*:<br><input type="text" name="ender" id="textbox" value=""></p>
			<p>Idade:<br><input type="text" name="idade" id="textbox" value=""></p>
			<p id="email1">Email:<br><input type="text" name="email" id="email" onblur="is_email()"></p>
			<p>Telefone*:<br><input type="text" name="fone" id="textbox" value=""></p>
			<p id="pass">Senha*:<br><input type="password" name="pass1" id="pass1" value=""></p>
			<p id="passC">	
				Confirmar Senha*:<br>
				<input type="password" name="pass2" id="pass2" value="" onblur="is_pass_equal()">
			</p>
			<p>Sexo:</p>
			<p>
				Masculino<input type="radio" name="sexo" id="sexo" value="">
				Feminino<input type="radio" name="sexo" id="sexo" value="">
				Outro<input type="radio" name="sexo" id="sexo" value="">
			</p>
			<p>
				<a href="index132.php" class="buttom_cancelar">Cancelar</a>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	 			<button id="btConfirmar" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
			</p>
			
			
		  </form>
		</div>
	</div>
  
  </body>
</html>