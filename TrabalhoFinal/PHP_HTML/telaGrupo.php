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
	<script src="../JAVASCRIPT/funcao_grupo.js"></script>
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
			<a href="telaNotas.php">Lista Notas</a>
			<a href="telaAlarme.php">Lista Alarme</a>
		  </div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			<table>
				<tr>
					<th> ID </th>
					<th> Nome </th>
					<th> Qtd </th>
					<th> Membros </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th> 
						<a class="button" href="#popupInicial">+</a>
						<div id="popupInicial" class="overlay">
							<div class="popup">
								<h2>Cadastrar Novo Grupo</h2>
								<a class="close" href="#">&times;</a>
								<form id="form_notas" class="form_registro" action="../PHP_HTML/telaGrupo.php" method="POST">
									<p>Nome*:<br><input type="text" name="nome" id="nome" value=""></p>
									<p>Membros Novo:<br>
									<?php monta_combobox("contatos","id_contato,nome_usu",1) ?>
									<a class="button" style="color: black;" onclick="adicionar()">Adicionar</a>
									</p>								
									<p>Membros:<br><textarea id="txtArea" rows="4" cols="50" name="membros" form="form_notas" disabled></textarea></p>
									<input type="text" id="ids" value="" hidden>
									<p>
										<a href="#" class="buttom_cancelar">Cancelar</a>
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
										&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							 			<button id="btConfirmar" name="submit_grupo_novo" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
									</p>
							  </form>
							</div>
						</div>
					</th>
				<tr>
				<?php monta_tabela("grupos"); ?>
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
				echo '<select id="contatos"  name = "select_contato">';
				$select = "select ". $campos ." from ". $table ." where id_usu_relativo = " . $_SESSION['id_usuario_conect'] . ";";
			}else{
				echo '<select name = "select_grupo">';
				$select = "select ". $campos ." from ". $table .";";
			}
			$consulta = mysql_query($select,$conexao);
			
			echo '<option value="null"></option>';
			while($linha = mysql_fetch_row($consulta)){
				echo '<option name="'. $linha[1] .'" value="'. $linha[0] .'">';
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
			//echo 'Conexao bem sucedida <br>';

			mysql_select_db($db,$conexao);
			$select = "Select * from ". $table . ";";
			echo "<script>alert('". $select ."')</script>";
			$consulta = mysql_query($select,$conexao);
			while($linha = mysql_fetch_row($consulta)){
				if(strchr($linha[3],"". $_SESSION['id_usuario_conect'] ."U") != ""){
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
							echo getMembros($linha[3]);
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
								 <img src="../IMAGENS/lupa.png" height="20" width="20"> 
								 </a>
								 <div id="popup'. ($linha[0]) .'" class="overlay">
									<div class="popup">
										<h2>Visualizar Grupo</h2>
										<a class="close" href="#">&times;</a>
										<form id="form_notas_visual" class="form_registro" action="../PHP_HTML/telaGrupo.php" method="POST">
											<p>Nome*:<br><input type="text" id="titulo" value="'. $linha[1] .'" disabled></p>
											<p>Membros:<br><textarea rows="4" cols="50" name="comment" form="form_notas_visual" disabled>'. getMembros($linha[3]) .'</textarea></p>
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
										<h2>Editar Grupo</h2>
										<a class="close" href="#">&times;</a>
										<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaGrupo.php" method="POST">
											<p>Nome*:<br><input type="text" id="titulo" value="'. $linha[1] .'"></p>
											<?php monta_combobox("contatos","id_contato,nome_usu",1) ?>
											<p>Membros:<br><textarea rows="4" cols="50" name="comment" form="form_notas_visual" disabled>'. getMembros($linha[3]) .'</textarea></p>
									  </form>
									</div>
								</div>';
						echo '</td>';
						echo '<td>';
							echo '<a href="#"> 
									<form action="../PHP_HTML/telaGrupo.php" method="POST"> 
										<button name="submit_delete_grupo" type="submit"> 
											<img src="../IMAGENS/delet.png" height="20" width="20">
										</button> 
										<input type="text" name="id_grupo_del" id="id" value="'. $linha[0] .'" hidden>
									</form> 
								   </a> ';
						echo '</td>';
					echo '</tr>';
				}
			}
		}
			
			function getMembros($lista){
				$db = "tf";
				$conexao = mysql_connect('localhost','root','');
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				//echo 'Conexao bem sucedida <br>';
				
				mysql_select_db($db,$conexao);
				$select = "select id_contato,nome_usu from contatos where id_usu_relativo = ". $_SESSION['id_usuario_conect'] . ";";
				$consulta = mysql_query($select,$conexao);
				$membros = "";
				$lista = str_replace($_SESSION['id_usuario_conect'] . "U", "", $lista);
				while($linha = mysql_fetch_row($consulta)){
					if(strchr($lista,$linha[0]) != ""){
						$membros = $membros . "," . $linha[1];
					}
				}
				return substr($membros,1);
			}
		
			//INSERE NOVO GRUPO
			if (isset($_POST["submit_grupo_novo"])) {
				if( $_POST["nome"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "grupos";
					$campos = "(nome_grup,qtd,lista_mem,lista_notas)";
					
					$insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". (strlen($_POST["membros"])+1) . "','". $_SESSION['id_usuario_conect'] . "," . $_POST["membros"] ."',NULL);";
		
					$consulta = mysql_query($insert,$conexao);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaGrupo.php'>";
				}
			}
			//UPDATE CONTATO
			if (isset($_POST["submit_editar_nota"])) {
				if( $_POST["titulo"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "notas";
					
					$update = "update ". $table . " set titulo = '". $_POST["titulo"] ."', conteudo = '". $_POST["conteudo"] ." where id_nota = '".  $_POST["id_nota_ed"] ."';";
					
					$consulta = mysql_query($update,$conexao);
					 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaGrupo.php'>";
				}
			}
			
			//DELETE GRUPO
			if (isset($_POST["submit_delete_grupo"])){
				
				$db = "tf";
				$table = "grupos";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				mysql_select_db($db,$conexao);
				
				$consulta = mysql_query("Select lista_mem from grupos where id_gru =" . $_POST["id_grupo_del"] . ";", $conexao);
				$linha = mysql_fetch_row($consulta);
				if(strpos($linha,$_POST["id_grupo_del"]) != 0){
					echo "<script>alert('Você não é o dono do grupo! Pemissão negada!')</script>";
				}else{
					$deletar = "Delete from ". $table . " where id_gru = ". $_POST["id_grupo_del"];
					$consulta = mysql_query($deletar,$conexao);
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=telaGrupo.php'>";
				}
			}
		
		
		//$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		//$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		//$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";
		
?>
