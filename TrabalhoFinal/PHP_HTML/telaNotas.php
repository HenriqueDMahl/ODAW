<!DOCTYPE html>
<?php 
	session_start();
	echo '<script>alert("'. $_SESSION['id_usuario_conect'] .'")</script>'
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
	<script src="../JAVASCRIPT/operacoes_tabela.js"></script>
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
			<a href="#">Lista Grupo</a>
			<a href="#">Lista Alarme</a>
		  </div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			<table>
				<tr>
					<th> ID </th>
					<th> Titulo </th>
					<th> Remetentes </th>
					<th> Grupo </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th> 
						<a class="button" href="#popup1">+</a>
						<div id="popup1" class="overlay">
							<div class="popup">
								<h2>Cadastrar Nova Nota</h2>
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
					
					monta_tabela("notas",$conexao); 
				?>
			</table>
		</div>
	</div>
  
  </body>
</html>
<?php
		function monta_tabela($table,$conexao){
			$select = "Select * from ". $table . " where id_usu = ". $_SESSION['id_usuario_conect'] .";";
			echo "<script>alert('". $select ."')</script>";
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
						echo $linha[4];
					echo '</td>';
					echo '<td>';
						echo $linha[5];
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
		}
			function deletar(){
				
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
		
		
		//$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		//$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		//$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";
		
?>
