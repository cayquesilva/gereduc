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
        //setcookie negativo deleta o cookie
        setcookie('lembrar',true,time()-1,'/');
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

    public static function listarUsuariosPainel(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
        $sql->execute();
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
        //usa explode pra dividir o nome do arquivo em partes divididas pelo '.'
        $formatoArquivo = explode('.',$file['name']);
        //PEga a idunica e adiciona o formato do arquivo $formatoArquivo[ultima parte].
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo)-1];
        //pega o arquivo e coloca na pasta correta.
        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
            return $imagemNome;
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
        $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user = ?");
        $sql->execute(array($usuario));
        if($sql->rowCount() == 1){
            Painel::alerta('erro','O usuário já existe!');
            return true;
        }else{
            return false;
        }        
    }

    public static function insert($arr){
        //$arr pega o post como um todo (todos os valores do form)
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";
        foreach ($arr as $key => $value) {
            $nome = $key;
            $valor = $value;
            if($nome == 'acao' || $nome == 'nome_tabela')
                //se for o post acao ou post nome_tabela ignora e volta o foreach
                continue;
            if($value == ''){
                //se tiver algo em branco, quebra e da erro
                $certo = false;
                break;
            }
            //concatena a cada interação pra adicioar dinamicamente os campos do db
            $query.=",?";
            //adiciona cada iteração do $value no array criado
            $parametros[] = $value;
        }
        //concatenando
        $query.=")";
        if($certo){
            $sql = MySql::conectar()->prepare($query);
            //usa o array criado para substituir as "?"
            $sql->execute($parametros);
        }
        return $certo;
    }

    public static function selectAll($tabela,$start=null,$end=null){
        //se não for passado o start e o end, pega tudo
        if($start == null && $end == null){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY id DESC");
        }else{
            //se tiver start e end pega limitado ao start e ao end
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY id DESC LIMIT $start , $end");
        }
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function excluirNoticia($tabela,$id=false){
        if($id == false){
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
        }
        $sql->execute();
    }

    public static function redirecionar($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }

}
?>