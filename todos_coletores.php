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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="icon" type="icon/png" href="imagens/iconbranca.png" />
    <title>Coletores</title>
</head>
<body class="body-relatorios">
<div class="div-form-buscar">
            <form method="POST">
                <input class="input-buscar" type="text" name="buscar" autocomplete="off" placeholder="Digite a patrimônio..." autofocus />
                <input class="botao-input-buscar" type="submit" value="Buscar">
            </form>
        </div>
<table class="tabela-coletores"  border="0" width="60%">
    <tr>
        <th class="th-coletor">Modelo</th>
        <th class="th-coletor">Serial</th>
        <th class="th-coletor">Patrimônio</th>
        <th class="th-coletor">Area</th>
        <th class="th-coletor">Data</th>
    </tr>
    <?php
    $sql = "";
    if(isset($_POST['buscar'])){
        $sql = "SELECT * FROM coletores WHERE CONCAT(patrimonio) LIKE '%".$_POST['buscar']."%'";
    }else{
        $sql = "SELECT * FROM coletores";    
    }
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0) {
        foreach($sql->fetchAll() as $coletor) {
            echo '<tr>';
            echo '<td class="td-coletores">'.$coletor['modelo'].'</td>';
            echo '<td class="td-coletores">'.$coletor['sn'].'</td>';
            echo '<td class="td-coletores">'.$coletor['patrimonio'].'</td>';
            echo '<td class="td-coletores">'.$coletor['area'].'</td>';
            echo '<td class="td-coletores">'.$coletor['data_cadastro'].'</td>';
            echo '</tr>';
        }
    }
    ?>
</table><br/><br/>
<div class="div-botoes-voltar">
    <a href="index.php"><div class="botao-voltar-coletores">Voltar</div></a>
</div>
</body>
</html>