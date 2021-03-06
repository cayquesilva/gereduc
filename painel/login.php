<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet"/>
    <link href="<?php echo INCLUDE_PATH ?>css/font-awesome.min.css" rel="stylesheet"/>
    <title>Painel de Controle</title>
</head>
<body>
    <div class='box-login'>
    <?php 
        if(isset($_POST['acao'])){
            //recupera usuario e senha lá do form com name = acao
            $user = $_POST['user'];
            $password = $_POST['password'];
            //conectar
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                //logado
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['cargo']= $info['cargo'];
                $_SESSION['nome']=$info['nome'];
                $_SESSION['img']=$info['img'];
                $_SESSION['empresa']=$info['empresa'];
                header('Location: '.INCLUDE_PATH_PAINEL);
                die();
            }else{
                //falhou
                echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou Senha Incorreta</div>';
            }
        }
    ?>
        <h2>Efetue o Login</h2>
        <form method="post">
            <input type="text" name="user" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" name="acao" value="Logar">
        </form>
    </div><!--box-login-->
</body>
</html>