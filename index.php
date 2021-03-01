<?php include('config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gerenciamento geral de unidades educacionais."/>
    <meta name="keywords" content="tecnologia,informatica,matriculas,escolas,gerenciamento,administração,sistema"/>
    <meta name="author" content="RennSolucoes"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0"/>
    <link href="<?php echo INCLUDE_PATH;?>css/style.css" rel="stylesheet">
    <title>GerEduc</title>
</head>
<body>

<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'home';
    switch($url){
        case 'noticias':
            echo '<target target="noticias"/>';
        break;
        case 'cursos':
            echo '<target target="cursos"/>';
        break;
    }
?>
    <header>
        <div class="container">
            <div class="top-bar">
                <div class="Menu">
                    menu
                </div><!--menu-->
                <div class="logo">Logo</div><!--logo-->
                <div class="social"><!--social-->
                    Face
                    Insta
                </div>
            </div><!--top-bar-->
        </div><!--container-->
    </header>

    <div class="container-principal">
        <?php
            
            
            if(file_exists('pages/'.$url.".php")){
                include('pages/'.$url.".php");
            }else{
                //pagina não encontrada
                if($url != 'noticias' && $url != 'cursos'){
                    $pagina404 = true;
                    include('pages/404.php');
                }else{
                    include('pages/home.php');
                }
            }
        ?>
    </div><!--container-principal-->
    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
        <div class="container">
            <div class="footer-social">
                <h1>Encontre nossas redes sociais!</h1>
                <a>Facebook</a>
                <a>WhatApp</a>
                <a>Instagram</a>
            </div>
            <h1>Todos os direitos reservados | 2021</h1>
        </div><!--container-->
    </footer>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php INCLUDE_PATH?>js/scripts.js"></script>
</body>
</html>