<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}

require 'config.php';
if(isset($_POST['usuario']) && empty($_POST['usuario']) == false) {
    $usuario = addslashes($_POST['usuario']);
    $numero_patrimonio = addslashes($_POST['numero_patrimonio']);
    $situacao = "Entregue";
    $status = "Bom";
    date_default_timezone_set('America/Sao_Paulo');
    $usuario_entrega_recebe = addslashes($_SESSION['id']); //estamos pegando o id do usuario do sistema que entregou o coletor
    $data_hora = date('d/m/Y H:i:s');

    $sql = "INSERT INTO relatorios_entrega_devolucao SET usuario = '$usuario', numero_patrimonio = '$numero_patrimonio',
            situacao = '$situacao', status = '$status', usuario_entrega_recebe = $usuario_entrega_recebe, data_hora = '$data_hora'";
    $sql = $pdo->query($sql);

    header("Location: index.php");
}
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
<body class="body-banner-botoes">
<a href="index.php"><img src="imagens/luft.png" style="width: 180px;"></a><br/><br/>
    <form class="form2" method="POST">
        <div class="texto-entregar-coletor"><h2>Entregar Coletor</h2></div>
        <input class="input-form2" type="text" name="usuario" autocomplete="off" placeholder="Usuário" autofocus required /><br/><br/>
        <input class="input-form2" type="text" name="numero_patrimonio" autocomplete="off" placeholder="Coletor" required /><br/><br/>
        <div class="div-btn">
            <input class="botao-confirmar-entrega"type="submit" value="Confirmar" />
        </div>
    </form><br/>
</body>
</html>
