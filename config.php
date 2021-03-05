<?php   

    session_start();
    $autoload = function($class){
        
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);
    //melhorando caminho de pastas
    define('INCLUDE_PATH','http://localhost/projects/gereduc/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //conecção com bd
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','gereduc');

    //Funções
    function pegaCargo($cargo){
        $arr = [
            '0'=> 'Normal',
            '1'=> 'Sub Administrador',
            '2'=> 'Administrador'];
        return $arr[$cargo];    
    }
?>