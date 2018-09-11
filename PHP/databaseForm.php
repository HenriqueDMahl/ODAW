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
        $insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". $_POST["utilidade"] ."');";
        $update = "update ". $table . " set nome = '". $_POST["nome"] ."', utilidade = '". $_POST["utilidade"] ."' where nome = '".  $_POST["nome"] ."';";
        $delete = "delete from " . $table . " where nome = '".  $_POST["nome"] ."';";

        $conexao = mysql_connect('localhost','root','');

        if(!$conexao){
            die('Não foi possível conectar : '.mysql_error());
        }
        echo 'Conexao bem sucedida <br>';

        mysql_select_db($db,$conexao);
        if (!(isset($_POST["op"]))) {
            echo 'Nenhum opcao foi selecionada <br>';
        }else{
            switch ($_POST["op"]) {
                case 'novo':
                    $consulta = mysql_query($insert,$conexao);
                    if($consulta)
                        echo 'Insercao com sucesso <br>';
                    else
                        echo 'Fracasso na insercao <br>';
                    break;
                
                case 'editar':
                    $consulta = mysql_query($update,$conexao);
                    if($consulta)
                        echo 'Update com sucesso <br>';
                    else
                        echo 'Fracasso no update <br>';
                    break;

                case 'deletar':
                    $consulta = mysql_query($delete,$conexao);
                    if($consulta)
                        echo 'Delete com sucesso <br>';
                    else
                        echo 'Fracasso no delete <br>';
                    break;

                default:
                    echo '<hr>';

                    $consulta = mysql_query($select,$conexao);
                    while($linha = mysql_fetch_row($consulta))
                        echo '| Nome = '. $linha[1] . ' | Utilidade = '. $linha[2] . ' |<br>';
                    echo '<hr><br>';
                    break;
            }
        }

        mysql_close($conexao);


        ?>      
        <br><br>
        </div>
    </body>
</html>