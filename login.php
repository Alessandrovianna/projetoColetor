<link rel="stylesheet" type="text/css" href="../css/style.css" />
<?php
session_start();

require 'config.php'; 
if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){
     $usuario = addslashes($_POST['usuario']);
     $senha = md5(addslashes($_POST['senha']));

     $sql = $pdo->query("SELECT * FROM usuario_sistema WHERE usuario = '$usuario' AND senha = '$senha'");
    
    if($sql->rowCount() > 0){

        $dado = $sql->fetch();

        $_SESSION['id'] = $dado['id'];

        header("Location: index.php");
    } else {
        $msg =  "Usuário ou senha invalida";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="icon/png" href="imagens/iconbranca.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Controle de Coletores</title>
    </head>
<body id="body-login">
        <div class="divtext">
            <h1 class="xbra">XBRA</h1>
        </div>
        <div class="card" id="tela-login">
            <div class="card-body">
                <form method="POST">
                    <img src="imagens/luft.png" class="mt-3" style="width: 180px; margin-left:38px"><br/><br/>
                    <div class="form-group">
                        <input class="form-control mt-3" type="text" name="usuario" autocomplete="off" placeholder="Digite o usuário" autofocus />
                    </div><br/>
                    <div class="form-group">
                        <input class="form-control" type="password" name="senha" placeholder="Digite a senha"/>
                    </div><br/>
                    <div class="dv-btn-entrar">
                        <input class="btn btn-primary btn-lg btn-entrar" type="submit" value="Entrar" />
                    </div>
                </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>    
</html>