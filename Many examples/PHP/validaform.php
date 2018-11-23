<?php
// define variables and set to empty values
$nameErr = $senhaErr = $postgetErr = $feedErr = $checkErr = $selectErr = "";
$name = $senha = $postget = $feed = $check = $select = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["nome"];
  $senha = $_POST["senha"];
  $feed = $_POST["feed"];
  $select = $_POST["selected"];
  $postget = $_POST["s"];
}else{
  $name = $_GET["nome"];
  $senha = $_GET["senha"];
  $feed = $_GET["feed"];
  $select = $_GET["selected"];
  $postget = $_GET["s"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["nome"])) {
   $nameErr = "Nome invalido";
 }

 if (empty($_POST["senha"])) {
   $senhaErr = "Senha invalido";
 }

 if (empty($_POST["feed"])) {
   $feedErr = "Feed invalido";
 }

 if (isset($_POST["selected"])) {
   $selectErr = "Select invalido";
 }

 if (!(isset($_POST["s"]))) {
   $postgetErr = "Radio invalido";
 }
}else{
 if (empty($_GET["nome"])) {
   $nameErr = "Nome invalido";
 }

 if (empty($_GET["senha"])) {
   $senhaErr = "Senha invalido";
 }

 if (empty($_GET["feed"])) {
   $feedErr = "Feed invalido";
 }

 if (isset($_GET["selected"])) {
   $selectErr = "Select invalido";
 }

 if (!(isset($_GET["s"]))) {
   $postgetErr = "Radio invalido";
 }
}

if($nameErr == $senhaErr && $postgetErr == $feedErr && $check == ""){
  echo '<script> alert(" Tudo certo:" + 
  "\n Nome: " +' . $name . '+
  "\n Senha: " +' . $senha . '+
  "\n Feed: " +' . $feed . '+
  "\n Select: " +' . $select . '
  ) </script>';
}
else{
    echo "<script> alert('O que esta invalido é: " .
    $nameErr . " " .
    $senhaErr . " " .
    $postgetErr . " " .
    $feedErr . " " .
    $check . " ') </script>";
}

$myfile = fopen("autenticacao.txt", "r") or die("Unable to open file!");

$id = fgets($myfile);
$pass = fgets($myfile);

(string)$pass = md5($pass);
(string)$senha = md5($senha);

if(strcmp($id,$name)){
  if(!strcmp($pass,$senha)){
    echo '<script> alert("Autenticacao com Sucesso") </script>';
  }else{
    echo '<script> alert("Autenticacao Falhou") </script>';
  }
}else{
  echo '<script> alert("Autenticacao Falhou") </script>';
}
fclose($myfile);



?>
