<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../CSS/css_telainicial.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_buttons.css" title="Default Styles" media="screen">
    <link rel="stylesheet" type="text/css" href="../CSS/css_tables.css" title="Default Styles" media="screen">
    <!-- <link rel="stylesheet" type="text/css" href="../CSS/css_imagens.css" title="Default Styles" media="screen"> -->
  </head>
  
  <body style="background-color: rgb(135,206,235);">
	<script src="../JAVASCRIPT/javascript.js"></script>
	<script src="../JAVASCRIPT/operacoes_tabela.js"></script>
	<SCRIPT SRC="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></SCRIPT>
	<div class = "div_corpo">
		<!-- MENU -->
		<div class="dropdown">
		  <button class="dropbtn">MENU</button>
		  <div class="dropdown-content">
			<a href="criar_contato.php">Cadastrar Contato</a>
			<a href="#">Cadastrar Grupo</a>
			<a href="#">Criar Alarme</a>
		  </div>
		</div>
	    <!-- Placeholder -->
		<div class = "div_principal">
			CORPO
			<table>
				<tr>
					<th> ID </th>
					<th> Nome </th>
					<th> E-mail </th>
					<th> Telefone </th>
					<th> Grupo(s) </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
					<th>  </th>
				<tr>
				<?php
					$db = "tf";
					$conexao = mysql_connect('localhost','root','');
					
					if(!$conexao){
						die('Não foi possível conectar : '.mysql_error());
					}
					//echo 'Conexao bem sucedida <br>';

					mysql_select_db($db,$conexao);
					
					monta_tabela("usuarios",$conexao); 
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
						echo $linha[7];
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
		};
		
		//$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		//$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		//$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";
		
?>
