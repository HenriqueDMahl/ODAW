<?php


$db = "Roar";
$table = "SquadraoSuicida";
$campos = "(nome,utilidade)";
$select = "Select * from ". $table . ";";
$insert = "insert into ". $table . $campos . " values ('Marvin','Talvez seja util');";
$update = "update ". $table . "set nome = 'Marvin Graycastle' where nome = 'Marvin';";
$delete = "delete from" . $table . "where nome = 'Marvin Graycastle';";

$conexao = mysql_connect('localhost','root','');

if(!$conexao){
	die('Não foi possível conectar : '.mysql_error());
}
echo 'Conexão bem sucedida <br>';

mysql_select_db($db,$conexao);

$consulta = mysql_query($select,$conexao);
while($linha = mysql_fetch_row($consulta))
	echo 'Nome = '. $linha[0] . ' Utilidade = '. $linha[1] . '<br>';

$consulta = mysql_query($insert,$conexao);
if($consulta)
	echo 'Inserção com sucesso <br>';
else
	echo 'Fracasso na inserção <br>';


$consulta = mysql_query($update,$conexao);
if($consulta)
	echo 'Update com sucesso <br>';
else
	echo 'Fracasso no update <br>';




mysql_close($conexao);


?>