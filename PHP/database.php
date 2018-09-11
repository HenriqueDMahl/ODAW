<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exemplos Javascrip</title>
    <link rel="stylesheet" type="text/css" href="../CSS/css_padrao.css">
  </head>
  <body>
    <script src="../JAVASCRIPT/funcoes.js"></script>
    <div class="divini">
        <img src="../IMAGENS/swl.png" alt="">
    </div>
    <hr size=6 width=80%>
        <h1 style="text-align: center; color: white;">Bem vindo! Que a força esteja com você!</h1>
    <hr size=6 width=80%>
    <div class="divd">
      <br>
      <br>
		<?php


		$db = "Roar";
		$table = "SquadraoSuicida";
		$campos = "(nome,utilidade)";
		$select = "Select * from ". $table . ";";
		$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
		$update = "update ". $table . " set nome = 'Marvin Graycastle' where nome = 'Marvin';";
		$delete = "delete from " . $table . " where nome = 'Marvin Graycastle';";

		$conexao = mysql_connect('localhost','root','');

		if(!$conexao){
			die('Não foi possível conectar : '.mysql_error());
		}
		echo 'Conexao bem sucedida <br>';

		mysql_select_db($db,$conexao);

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($select,$conexao);
		while($linha = mysql_fetch_row($consulta))
			echo 'Nome = '. $linha[0] . ' Utilidade = '. $linha[1] . '<br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($insert,$conexao);
		if($consulta)
			echo 'Insercao com sucesso <br>';
		else
			echo 'Fracasso na insercao <br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($select,$conexao);
		while($linha = mysql_fetch_row($consulta))
			echo 'Nome = '. $linha[0] . ' Utilidade = '. $linha[1] . '<br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($update,$conexao);
		if($consulta)
			echo 'Update com sucesso <br>';
		else
			echo 'Fracasso no update <br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($select,$conexao);
		while($linha = mysql_fetch_row($consulta))
			echo 'Nome = '. $linha[0] . ' Utilidade = '. $linha[1] . '<br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($delete,$conexao);
		if($consulta)
			echo 'Delete com sucesso <br>';
		else
			echo 'Fracasso no delete <br>';

		echo '<br>--------------------------------------------------------------<br>';

		$consulta = mysql_query($select,$conexao);
		while($linha = mysql_fetch_row($consulta))
			echo 'Nome = '. $linha[0] . ' Utilidade = '. $linha[1] . '<br>';

		echo '<br>--------------------------------------------------------------<br>';

		mysql_close($conexao);


		?>     
        <br><br>
        </div>
    </body>
</html>