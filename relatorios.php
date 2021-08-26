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
    <div class="corpo-botoes1">
        <a href="usuarios_dos_coletores.php"><div class="botao-relatorio-usuarios">Relatório de Usuários</div></a><br/>
        <a href="usuarios_desativados.php"><div class="botao-relatorio-usuarios">Usuários Desativados</div></a><br/>
        <a href="relatorio_lider.php"><div class="botao-relatorio-lider">Relatório Por Lider</div></a><br/>
        <a href="relatorio_area.php"><div class="botao-relatorio-area">Relatório Por Área</div><br/></a>
        <a href="relatorios_entrega-devolucao.php"><div class="botao-entrega-devolucao">Relatório<br/> Entrega / Devolução</div></a><br/>
    </div>
    <div class="div-botoes-voltar">
        <a href="index.php"><div class="botao-voltar-relatorios">Voltar</div></a>
    </div>
</body>
</html>