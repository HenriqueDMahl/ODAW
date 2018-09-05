<html>
<body>

TESTE!!!!
<?php
// define variables and set to empty values
$nameErr = $senhaErr = $postgetErr = $feedErr = $check = "";

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

 if (isset($_POST["select"])) {
   $selectErr = "Select invalido";
 }

 if (!(isset($_POST["s"]))) {
   $postgetErr = "Radio invalido";
 }
 if (!(isset($_POST["check"]))){
     $check = "Check invalido";
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

 if (isset($_GET["select"])) {
   $selectErr = "Select invalido";
 }

 if (!(isset($_GET["s"]))) {
   $postgetErr = "Radio invalido";
 }
 if (!(isset($_GET["check"]))){
     $check = "Check invalido";
 }
}

?>
<?php echo "TESTE"; ?>
<?php
if($nameErr == $senhaErr && $postgetErr == $feedErr && $check == ""){
    echo "Tudo certo";
}
else{
    echo "O que esta invalido é: <br>" .
    $nameErr . "<br>" .
    $senhaErr . "<br>" .
    $postgetErr . "<br>" .
    $feedErr . "<br>" .
    $check . "<br>";
}?>


</body>
</html>
