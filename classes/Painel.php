<?php

class Painel{

    public static $turnos= [
        '0'=>'Manhã',
        '1'=>'Tarde',
        '2'=>'Noite',
        '3'=>'Integral'
    ];

    public static $etapas = [
        '0'=>'Educação Infantil',
        '1'=>'Ensino Fundamental - Anos Iniciais',
        '2'=>'Ensino Fundamental - Anos Finais',
        '3'=>'Ensino de Jovens e Adultos - EJA',
        '4'=>'Atendimento Educacional Especializado - AEE'];

    public static $series = [
        '0'=>'Berçário 1',
        '1'=>'Berçário 2',
        '2'=>'Maternal 1',
        '3'=>'Maternal 2',
        '4'=>'Pré Escolar 1',
        '5'=>'Pré Escolar 2',
        '6'=>'1º Ano',
        '7'=>'2º Ano',
        '8'=>'3º Ano',
        '9'=>'4º Ano',
        '10'=>'5º Ano',
        '11'=>'6º Ano',
        '12'=>'7º Ano',
        '13'=>'8º Ano',
        '14'=>'9º Ano'];

    public static $nucleos = [
        '0'=>'Núcleo 1',
        '1'=>'Núcleo 2',
        '2'=>'Núcleo 3',
        '3'=>'Núcleo 4',
        '4'=>'Núcleo 5',
        '5'=>'Núcleo 6',
        '6'=>'Núcleo 7',
        '7'=>'Núcleo 8',
        '8'=>'Núcleo 9',
        '9'=>'Núcleo 10',
        '10'=>'Núcleo 11',
        '11'=>'Núcleo 12'];

    public static $bairros = [
        '0'=>'Acácio Figueiredo',
        '1'=>'Alto Branco',
        '2'=>'Araxá',
        '3'=>'Bairro das Cidades',
        '4'=>'Bairro das Nações',
        '5'=>'Bela Vista',
        '6'=>'Bodocongó',
        '7'=>'Castelo Branco',
        '8'=>'Catingueira',
        '9'=>'Catolé',
        '10'=>'Catolé de Zé Ferreira',
        '11'=>'Centenário',
        '12'=>'Conceição',
        '13'=>'Cruzeiro',
        '14'=>'Cuités',
        '15'=>'Dinamérica',
        '16'=>'Distrito dos Mecânicos',
        '17'=>'Distrito Industrial',
        '18'=>'Estação Velha',
        '19'=>'Itararé',
        '20'=>'Jardim Borborema',
        '21'=>'Jardim Continental',
        '22'=>'Jardim Menezes',
        '23'=>'Jardim Paulistano',
        '24'=>'Jardim Paulistano',
        '25'=>'Jardim Quarenta',
        '26'=>'Jardim Tavares',
        '27'=>'Jardim Verdejante',
        '28'=>'Jeremias',
        '29'=>'José Pinheiro',
        '30'=>'Lauritzen',
        '31'=>'Liberdade',
        '32'=>'Ligeiro',
        '33'=>'Louzeiro',
        '34'=>'Malvinas',
        '35'=>'Mirante',
        '36'=>'Monte Castelo',
        '37'=>'Monte Santo',
        '38'=>'Mutirão do Serrotão',
        '39'=>'Nova Brasília',
        '40'=>'Novo Araxá',
        '41'=>'Novo Bodocongó',
        '42'=>'Novo Cruzeiro',
        '43'=>'Novo Horizonte',
        '44'=>'Palmeira',
        '45'=>'Palmeira Imperial',
        '46'=>'Pedregal',
        '47'=>'Prata',
        '48'=>'Quarenta',
        '49'=>'Ramadinha 1',
        '50'=>'Ramadinha 2',
        '51'=>'Ressurreição 1',
        '52'=>'Ressurreição 2',
        '53'=>'Rosa Cruz',
        '54'=>'Sandra Cavalcante',
        '55'=>'Santa Cruz',
        '56'=>'Santa Rosa',
        '57'=>'Santo Antônio',
        '58'=>'São José',
        '59'=>'Serra da Borborema',
        '60'=>'Serrotão',
        '61'=>'Sítio Estreito 1',
        '62'=>'Sítio Estreito 2',
        '63'=>'Sítio Estreito 3',
        '64'=>'Sítio Lucas 1',
        '65'=>'Sítio Lucas 2',
        '66'=>'Tambor',
        '67'=>'Três Irmãs',
        '68'=>'Universitário',
        '69'=>'Velame'];

    public static $tipos_avaliacao = [
        '0'=>'Simulado',
        '1'=>'Parcial',
        '2'=>'Bimestral',
        '3'=>'Final'];

    public static  $cargos = [
        '0'=> 'Normal',
        '1'=> 'Sub Administrador',
        '2'=> 'Administrador'];

    public static function gerarSlug($str){
        $str = mb_strtolower($str);
        $str = preg_replace('/(â|á|ã|à)/', 'a', $str);
        $str = preg_replace('/(ê|é|è)/', 'e', $str);
        $str = preg_replace('/(í|Í)/', 'i', $str);
        $str = preg_replace('/(ú)/', 'u', $str);
        $str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
        $str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
        $str = preg_replace('/( )/', '-',$str);
        $str = preg_replace('/ç/','c',$str);
        $str = preg_replace('/(-[-]{1,})/','-',$str);
        $str = preg_replace('/(,)/','-',$str);
        $str=strtolower($str);
        return $str;
    }


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

    public static function carregarPagina($permissao){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                //Página não existe!
                header('Location: '.INCLUDE_PATH_PAINEL);
            }
        }else{
            if($permissao >= 2){
                include('pages/dashboard.php');
            }else{
                include('pages/home.php');
            }
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

    public static function avaliacoesCadastradas(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.avaliacao`");
        $sql->execute();
        return $sql->fetchAll();
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

    public static function validaRepetido($str,$id,$nome_tabela){
        $conn  = MySql::conectar()->prepare("SELECT * FROM `$nome_tabela` WHERE nome = ? AND id != ?");
        $conn->execute(array($str,$id));
        if($conn->rowCount() == 1){
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
        $inep = $arr['inep'];
        $tabturnos = "tb_unidades.turno";
        $tabseries = "tb_unidades.serie";
        $tabetapas = "tb_unidades.etapa";
        $query = "INSERT INTO `$nome_tabela` VALUES (?";
        $query2 = "INSERT INTO `$tabturnos` VALUES (?";
        $query3 = "INSERT INTO `$tabetapas` VALUES (?";
        $query4 = "INSERT INTO `$tabseries` VALUES (?";
        foreach ($arr as $key => $value) {
            $nome = $key;
            if($nome == 'acao' || $nome == 'nome_tabela')
                //se for o post acao ou post nome_tabela ignora e volta o foreach
                continue;
            if($nome == 'id'){
                $parametros[] = null;
                continue;
            }
            if($nome == 'matricula'){
                $parametros[] = $value;
                continue;
            }
            if($nome == 'inep'){
                $parametros[] = $value;
                continue;
            }
            if($nome == 'turnos'){
                $turnos = $arr['turnos'];
                foreach ($turnos as $t_value){
                    $query2.=",?";
                    $query2.=")";
                    $sql2 = MySql::conectar()->prepare($query2);
                    $sql2->execute(array($inep,$t_value));
                    $query2 = "INSERT INTO `$tabturnos` VALUES (?";
                }
                continue;
            }
            if($nome == 'etapas'){
                $etapas = $arr['etapas'];
                foreach($etapas as $e_value){
                    $query3.=",?";
                    $query3.=")";
                    $sql3 = MySql::conectar()->prepare($query3);
                    $sql3->execute(array($inep,$e_value));
                    $query3 = "INSERT INTO `$tabetapas` VALUES (?";
                }  
                continue;
            }
            if($nome == 'series'){
                $series = $arr['series'];
                foreach ($series as $s_value){
                    $query4.=",?";
                    $query4.=")";
                    $sql4 = MySql::conectar()->prepare($query4);
                    $sql4->execute(array($inep,$s_value));
                    $query4 = "INSERT INTO `$tabseries` VALUES (?";
                }  
                continue;
            }
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

    public static function contaPrograma($tabela,$inep=null){
        if($inep === null){
            $sql = MySql::conectar()->prepare("SELECT * FROM  `$tabela` ");
            $sql->execute();
        }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM  `$tabela` WHERE inep = ?");
            $sql->execute(array($inep));
        }  
        return $sql->rowcount();
    }

    public static function contaAgentes($tabela,$agente){
        if($agente == 'quadra' || $agente == 'biblioteca' || $agente == 'labinfo'){
            $sql = MySql::conectar()->prepare("SELECT * FROM  `$tabela` WHERE `$agente` = 's'");
            $sql->execute();
            $result = $sql->rowcount();
        }else if($agente == 'Educação Infantil' || 
        $agente == 'Ensino Fundamental - Anos Iniciais' || 
        $agente == 'Ensino Fundamental - Anos Finais' || 
        $agente == 'Ensino de Jovens e Adultos - EJA' || 
        $agente == 'Atendimento Educacional Especializado - AEE'){
            $sql = MySql::conectar()->prepare("SELECT * FROM  `$tabela` WHERE `etapas`  = '$agente'");
            $sql->execute();
            $result = $sql->rowcount();
        }else{
            $sql = MySql::conectar()->prepare("SELECT sum($agente) FROM  `$tabela`");
            $sql->execute();
            $total = $sql->fetch();
            foreach($total as $soma){
                $result = $soma;
            }
        }
        return $result;
    }

    public static function selectAllByUser($tabela,$user,$start=null,$end=null,$iniciais=null){
        if($start === null && $end === null){
            if($iniciais === null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE autor = ? ORDER BY serie ASC");
            if($iniciais === true)
                    $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE (serie < 5) AND autor = ? ORDER BY serie ASC");
            if($iniciais === false)      
                    $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE (serie > 4) AND autor = ? ORDER BY serie ASC");  
        }else{   
            if($iniciais === null)
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE autor = ? ORDER BY serie ASC LIMIT $start , $end");
            if($iniciais === true)
                    $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE (serie < 5) AND autor = ? ORDER BY serie ASC LIMIT $start , $end");
            if($iniciais === false)      
                    $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE (serie > 4) AND autor = ? ORDER BY serie ASC LIMIT $start , $end");
        }
        $sql->execute(array($user));
        return $sql->fetchAll();
    }

    public static function pegaTurmasByUser($tabela,$user){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE resp = ? ORDER BY id_ordem ASC");
            $sql->execute(array($user));
        return $sql->fetchAll();
    }

    public static function pegaSeriesByUser($tabela,$user){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE resp = ? GROUP BY serie ORDER BY id_ordem ASC");
            $sql->execute(array($user));
        return $sql->fetchAll();
    }


    public static function selectAll($tabela,$start=null,$end=null){
        //se não for passado o start e o end, pega tudo
        if($start == null && $end == null){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
        }else{
            //se tiver start e end pega limitado ao start e ao end
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start , $end");
        }
        $sql->execute();
        return $sql->fetchAll();
    }

    public static function selectAllInep($tabela,$inep,$item){
        if( $item == null ){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE inep = ?");
            $sql->execute(array($inep));
        }else{
            $sql = MySql::conectar()->prepare("SELECT $item FROM `$tabela` WHERE inep = ?");
            $sql->execute(array($inep));
        }
        return $sql->fetchAll();
    }

    public static function pegaCargos($tabela,$cargo){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE cargo = ?");
        $sql->execute(array($cargo));
        return $sql->fetchAll();
    }

    public static function contaItem($tabela,$inep,$col,$item){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE inep = ? AND `$col` = ?");
        $sql->execute(array($inep,$item));
        return $sql->rowCount();
    }

    public static function excluirItem($tabela,$id=false){
        if($id == false){
            Painel::alerta('erro','É preciso selecionar um item para deletar!');
        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = ?");
        }
        $sql->execute(array($id));
    }

    public static function excluirServidor($tabela,$matricula=false){
        if($matricula == false){
            Painel::alerta('erro','É preciso selecionar um Servidor para deletar!');
        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE matricula = ?");
        }
        $sql->execute(array($matricula));
    }

    public static function excluirImagem($tabela,$id=false){
        if($id == false){
            Painel::alerta('erro','É preciso selecionar um slide para deletar!');
        }else{
            $sql = MySql::conectar()->prepare("SELECT slide FROM `$tabela` WHERE id = ?");
            $sql->execute(array($id));
            $imagem = $sql->fetch()['slide'];
            Painel::deleteFile($imagem);
        }       
    }

    public static function selectItem($tabela,$id){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE id = ?");
        $sql->execute(array($id));
        return $sql->fetch();
    }

    public static function selectLocal($tabela,$inep){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE inep = ?");
        $sql->execute(array($inep));
        return $sql->fetch();
    }

    public static function selectServidor($tabela,$matricula){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE matricula = ?");
        $sql->execute(array($matricula));
        return $sql->fetch();
    }

    public static function editarItem($arr){
            //$arr pega o post como um todo (todos os valores do form)
            $certo = true;
            $primeiraInt = true;
            $existeid = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach ($arr as $key => $value) {
                $nome = $key;
                $valor = $value;
                if($nome == 'id'){
                    $existeid = true;
                }
                if($nome == 'acao' || $nome == 'nome_tabela' || $nome =='id')
                    //se for o post acao ou post nome_tabela ignora e volta o foreach
                    continue;
                if($value == ''){
                    //se tiver algo em branco, quebra e da erro
                    $certo = false;
                    break;
                }
                if($primeiraInt){
                //concatena a cada interação pra adicioar dinamicamente os campos do db
                    $query.="$nome=?";
                    $primeiraInt=false;
                }else{
                //concatena a cada interação pra adicioar dinamicamente os campos do db
                    $query.=", $nome=?";
                }
                //adiciona cada iteração do $value no array criado
                $parametros[] = $value;
            }
            //concatenando
            if($certo){
                if(!$existeid){
                    $sql = MySql::conectar()->prepare($query." WHERE matricula = ?");
                //usa o array criado para substituir as "?"
                $parametros[] = $arr['matricula'];
                }else{
                    $sql = MySql::conectar()->prepare($query." WHERE id = ?");
                    //usa o array criado para substituir as "?"
                    $parametros[] = $arr['id'];
                }                
                $sql->execute($parametros);
            }
            return $certo;
    }
    

    public static function orderItem($tabela,$orderType,$idItem){
        if($orderType == 'up'){
            $infoItemAtual = Painel::selectItem($tabela,$idItem);
            $order_id = $infoItemAtual['id_ordem'];  
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE id_ordem < $order_id ORDER BY id_ordem DESC LIMIT 1");
            $itemBefore->execute();
            if($itemBefore->rowCount() == 0)
                return;
            $itemBefore = $itemBefore->fetch();
            Painel::editarItem(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'id_ordem'=>$infoItemAtual['id_ordem']));
            Painel::editarItem(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'id_ordem'=>$itemBefore['id_ordem']));
        }else if($orderType == 'down'){
            $infoItemAtual = Painel::selectItem($tabela,$idItem);
            $order_id = $infoItemAtual['id_ordem'];  
            $itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE id_ordem > $order_id ORDER BY id_ordem ASC LIMIT 1");
            $itemBefore->execute();
            if($itemBefore->rowCount() == 0)
                return;
            $itemBefore = $itemBefore->fetch();
            Painel::editarItem(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'id_ordem'=>$infoItemAtual['id_ordem']));
            Painel::editarItem(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'id_ordem'=>$itemBefore['id_ordem']));
        }
    }

    public static function redirecionar($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }

}
?>