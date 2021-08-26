<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}

require 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="icon/png" href="imagens/iconbranca.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Coletores</title>
    </head>
    <body class="body-relatorios">
        <div class="div-form-buscar">
            <form method="POST">
                <input class="input-buscar" type="text" name="buscar" autocomplete="off" placeholder="Digite a situação ou patrimônio..." autofocus />
                <input class="botao-input-buscar" type="submit" value="Buscar">
            </form>
        </div>
        <table class="tabela-relatorio-entrega-devolucao" border="0" width="60%">
            <tr>
                <th class="th-relatorio-entrega-devolucao">Usuário</th>
                <th class="th-relatorio-entrega-devolucao">Patrimônio</th>
                <th class="th-relatorio-entrega-devolucao">Situação</th>
                <th class="th-relatorio-entrega-devolucao">Status</th>
                <th class="th-relatorio-entrega-devolucao">Data</th>
            </tr>
            <?php
            $sql = "";
            if(isset($_POST['buscar'])){
                $sql = "SELECT * FROM relatorios_entrega_devolucao WHERE CONCAT(numero_patrimonio, situacao) LIKE '%".$_POST['buscar']."%'";
            }else{
                $sql = "SELECT * FROM relatorios_entrega_devolucao";
            }
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0) {
                foreach($sql->fetchAll() as $relatorio) {
                    echo '<tr>';
                    echo '<td class="td-relatorio-entrega-devolucao">'.$relatorio['usuario'].'</td>';
                    echo '<td class="td-relatorio-entrega-devolucao">'.$relatorio['numero_patrimonio'].'</td>';
                    echo '<td class="td-relatorio-entrega-devolucao">'.$relatorio['situacao'].'</td>';
                    echo '<td class="td-relatorio-entrega-devolucao">'.$relatorio['status'].'</td>';
                    echo '<td class="td-relatorio-entrega-devolucao">'.$relatorio['data_hora'].'</td>';
                    echo '</tr>';
                }     
            }
            
            ?>

        </table><br/><br/>
        <div class="div-botoes-voltar">
            <a href="relatorios.php"><div class="botao-voltar-entrega-devolucao">Voltar</div></a>
        </div>
    </body>
</html>