<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}
require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $usuario = addslashes($_POST['usuario']);
    $area = addslashes($_POST['area']);
    $turno = addslashes($_POST['turno']);
    $lider = addslashes($_POST['lider']);
    $status = "Ativado";
    $usuario_de_cadastro = addslashes($_SESSION['id']); //estamos pegando o id do usuario do sistema que cadastrou o usuario dos coletores
    date_default_timezone_set('America/Sao_Paulo');
    $data_cadastro = date('d/m/Y H:i:s');

    $sql = $pdo->query("SELECT * FROM usuarios_dos_coletores WHERE cpf = '$cpf' OR usuario = '$usuario'");

    if($sql->rowCount() < 1){
        $sql = "INSERT INTO usuarios_dos_coletores SET nome = '$nome', cpf = '$cpf', usuario = '$usuario', lider = '$lider', area = '$area', 
                turno = '$turno', status = '$status', usuario_de_cadastro = '$usuario_de_cadastro', data_cadastro = '$data_cadastro'";
        $sql = $pdo->query($sql);

        header("Location: index.php");
    } else {
        echo "<script>alert('Usuário já existente')</script>";
    } 
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
        <div class="texto-cadastrar-usuario"><h2>Cadastrar Usuario</h2></div>
        <input class="input-form2" type="text" name="nome" autocomplete="off" placeholder="Nome" autofocus required value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : "" ?>" /><br/><br/>
        <input class="input-form2" type="text" name="cpf" autocomplete="off" placeholder="CPF" required value="<?php echo isset($_POST['cpf']) ? $_POST['cpf'] : "" ?>" /><br/><br/>
        <input class="input-form2" type="text" name="usuario" autocomplete="off" placeholder="Usuário" required value="<?php echo isset($_POST['usuario']) ? $_POST['usuario'] : "" ?>" /><br/><br/>
        <input class="input-form2" type="text" name="lider" autocomplete="off" placeholder="Lider" required value="<?php echo isset($_POST['lider']) ? $_POST['lider'] : "" ?>" /><br/><br/>
        <select name="area" class="select-area">
                <option>Selecione a Área</option>
                <option>Inbound</option>
                <option>Outbound</option>
                <option>ICQA</option>
            </select><br/><br/>
        <select name="turno" class="select-turno">
            <option>Selecione o Turno</option>
            <option>1° Turno</option>
            <option>2° Turno</option>
            <option>3° Turno</option>
        </select><br/><br/>
        <div class="div-btn">
            <input class="botao-cadastrar-usuario" type="submit" value="Cadastrar" />
        </div>
    </form><br/>
</body>
</html>

