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
      
      <form id="form" class="" action="../PHP/databaseForm.php" method="POST">
        O que deseja fazer?<br><hr>
        NOVO<input type="radio" name="op" id="novo" value="novo">
        EDITAR<input type="radio" name="op" id="editar" value="editar">
        APAGAR<input type="radio" name="op" id="delete" value="deletar">
        VISUALIZAR<input type="radio" name="op" id="show" value="show">
        <br><hr>
        1) Nome      <input id="nome" type="text" name="nome" value=""><br>
        2) Utilidade <select id = "senha" name = "utilidade">
              <option value="null">...............................................</option>
              <option value="Util">Util</option>
              <option value="Inutil">Inutil</option>
              <option value="Cepa">Cepa</option>
            </select><br>
		3) Roar Approves?<input id = "check" name = "checkbox" type="checkbox" name="gsw" value="SIM"><br><hr>
        <button type="submit">Confirmar</button> <button type="reset">Limpar</button>
      </form>
        <?php


        $db = "Roar";
        $table = "SquadraoSuicida";
        $campos = "(nome,utilidade)";
        $select = "Select * from ". $table . ";";
		$teste = "";
		if(isset($_POST["checkbox"]))
		{
			$teste = "SIM";
		}
		else
		{
			$teste = "NAO";
		}
        $insert = "insert into ". $table . $campos . " values ('". $_POST["nome"] ."','". $_POST["utilidade"] . " " . $teste . "');";
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
                    echo '<hr>';
                    echo '<table style="text-align:center;background-color:black;margin-left:auto;margin-right:auto;">';
                    
                    echo '<tr style="border: 1px solid white;">';
                    
                    echo '<th style="color: white;border: 1px solid white;">Nome</th>';
                    echo '<th style="color: white;border: 1px solid white;">Utilidade</th>';
                    
                    echo '</tr>';
                    
                    while($linha = mysql_fetch_row($consulta))
                        echo '<tr style="border: 1px solid white;"><td style="border: 1px solid white;">'. $linha[1] . '</td> <td style="border: 1px solid white;">'. $linha[2] . '</td></tr>';
                    
                    echo '</table>';
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
