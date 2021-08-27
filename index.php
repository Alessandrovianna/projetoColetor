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
    <title>Controle de Coletores</title>
</head>
<body class="body-banner">
    <div class="corpo-botoes1">
        <a href="cadastrar_coletor.php"><div class="botao-coletor">Cadastrar Coletor</div></a><br/>
        <a href="cadastrar_usuario.php"><div class="botao-usuario">Cadastrar Usuário</div></a><br/>
        <a href="relatorios.php"><div class="botao-relatorios">Relatórios</div><br/></a>
        <a href="todos_coletores.php"><div class="botao-todos-coletores">Todos Coletores</div></a><br/>
    </div>
    <div class="corpo-botoes2">
        <a href="entregar_coletor.php"><div class="botao-entregar-coletor">Entregar Coletor</div></a><br/>
        <a href="devolver_coletor.php"><div class="botao-devolver-coletor">Devolver Coletor</div></a><br/>
    </div>
    <div class="corpo-botoes3">
        <a href="sair.php"><div class="botao-sair">SAIR</div></a><br/>
    </div>
</body>
</html>


<?php
?>

