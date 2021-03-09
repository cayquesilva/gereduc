<?php   

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
        
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);
    //melhorando caminho de pastas
    define('INCLUDE_PATH','http://localhost/projects/gereduc/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    define('BASE_DIR_PAINEL',__DIR__.'/painel');
    //conecção com bd
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','gereduc');
    define('NOME_EMPRESA','InteliEduc');
    //Funções
    
    function pegaCargo($indice){
        return Painel::$cargos[$indice];    
    }

    function selecionadoMenu($par){
        //pega a url, se for a url certa coloca menu active na classe da div.
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        //verifica se aquela permissão é compativel com o meu cargo
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            //aplica display none no menu que não pode aparecer para o usuario
            echo 'style="display:none;"';
        }
    }

    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/permissao-negada.php');
            die();
        }
    }

    function selecionadoMenu($par){
        //pega a url, se for a url certa coloca menu active na classe da div.
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        //verifica se aquela permissão é compativel com o meu cargo
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            //aplica display none no menu que não pode aparecer para o usuario
            echo 'style="display:none;"';
        }
    }

    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('painel/pages/permissao-negada.php');
            die();
        }
    }
?>