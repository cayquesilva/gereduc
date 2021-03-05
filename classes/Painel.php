<?php

class Painel{
    public static function logado(){
        // se existir session login retorna verdadeiro se n falso
        return isset($_SESSION['login']) ? true : false;
    }

    public static function logout(){
        //unset deleta a sessão
        //unset($_SESSION['']);
        session_destroy();
        header('Location: '.INCLUDE_PATH_PAINEL);
    }
}


?>