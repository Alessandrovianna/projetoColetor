<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}

require 'config.php';
if(isset($_POST['modelo']) && empty($_POST['modelo']) == false) {
    $modelo = addslashes($_POST['modelo']);
    $sn = addslashes($_POST['sn']);
    $patrimonio = addslashes($_POST['patrimonio']);
    $area = addslashes($_POST['area']);
    date_default_timezone_set('America/Sao_Paulo');
    $usuario_de_cadastro = addslashes($_SESSION['id']); //estamos pegando o id do usuario do sistema que cadastrou o coletor
    $data_cadastro = date('d/m/Y H:i:s');

    $sql = $pdo->query("SELECT * FROM coletores WHERE sn = '$sn' OR patrimonio = '$patrimonio'");

    if($sql->rowCount() < 1){
        $sql = "INSERT INTO coletores SET modelo = '$modelo', sn = '$sn',
            patrimonio = '$patrimonio', area = '$area', usuario_de_cadastro = '$usuario_de_cadastro', data_cadastro = '$data_cadastro'";
        $sql = $pdo->query($sql);

        header("Location: index.php");
    } else {
        echo "<script>alert('Serial ou Patrimônio já existente')</script>";
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
        <form class="form2"method="POST">
            <div class="texto-cadastrar-coletor"><h2>Cadastrar Coletor</h2></div>
            <input class="input-form2" type="text" name="modelo" autocomplete="off" placeholder="Modelo" autofocus  required value="<?php echo isset($_POST['modelo']) ? $_POST['modelo'] : "" ?>" /><br/><br/>
            <input class="input-form2" type="text" name="sn" autocomplete="off" placeholder="Serial" required value="<?php echo isset($_POST['sn']) ? $_POST['sn'] : "" ?>" /><br/><br/>
            <input class="input-form2" type="text" name="patrimonio" autocomplete="off" placeholder="Patrimônio"  required value="<?php echo isset($_POST['patrimonio']) ? $_POST['patrimonio'] : "" ?>"/><br/><br/>
            <select name="area" class="select-area">
                <option>Selecione a Área</option>
                <option>Inbound</option>
                <option>Outbound</option>
                <option>ICQA</option>
            </select><br/><br/>
            <div class="div-btn">
                <input class="botao-cadastrar-coletor" type="submit" value="Cadastrar" />
            </div>
        </form><br/>
    </body>
</html>
