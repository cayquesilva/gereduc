<?php

class Painel{

    public static  $cargos = [
        '0'=> 'Normal',
        '1'=> 'Sub Administrador',
        '2'=> 'Administrador'];

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

    public static function carregarPagina(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                //Página não existe!
                header('Location: '.INCLUDE_PATH_PAINEL);
            }
        }else{
            include('pages/home.php');
        }
    }

    public static function listarUsuariosOnline(){
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
        $sql->execute();
        //pega todos os valores do select *
        return $sql->fetchAll();
    }

    public static function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultimo_acesso < '$date' - INTERVAL 1 MINUTE");
    }

    public static function pegaVisitaTotal(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
        $sql->execute();
        return $sql->rowCount();
    }

    public static function pegaVisitaHoje(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
        $sql->execute(array(date('Y-m-d')));
        return $sql->rowCount();
    }

    public static function alerta($tipo,$mensagem){
        if($tipo == 'sucesso'){
            echo '<div class="box-alerta sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
        }else if($tipo == 'erro'){
            echo '<div class="box-alerta erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
        }
    }

    public static function imagemValida($imagem){
        //testa tipos de imagens permitido
        if($imagem['type'] == 'image/jpg' ||
            $imagem['type'] == 'image/jpeg' ||
            $imagem['type'] == 'image/png'){
            //pega tamanho da imagem e converte em kb e mostra somente o inteiro
            //double = 12.5 intval() = 12
            $tamanho = intval($imagem['size']/1024);
            if($tamanho < 300)
                return true;
            else
                return true;
        }else{
            return false;
        }
    }

    public static function uploadFile($file){
        //pega o arquivo e coloca na pasta correta.
        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$file['name']))
            return $file['name'];
        else
            return false;
        }

    public static function deleteFile($file){
        //deleta o arquivo passado como argumento e não mostra erro se der falha por causa do '@'
        @unlink('uploads/'.$file);
    }

    public static function verificarCampos($user,$senha,$nome,$cargo){
        if($nome == ''){
            Painel::alerta('erro','O Nome está vazio!');
            return false;
        }else if($user == ''){
            Painel::alerta('erro','O Usuário está vazio!');
            return false;
        }else if($senha == ''){
            Painel::alerta('erro','A Senha está vazia!');
            return false;
        }else if($cargo == ''){
            Painel::alerta('erro','O Cargo não foi selecionado!');
            return false;
        }else{
            if($cargo >= $_SESSION['cargo']){
                Painel::alerta('erro','Você precisa selecionar um cargo menor que o seu!');
                return false;
            }else{
                return true;
            }
        }
    }

    public static function userExists($usuario){
        //se o usuario existe
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ?");
        $sql->execute(array($usuario));
        if($sql->rowCount() > 0){
            Painel::alerta('erro','O usuário já existe!');
            return true;
        }else{
            return false;
        }        
    }
}
?>