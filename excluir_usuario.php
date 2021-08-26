<?php
session_start();
require 'config.php';
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

} else {
    header("Location: login.php");
}

if(isset($_GET['id_user']) && empty($_GET['id_user']) == false) {
    $id_user = addslashes($_GET['id_user']);
    $usuario_de_cadastro = addslashes($_SESSION['id']);
    date_default_timezone_set('America/Sao_Paulo');
    $data_cadastro = date('d/m/Y H:i:s');

    $sql = "UPDATE usuarios_dos_coletores SET status = 'Desativado', usuario_de_cadastro = '$usuario_de_cadastro', data_cadastro = '$data_cadastro' WHERE id_user = '$id_user'";
    $pdo->query($sql);
    
    header("Location: usuarios_dos_coletores.php");
        
}else{
    echo "Você não conseguiu excluir o usuario";
}
?>