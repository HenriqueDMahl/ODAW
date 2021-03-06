<!DOCTYPE html>
<?php 
	session_start();
	
	if(!isset($_SESSION['id_usuario_conect'])){
		echo "<script>alert('Login ou senha invalido!')</script>";
		header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index.php");
		session_destroy();
		die();
	}
?>
<html>

  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
	<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
	<div class = "div_corpo">
		<!-- MENU -->
		<div class="container">
			<div class="col-md-12"></div>
			<div class="titulo"><h2>Notas</h2></div>
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
					<th> Titulo </th>
					<th> Remetentes </th>
					<th> Grupo </th>
					<th>  </th>
					<th>  </th>
					<th> 
						<a class="button" href="#popupInicial">+</a>
						<div id="popupInicial" class="overlay">
							<div class="popup">
								<h2>Cadastrar Nova Nota</h2>
								<a class="close" href="#">&times;</a>
								<form id="form_notas" class="form_registro" action="../PHP_HTML/telaNotas.php" method="POST">
									<p>Titulo*:<br><input type="text" name="titulo" id="nome" value="" maxlength="30"></p>
									<p>Conteudo:<br><textarea rows="4" cols="50" name="conteudo" form="form_notas"></textarea></p>
									<p>Remetente*:<br>
									<?php monta_combobox("contatos","id_contato,nome_usu",1) ?>
									</p>
									<p>Grupo:<br>
									<?php monta_combobox("grupos","id_gru,nome_grup",0) ?>
									</p>
									<p>
										<a href="#" class="buttom_cancelar">Cancelar</a>
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							 			<button id="btConfirmar" name="submit_nota_novo" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
									</p>
							  </form>
							</div>
						</div>
					</th>
				<tr>
				<?php monta_tabela("notas"); ?>
			</table>
		</div>
	</div>
  
  </body>
</html>
<?php
	
		function monta_combobox($table,$campos,$flag){
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');
			
			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}
			mysql_select_db($db,$conexao);
			
			$select = "";
			if($flag == 1){
				echo '<select name = "select_contato">';
				$select = "select ". $campos ." from ". $table ." where id_usu_relativo = " . $_SESSION['id_usuario_conect'] . ";";
			}else{
				echo '<select name = "select_grupo">';
				$select = "select ". $campos ." from ". $table .";";
			}
			$consulta = mysql_query($select,$conexao);
			
			echo '<option value="null"></option>';
			while($linha = mysql_fetch_row($consulta)){
				echo '<option value="'. $linha[0] .'">';
					echo $linha[1];
				echo '</option>';
			}
			echo '</select>';

		}

		function monta_tabela($table){
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');
			
			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}

			mysql_select_db($db,$conexao);
			if(isset($_POST["submit_filtro_notas"])){
				$select = "Select * from ". $table . " where id_usu_autor = ". $_SESSION['id_usuario_conect'] ." and id_usu_alvo = ". $_POST["id_filtro_notas"] . ";";
			}if(isset($_POST["submit_filtro_grupos"])){
				$select = "Select * from ". $table . " where id_gru = ". $_POST["id_filtro_grupos"] . ";";
			}else{
				$select = "Select * from ". $table . " where id_usu_autor = " . $_SESSION['id_usuario_conect'] . ";";
			}
			$consulta = mysql_query($select,$conexao);
			while($linha = mysql_fetch_row($consulta)){
				echo '<tr>';
					echo '<td name="titulo">';
						echo $linha[1];
					echo '</td>';
					echo '<td>';
						echo getRemetente($linha[4]);
					echo '</td>';
					echo '<td>';
						echo getGrupo($linha[5]);
					echo '</td>';
					echo '<td>';
						echo '<a href="#popup'. ($linha[0]) .'"> 
						     <img src="../IMAGENS/lupa.png" height="20" width="20"> 
							 </a>
							 <div id="popup'. ($linha[0]) .'" class="overlay">
								<div class="popup">
									<h2>Visualizar Nota</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_notas_visual" class="form_registro" action="../PHP_HTML/telaNotas.php" method="POST">
										<p>Titulo*:<br><input type="text" id="titulo" value="'. $linha[1] .'" disabled></p>
										<p>Conteudo:<br><textarea rows="4" cols="50" name="comment" form="form_notas_visual" disabled>'. $linha[2] .'</textarea></p>
										<p>Remetente*:<br><input type="text" id="idade" value="'. getRemetente($linha[4]) .'" disabled></p>
										<p>Grupo:<br><input type="text" id="email" value="'. getGrupo($linha[5]) .'" disabled></p>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
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
									<h2>Editar Nota</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaNotas.php" method="POST">
										<p>Titulo*:<br><input type="text" nome="titulo_ed" id="titulo" value="'. $linha[1] .'" maxlength="30"></p>
										<p>Conteudo:<br><textarea rows="4" cols="50" name="conteudo_ed" form="form_notas_visual">'. $linha[2] .'</textarea></p>
										<p>Remetente*:<br><input type="text" id="idade" value="'. getRemetente($linha[4]) .'" disabled></p>
										<p>Grupo:<br><input type="text" id="email" value="'. getGrupo($linha[5]) .'" disabled></p>
										<input type="text" name="id_nota_ed" id="id_nota_ed" value="'. $linha[0] .'" hidden>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								 			<button id="btConfirmar" name="submit_editar_nota" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
										</p>
								  </form>
								</div>
							</div>';
					echo '</td>';
					echo '<td>';
						echo '<a href="#"> 
								<form action="../PHP_HTML/telaNotas.php" method="POST"> 
									<button name="submit_delete_nota" type="submit"> 
										<img src="../IMAGENS/delet.png" height="20" width="20">
									</button> 
									<input type="text" name="id_nota_del" id="id" value="'. $linha[0] .'" hidden>
								</form> 
							   </a> ';
					echo '</td>';
				echo '</tr>';
			}
		}
		
		
			function getRemetente($id_rementete){
				$db = "tf";
				$conexao = mysql_connect('localhost','root','');

				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}

				mysql_select_db($db,$conexao);
				$table = "contatos";
				$select = "select nome_usu from ". $table . " where id_contato = ". $id_rementete .";";
				$consulta = mysql_query($select,$conexao);
				$linha = mysql_fetch_row($consulta);
				return $linha[0];
			}
			
			function getGrupo($id_grupo){
				$db = "tf";
				$conexao = mysql_connect('localhost','root','');

				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}

				mysql_select_db($db,$conexao);
				$table = "grupos";
				$select = "select nome_grup from ". $table . " where id_gru = ". $id_grupo .";";
				if($id_grupo != ""){
					$consulta = mysql_query($select,$conexao);
					$linha = mysql_fetch_row($consulta);
					return $linha[0];
				}else{
					return "";
				}
			}
		
			//INSERE NOVO NOTA
			if (isset($_POST["submit_nota_novo"])) {
				if( $_POST["titulo"] != "" && $_POST["select_contato"] != "null"){
					
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "notas";
					$campos = "(titulo,conteudo,id_usu_autor,id_usu_alvo,id_gru)";
					
					
					if($_POST["select_grupo"] != 'null'){
						$insert = "insert into ". $table . $campos . " values ('". $_POST["titulo"] ."','". $_POST["conteudo"] . "','". $_SESSION['id_usuario_conect'] ."','". $_POST["select_contato"] ."','". $_POST["select_grupo"] ."');";
					}else{
						$insert = "insert into ". $table . $campos . " values ('". $_POST["titulo"] ."','". $_POST["conteudo"] . "','". $_SESSION['id_usuario_conect'] ."','". $_POST["select_contato"] ."',NULL);";
					}
					
					$consulta = mysql_query($insert,$conexao);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaNotas.php'>";
				}
			}
			//UPDATE NOTA
			if (isset($_POST["submit_editar_nota"])) {
				if( $_POST["titulo"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}

					mysql_select_db($db,$conexao);
					
					$table = "notas";
					
					$update = "update ". $table . " set titulo = '". $_POST["titulo_ed"] ."', conteudo = '". $_POST["conteudo_ed"] ." where id_nota = '".  $_POST["id_nota_ed"] ."';";
					
					$consulta = mysql_query($update,$conexao);
					 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaNotas.php'>";
				}
			}
			
			//DELETE NOTA
			if (isset($_POST["submit_delete_nota"])){
				
				$db = "tf";
				$table = "notas";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				mysql_select_db($db,$conexao);
				
				$deletar = "Delete from ". $table . " where id_nota = ". $_POST["id_nota_del"];
				$consulta = mysql_query($deletar,$conexao);
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaNotas.php'>";
			}
		
		
?>
