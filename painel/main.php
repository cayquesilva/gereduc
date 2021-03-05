<?php 
    if(isset($_GET['logout'])){
        Painel::logout();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet"/>
    <link href="<?php echo INCLUDE_PATH ?>css/all.min.css" rel="stylesheet"/>
    <title>Painel de Controle</title>
</head>
<body>

<aside class="menu">
    <div class="menu-wrapper">
        <div class="box-usuario">
            <?php
                if($_SESSION['img'] == ''){
            ?>
            <div class="avatar-usuario">
                <i class="fa fa-user"></i>
            </div><!--avatar-usuario-->
            <?php }else{ ?>
            <div class="imagem-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
            </div><!--imagem-usuario-->
            <?php } ?>
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
            </div><!--nome-usuario-->
        </div><!--box-usuario-->
    </div><!--menu-wrapper-->
</aside><!--menu-->
    <header>
        <div class="center">
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div><!--menu-btn-->
            <div class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><i class="fas fa-sign-out-alt"></i><span>Sair</span></a>
            </div><!--logout-->
            <div class="clear"></div>
        </div><!--center-->
    </header>   
    <div class="content">
        <div class="box-content left w100">
            
        </div><!--box=content-->
        <div class="box-content left w100">
            
        </div><!--box=content-->
        <div class="box-content left w50">
            
        </div><!--box=content-->
        <div class="box-content right w50">
            
        </div><!--box=content-->
        <div class="clear"></div>
    </div><!--content-->
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>