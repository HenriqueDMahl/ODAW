<!DOCTYPE html>
<?php 
	session_start();
	
	if(!isset($_SESSION['id_usuario_conect'])){
		echo "<script>alert('Login ou senha invalido!')</script>";
		header("Location: http://localhost/ODAW-master/TrabalhoFinal/PHP_HTML/index132.php");
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
    <!-- <link rel="stylesheet" type="text/css" href="../CSS/css_imagens.css" title="Default Styles" media="screen"> -->
  </head>
  
  <body style="background-color: rgb(135,206,235);">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
	<div class = "div_corpo">
		<!-- MENU -->
		&emsp;
		<a href="index132.php" onclick="">Sair</a>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<div class="dropdown">
		  <button class="dropbtn">MENU</button>
		  <div class="dropdown-content">
			<a href="telaInicial.php">Lista Contato</a>
			<a href="telaGrupo.php">Lista Grupo</a>
			<a href="telaNotas.php">Lista Notas</a>
		  </div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			<table>
				<tr>
					<th> ID </th>
					<th> Nome </th>
					<th> Data e Hora </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th> 
						<a class="button" href="#popup1">+</a>
						<div id="popup1" class="overlay">
							<div class="popup">
								<h2>Cadastrar Novo Alarme</h2>
								<a class="close" href="#">&times;</a>
								<form id="form_notas" class="form_registro" action="../PHP_HTML/telaAlarme.php" method="POST">
									<p>Nome*:<br><input type="text" name="nome" id="nome" value=""></p>
									<p>Data/Hora*:<br><input type="text" name="data" value=""></p>
									<p>Lembrete:<br><textarea rows="4" cols="50" name="lembrete" form="form_notas"></textarea></p>
									<p>
										<a href="#" class="buttom_cancelar">Cancelar</a>
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							 			<button id="btConfirmar" name="submit_alarme_novo" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
									</p>
							  </form>
							</div>
						</div>
					</th>
				<tr>
				<?php monta_tabela("alarmes"); ?>
			</table>
		</div>
	</div>
  
  </body>
</html>
<?php
	/*
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

		}*/


		function monta_tabela($table){
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');
			
			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}
			//echo 'Conexao bem sucedida <br>';

			mysql_select_db($db,$conexao);
			$select = "Select * from ". $table . " where id_usu = " . $_SESSION['id_usuario_conect'] . ";";
			echo "<script>alert('". $select ."')</script>";
			$consulta = mysql_query($select,$conexao);
			while($linha = mysql_fetch_row($consulta)){
				echo '<tr>';
					echo '<td name="id">';
						echo $linha[0];
					echo '</td>';
					echo '<td name="titulo">';
						echo $linha[1];
					echo '</td>';
					echo '<td>';
						echo $linha[2];
					echo '</td>';
					echo '<td>';
						echo '<a href="telaNotas.php"> <img src="../IMAGENS/note.png" height="20" width="20"> </a> ';
					echo '</td>';
					echo '<td>';
						echo '<a href="#popup2"> 
						     <img src="../IMAGENS/lupa.png" height="20" width="20"> 
							 <div id="popup2" class="overlay">
								<div class="popup">
									<h2>Visualizar Alarme</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_notas_visual" class="form_registro" action="../PHP_HTML/telaAlarme.php" method="POST">
										<p>Nome*:<br><input type="text" id="titulo" value="'. $linha[1] .'" disabled></p>
										<p>Data/Hora*:<br><input type="text" id="idade" value="'. $linha[2] .'" disabled></p>
										<p>Lembrete:<br><textarea rows="4" cols="50" name="comment" form="form_notas_visual" disabled>'. $linha[3] .'</textarea></p>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
										</p>
								  </form>
								</div>
							</div>
							 </a>';
					echo '</td>';
					echo '<td>';
						echo '<a href="tela_alaermes.php"> <img src="../IMAGENS/bell.png" height="20" width="20"> </a> ';
					echo '</td>';
					echo '<td>';
						echo '<a href="#popup3"> 
						     <img src="../IMAGENS/pencil.png" height="20" width="20"> 
							 <div id="popup3" class="overlay">
								<div class="popup">
									<h2>Editar Alarme</h2>
									<a class="close" href="#">&times;</a>
									<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaAlarme.php" method="POST">
										<p>Nome*:<br><input type="text" name="nome_ed" id="titulo" value="'. $linha[1] .'"></p>
										<p>Data/Hora*:<br><input type="text" name="data_ed" id="idade" value="'. $linha[2] .'"></p>
										<p>Lembrete:<br><textarea rows="4" cols="50" name="lembrete_ed" form="form_notas_visual">'. $linha[3] .'</textarea></p>
										<input type="text" name="id_alarme_ed" id="id_alarme_ed" value="'. $linha[0] .'" hidden>
										<p>
											<a href="#" class="buttom_cancelar">Cancelar</a>
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
											&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								 			<button id="btConfirmar" name="submit_editar_alarme" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
										</p>
								  </form>
								</div>
							</div>
							 </a>';
					echo '</td>';
					echo '<td>';
						echo '<a href="#"> 
								<form action="../PHP_HTML/telaAlarme.php" method="POST"> 
									<button name="submit_delete_alarme" type="submit"> 
										<img src="../IMAGENS/delet.png" height="20" width="20">
									</button> 
									<input type="text" name="id_alarme_del" id="id" value="'. $linha[0] .'" hidden>
								</form> 
							   </a> ';
					echo '</td>';
				echo '</tr>';
			}
		}
			/*
			function getRemetente($id_rementete){
				$db = "tf";
				$conexao = mysql_connect('localhost','root','');

				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				//echo 'Conexao bem sucedida <br>';

				mysql_select_db($db,$conexao);
				$table = "contatos";
				$select = "select nome_usu from ". $table . " where id_contato = ". $id_rementete .";";
				$consulta = mysql_query($select,$conexao);
				$linha = mysql_fetch_row($consulta);
				return $linha[0];
			}*/
		
			//INSERE NOVO ALARME
			if (isset($_POST["submit_alarme_novo"])) {
				if( $_POST["nome"] != "" && $_POST["data"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "alarmes";
					$campos = "(nome_ala,data_hora_ala,lembrete,id_usu)";
					
					$insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". $_POST["data"] . "','". $_POST["lembrete"] ."','". $_SESSION['id_usuario_conect'] ."');";
					
					$consulta = mysql_query($insert,$conexao);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaAlarme.php'>";
				}
			}
			//UPDATE ALARME
			if (isset($_POST["submit_editar_alarme"])) {
				if( $_POST["titulo"] != "" && $_POST["data_ed"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "alarmes";
					
					$update = "update ". $table . " set nome_ala = '". $_POST["nome_ed"] ."', data_hora_ala = '". $_POST["data_ed"] .", lembrete". $_POST["lembrete_ed"] ." where id_ala = '".  $_POST["id_alarme_ed"] ."';";
					
					$consulta = mysql_query($update,$conexao);
					 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaAlarme.php'>";
				}
			}
			
			//DELETE ALARME
			if (isset($_POST["submit_delete_alarme"])){
				
				$db = "tf";
				$table = "alarmes";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				mysql_select_db($db,$conexao);
				
				$deletar = "Delete from ". $table . " where id_ala = ". $_POST["id_alarme_del"];
				$consulta = mysql_query($deletar,$conexao);
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaAlarme.php'>";
			}
		
		
		//$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		//$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		//$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";
		
?>
