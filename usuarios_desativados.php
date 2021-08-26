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
                <input class="input-buscar" type="text" name="buscar" autocomplete="off" placeholder="Digite o usuário..." autofocus />
                <input class="botao-input-buscar" type="submit" value="Buscar">
            </form>
        </div>
        <table class="tabela-usuarios" border="0" width="80%">
            <tr>
                <th class="th-usuarios">Nome</th>
                <th class="th-usuarios">CPF</th>
                <th class="th-usuarios">Usuário</th>
                <th class="th-usuarios">Área</th>
                <th class="th-usuarios">Turno</th>
                <th class="th-usuarios">Lider</th>
                <th class="th-usuarios">Data de Desativação</th>
                <th class="th-usuarios">Ações</th>
            </tr>

            <?php
            $sql = "";
            if(isset($_POST['buscar'])){
                $sql = "SELECT * FROM usuarios_dos_coletores WHERE CONCAT(usuario) LIKE '%".$_POST['buscar']."%'";
            }else{
                $sql = "SELECT * FROM usuarios_dos_coletores WHERE status = 'Desativado' ORDER BY data_cadastro";
            }
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0) {
                foreach($sql->fetchAll() as $usuarios) {
                    echo '<tr>';
                    echo '<td class="td-usuarios">'.$usuarios['nome'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['cpf'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['usuario'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['area'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['turno'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['lider'].'</td>';
                    echo '<td class="td-usuarios">'.$usuarios['data_cadastro'].'</td>';
                    //echo '<td class="td-button"><a class="button" href="../../php/excluir_usuario.php?id_user='.$usuarios["id_user"].'">Desativar</a></td>';
                    ?>
                    <td class="td-button"><a class="button"  onclick="return confirm('Deseja Ativar o usuário?');" href="ativar_usuario.php?id_user=<?=$usuarios['id_user']?>">Ativar</a></td>
                    <?php
                    echo '</tr>';
                }     
            }
            ?>

        </table><br/><br/>
        <div class="div-botoes-voltar">
            <a href="relatorios.php"><div class="botao-voltar-usuarios">Voltar</div></a>
        </div>
    </body>
</html>
