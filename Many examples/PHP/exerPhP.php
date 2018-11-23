<?php

$cookie_name = "usuário";
$cookie_value = "TESTE";
setcookie($cookie_name, $cookie_value, time() + 10, "/");


date_default_timezone_set("America/Sao_Paulo");
echo "Hoje é " . date("Y/m/d") . " e agora são " . date("h:i") . "<br>";

$cont = 0;

$fh = fopen('visitas.txt','r');
while ($line = fgets($fh)) {
  $cont = (int)$line + 1;
}
fclose($fh);

echo "<br>";

$fwr = fopen('visitas.txt', 'w+');
fwrite($fwr,(string)$cont);
fclose($fwr);
// <... Do your work with the line ...>
 echo "Esta página foi visitada ". $cont . " vezes <br><br>";

if(!isset($_COOKIE[$cookie_name])) {
    echo "Nome do Cookie é '" . $cookie_name . "' ele não foi setado!";
} else {
    echo "Cookie '" . $cookie_name . "' setado!<br>";
    echo "Valor é: " . $_COOKIE[$cookie_name];
}
?>
