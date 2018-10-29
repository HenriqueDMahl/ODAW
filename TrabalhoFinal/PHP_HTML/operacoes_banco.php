<?php

function insereNovoRegistro($nome,$idade,$end,$pass,$email,$fone,$sexo){
	
	$db = "tf";
	$conexao = mysql_connect('localhost','root','');

	if(!$conexao){
		die('Não foi possível conectar : '.mysql_error());
	}
	//echo 'Conexao bem sucedida <br>';

	mysql_select_db($db,$conexao);
	
	$table = "usuarios";
	$campos = "(nome_usu,end,sexo,idade,email,telefone,pass)";
	$insert = "insert into ". $table . $campos . " values (". $nome .",". $end .",". $sexo .",". $idade .",". $email .",". $fone .",". $pass .");";
	$consulta = mysql_query($insert,$conexao);
}

?>