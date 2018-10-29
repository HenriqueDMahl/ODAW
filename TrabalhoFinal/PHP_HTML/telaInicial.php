<?php 



	global $id_usuario; 
			
	//RECEBE ID DO LOGIN
	if (isset($_POST["submit_login"])) {
		if( $_POST["login"] != "" && $_POST["pass"] != ""){
			$db = "tf";
			$conexao = mysql_connect('localhost','root','');

			if(!$conexao){
				die('Não foi possível conectar : '.mysql_error());
			}
			//echo 'Conexao bem sucedida <br>';

			mysql_select_db($db,$conexao);
			$table = "usuarios";
			$select = "select id_usu from " . $table . " where nome_usu = '" . $_POST["login"] . "' and pass = '" . $_POST["pass"] . "';";
			$consulta = mysql_query($select,$conexao);
			$linha = mysql_fetch_row($consulta);
			$id_usuario = (int)$linha[0];
		}
	}

?>
<!DOCTYPE html>
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
	<script src="../JAVASCRIPT/operacoes_tabela.js"></script>
	<script src="../JAVASCRIPT/popup.js"></script>
	<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
	<div class = "div_corpo">
		<!-- MENU -->
		<div class="dropdown">
		  <button class="dropbtn">MENU</button>
		  <div class="dropdown-content">
			<a href="#">Lista Grupos</a>
			<a href="telaNotas.php">Lista Notas</a>
			<a href="#">Lista Alarmes</a>
		  </div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			<table>
				<tr>
					<th> ID </th>
					<th> Nome </th>
					<th> E-mail </th>
					<th> Telefone </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th> 
					<a class="button" href="#popup1">+</a>
					<div id="popup1" class="overlay">
						<div class="popup">
							<h2>Cadastrar Novo Contato</h2>
							<a class="close" href="#">&times;</a>
							<form id="form_contatos" class="form_registro" action="../PHP_HTML/telaInicial.php" method="POST">
								<p>Nome*:<br><input type="text" name="nome" id="nome" value=""></p>
								<p>Endereço*:<br><input type="text" name="ender" id="ender" value=""></p>
								<p>Idade:<br><input type="text" name="idade" id="idade" value=""></p>
								<p id="email1">Email*:<br><input type="text" name="email" id="email" onblur="is_email()"></p>
								<p>Telefone*:<br><input type="text" name="fone" id="fone" value=""></p>
								<p>Sexo:</p>
								<p>
									Masculino<input type="radio" name="sexo" id="sexo" value="M">
									Feminino<input type="radio" name="sexo" id="sexo" value="F">
									Outro<input type="radio" name="sexo" id="sexo" value="O">
								</p>
								<input type="text" name="id" id="id" value="<?php echo $GLOBALS['id_usuario'] ?>" hidden>
								<p>
									<a href="#" class="buttom_cancelar">Cancelar</a>
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						 			<button id="btConfirmar" name="submit_contato_novo" type="submit" class="buttom_confirmar" onclick="valida_registro()">Confirmar</button>
								</p>
						  </form>
						</div>
					</div>
					<!--<button style="border-radius: 5px;" onclick="trigger_popup_fricc">+</button>-->
					</th>
				<tr>
				<?php
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');
					
					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

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
			$select = "Select * from ". $table . ";";
			$consulta = mysql_query($select,$conexao);
			while($linha = mysql_fetch_row($consulta)){
				echo '<tr>';
					echo '<td name="id">';
						echo $linha[0];
					echo '</td>';
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
						echo '<a href="tela_alaermes.php"> <img src="../IMAGENS/note.png" height="20" width="20"> </a> ';
					echo '</td>';
					echo '<td>';
						echo '<a href="#"> <img src="../IMAGENS/lupa.png" height="20" width="20" onclick="pegaID('. $linha[0] .')"> </a>';
					echo '</td>';
					echo '<td>';
						echo '<a href="tela_alaermes.php"> <img src="../IMAGENS/bell.png" height="20" width="20"> </a> ';
					echo '</td>';
					echo '<td>';
						echo '<a href="editar_contato.php"> <img src="../IMAGENS/pencil.png" height="20" width="20"> </a>';
					echo '</td>';
					echo '<td>';
						echo '<a href="" onclick=""> <img src="../IMAGENS/delet.png" height="20" width="20"> </a> ';
					echo '</td>';
				echo '</tr>';
			}
			
			function deletar($id){
				$db = "tf";
				$table = "usuarios";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				mysql_select_db($db,$conexao);
				
				$deletar = "Delete from ". $table . " where id_usu = ". $id;
				$consulta = mysql_query($deletar,$conexao);
				
			}
			
			function select($id){

				$db = "tf";
				$table = "usuarios";
				$conexao = mysql_connect('localhost','root','');
				$a = array();
				
				if(!$conexao){
					die('Não foi possível conectar : '.mysql_error());
				}
				//echo 'Conexao bem sucedida <br>';

				mysql_select_db($db,$conexao);
				$select = "Select * from ". $table . " where id_usu = ". $id .";";
				$consulta = mysql_query($select,$conexao);
				while($linha = mysql_fetch_row($consulta)){
					array_push($a,$linha[0],$linha[1],$linha[2],$linha[3],$linha[4],$linha[5],$linha[6],$linha[7],$linha[8]);
				}
				
				return $a;
			}
			
			//INSERE NOVO CONTATO
			if (isset($_POST["submit_contato_novo"])) {
				if( $_POST["nome"] != "" && $_POST["ender"] != "" && $_POST["email"] != "" && $_POST["fone"] != "" && $_POST["id"] != ""){
					
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');

					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					$table = "contatos";
					$campos = "(nome_usu,end,sexo,idade,email,telefone,id_usu_relativo)";
					
					$insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". $_POST["ender"] . "','". $_POST["sexo"] ."','". $_POST["idade"] ."','". $_POST["email"] ."','". $_POST["fone"] ."','". $_POST["id"] ."');";
					
					$consulta = mysql_query($insert,$conexao);
				}
			}
		};
		
		//$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		//$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		//$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";
		
?>
