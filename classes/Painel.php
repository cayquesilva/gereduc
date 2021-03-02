<?php

class Painel{
    public static function logado(){
        // se existir session login retorna verdadeiro se n falso
        return isset($_SESSION['login']) ? true : false;
    }
}


?>