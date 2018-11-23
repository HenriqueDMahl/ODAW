<?php 
	session_start();
	
			
	if (isset($_POST["sair"])){
		header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index.php");
		session_destroy();
		die();
	}
	
	//RECEBE ID DO LOGIN
	if (isset($_POST["submit_login"])) {
		if( $_POST["login"] != "" && $_POST["pass"] != ""){
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');

			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}

			mysql_select_db($db,$conexao);
			$table = "usuarios";
			$select = "select id_usu from " . $table . " where email = '" . $_POST["login"] . "' and pass = '" . $_POST["pass"] . "';";
			$consulta = mysql_query($select,$conexao);
			$linha = mysql_fetch_row($consulta);
			if($linha == ""){
				echo "<script>alert('Login ou senha invalido!')</script>";
				header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index.php");
				session_destroy();
				die();
			}
			$_SESSION['id_usuario_conect'] = (int)$linha[0];
		}else{
			echo "<script>alert('Login ou senha invalido!')</script>";
			header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index.php");
			session_destroy();
			die();
		}
	}
	
	if(!isset($_SESSION['id_usuario_conect'])){
		echo "<script>alert('Login ou senha invalido!')</script>";
		header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index.php");
		session_destroy();
		die();
	}

?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>
    <link rel="stylesheet" type="text/css" href="../CSS/css_telainicial.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_buttons.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_tables.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_popup.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_teste.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_padrao.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_conteiner.css" title="Default Styles" media="screen">
  </head>
  
  <body style="background-color: rgb(135,206,235);">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<script src="../JAVASCRIPT/popup.js"></script>
	<script src="../JAVASCRIPT/fone.js"></script>
	<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
	<div class = "div_corpo">
		<!-- MENU -->
		<div class="container">
			<div class="col-md-12"></div>
			<div class="titulo"><h2>Contatos</h2></div>
			<div class="op1">
				<form action="../PHP_HTML/telaInicial.php" method="POST"> 
					<button class="dropbtn" name="sair" type="submit"> 
						Sair
					</button> 
				</form> 
			</div>
			<div class="op2">
				<div class="dropdown">
				  <button class="dropbtn">MENU</button>
				  <div class="dropdown-content">
					<a href="telaInicial.php">Lista Contatos</a>
					<a href="telaAlarme.php">Lista Alarmes</a>
					<a href="telaGrupo.php">Lista Grupos</a>
					<a href="telaNotas.php">Lista Notas</a>
				  </div>
				</div>
			</div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			<table>
				<tr>
					<th> Nome </th>
					<th> E-mail </th>
					<th> Telefone </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th> 
					<a class="button" href="#popupInicial">+</a>
					<div id="popupInicial" class="overlay">
						<div class="popup">
							<h2>Cadastrar Novo Contato</h2>
							<a class="close" href="#">&times;</a>
							<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaInicial.php" method="POST">
								<p>Nome*:<br><input type="text" name="nome_novo" id="nome" value="" maxlength="30"></p>
								<p>Endereço*:<br><input type="text" name="ender" id="ender" value="" maxlength="50"></p>
								<p id="idade1">Idade:<br><input type="text" name="idade" id="idade" value="" onchange="is_idade()" maxlength="2"></p>
								<p id="email1">Email*:<br><input type="text" name="email" id="email" onblur="is_email()" placeholder="example@example.com" maxlength="30"></p>
								<p id="fone1">Telefone*:<br><input type="text" name="fone" id="fone" value="" placeholder="12345678" onchange="is_fone()" maxlength="8"></p>
								<p>Sexo:</p>
								<p>
									Masculino<input type="radio" name="sexo" id="sexo" value="M">
									Feminino<input type="radio" name="sexo" id="sexo" value="F">
									Outro<input type="radio" name="sexo" id="sexo" value="O">
								</p>
								<p>
									<a href="#" class="buttom_cancelar">Cancelar</a>
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						 			<button id="btConfirmar" name="submit_contato_novo" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
								</p>
						  </form>
						</div>
					</div>
					</th>
				<tr>
				<?php
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');
					
					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}

					mysql_select_db($db,$conexao);
					
					monta_tabela("contatos",$conexao); 
				?>
			</table>
		</div>
	</div>
  
  </body>
</html>
<?php
		
		function monta_tabela($table,$conexao){
			$select = "Select * from ". $table . " where id_usu_relativo = " . $_SESSION['id_usuario_conect'] . ";";
			$consulta = mysql_query($select,$conexao);
			while($linha = mysql_fetch_row($consulta)){
				echo '<tr>';
					echo '<td name="nome">';
						echo $linha[1];
					echo '</td>';
					echo '<td>';
						echo $linha[5];
					echo '</td>';
					echo '<td>';
						echo $linha[6];
					echo '</td>';
					echo '<td>';
						echo '<a href="#"> 
									<form action="../PHP_HTML/telaNotas.php" method="POST"> 
										<button name="submit_filtro_notas" type="submit"> 
											<img src="../IMAGENS/note.png" height="20" width="20">
										</button> 
										<input type="text" name="id_filtro_notas" id="id" value="'. $linha[0] .'" hidden>
									</form> 
								   </a> ';
					echo '</td>';
					echo '<td>';
						echo '<a href="#popup'. ($linha[0]) .'"> 
						     <img src="../IMAGENS/lupa.png" height="20" width="20"u> 
							 </a>
							 <div id="popup'. ($linha[0]) .'" class="overlay">
								<div class="popup">
									<h2>Visualizar Contato</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaInicial.php" method="POST">
										<p>Nome*:<br><input type="text" id="nome" value="'. $linha[1] .'" disabled></p>
										<p>Endereço*:<br><input type="text" id="ender" value="'. $linha[2] .'" disabled></p>
										<p>Idade:<br><input type="text" id="idade" value="'. $linha[4] .'" disabled></p>
										<p id="email1">Email*:<br><input type="text" id="email" value="'. $linha[5] .'" disabled></p>
										<p>Telefone*:<br><input type="text" id="fone" value="'. $linha[6] .'" disabled></p>
										<p>Sexo:</p>
										<p>
											Masculino<input type="radio" id="sexo" value="M" '. ($linha[3]=='M'?"checked":"") .' disabled>
											Feminino<input type="radio" id="sexo" value="F" '. ($linha[3]=='F'?"checked":"") .' disabled>
											Outro<input type="radio" id="sexo" value="O" '. ($linha[3]=='O'?"checked":"") .' disabled>
										</p>
										<input type="text" name="id_contato_ed" id="id" value="'. $linha[0] .'" hidden>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
										</p>
								  </form>
								</div>
							</div>';
					echo '</td>';
					echo '<td>';
						echo '<a href="#popup'. (0-$linha[0]) .'">
						     <img src="../IMAGENS/pencil.png" height="20" width="20"> 
							 </a>
							 <div id="popup'. (0-$linha[0]) .'" class="overlay">
								<div class="popup">
									<h2>Editar Contato</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaInicial.php" method="POST">
										<p>Nome*:<br><input type="text" name="nome_ed" id="nome" value="'. $linha[1] .'" maxlength="30"></p>
										<p>Endereço*:<br><input type="text" name="ender_ed" id="ender" value="'. $linha[2] .'" maxlength="50"></p>
										<p>Idade:<br><input type="text" name="idade_ed" id="idade" value="'. $linha[4] .'" maxlength="2"></p>
										<p id="email">Email*:<br><input type="text" name="email_ed" id="email" onblur="is_email()" value="'. $linha[5] .'" placeholder="example@example.com" maxlength="30"></p>
										<p id="fone1">Telefone*:<br><input type="text" name="fone_ed" id="fone" value="'. $linha[6] .'" placeholder="12345678" onchange="is_fone()" maxlength="8"></p>
										<p>Sexo:</p>
										<p>
											Masculino<input type="radio" name="sexo_ed" id="sexo" '. ($linha[3]=='M'?"checked":"") .'  value="M">
											Feminino<input type="radio" name="sexo_ed" id="sexo" '. ($linha[3]=='F'?"checked":"") .'  value="F">
											Outro<input type="radio" name="sexo_ed" id="sexo" '. ($linha[3]=='O'?"checked":"") .'  value="O">
										</p>
										<input type="text" name="id_contato_ed" id="id" value="'. $linha[0] .'" hidden>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								 			<button id="btConfirmar" name="submit_editar_contato" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
										</p>
								  </form>
								</div>
							</div>';
					echo '</td>';
					echo '<td>';
						echo '<a href="#"> 
								<form action="../PHP_HTML/telaInicial.php" method="POST"> 
									<button name="submit_deletar_contato" type="submit"> 
										<img src="../IMAGENS/delet.png" height="20" width="20">
									</button> 
									<input type="text" name="id_contato_del" id="id" value="'. $linha[0] .'" hidden>
								</form> 
							   </a> ';
					echo '</td>';
				echo '</tr>';
			}
		}
			//INSERE NOVO CONTATO
			if (isset($_POST["submit_contato_novo"])) {
				if( $_POST["nome_novo"] != "" && $_POST["ender"] != "" && $_POST["email"] != "" && $_POST["fone"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}

					mysql_select_db($db,$conexao);
					
					$table = "contatos";
					$campos = "(nome_usu,end,sexo,idade,email,telefone,id_usu_relativo)";
					
					$insert = "insert into ". $table . $campos . " values ('". $_POST["nome_novo"] ."','". $_POST["ender"] . "','". $_POST["sexo"] ."','". $_POST["idade"] ."','". $_POST["email"] ."','". $_POST["fone"] ."','". $_SESSION['id_usuario_conect'] ."');";
					
					$consulta = mysql_query($insert,$conexao);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaInicial.php'>";
					
				}
			}
			//UPDATE CONTATO
			if (isset($_POST["submit_editar_contato"])) {
				if( $_POST["nome_ed"] != "" && $_POST["ender_ed"] != "" && $_POST["email_ed"] != "" && $_POST["fone_ed"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}

					mysql_select_db($db,$conexao);
					
					$table = "contatos";
					
					$update = "update ". $table . " set nome_usu = '". $_POST["nome_ed"] ."', end = '". $_POST["ender_ed"] ."', sexo = '". $_POST["sexo_ed"] ."', idade = '". $_POST["idade_ed"] ."', email = '". $_POST["email_ed"] ."', telefone = '". $_POST["fone_ed"] ."' where id_contato = '".  $_POST["id_contato_ed"] ."';";
					
					$consulta = mysql_query($update,$conexao);
					 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaInicial.php'>";
				}
			}
			
			//DELETE CONTATO
			if (isset($_POST["submit_deletar_contato"])){
				
				$db = "tf";
				$table = "contatos";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				mysql_select_db($db,$conexao);
				
				$deletar = "Delete from ". $table . " where id_contato = ". $_POST["id_contato_del"];
				$consulta = mysql_query($deletar,$conexao);
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaInicial.php'>";
			}
		
?>
