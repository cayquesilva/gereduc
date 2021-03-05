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

</aside>
    <header>
        <div class="center">
            <div class="logout">
                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><i class="fas fa-sign-out-alt"></i></a>
            </div><!--logout-->
            <div class="clear"></div>
        </div><!--center-->
    </header>   
</body>
</html>