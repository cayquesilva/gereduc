<?php 
    verificaPermissaoPagina(1);
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 30;
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $servidoresCadastrados = Painel::selectAll('tb_funcionario.dadospessoais',($paginaAtual-1) * $porPagina,$porPagina);
    $locaisDeTrabalho = Painel::selectAll('tb_localtrabalho');
    $servidorVigia = Painel::pegaCargos('tb_funcionario.dadospessoais',"vigia");
    //se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirServidor('tb_funcionario.dadospessoais',$idExcluir);
        Painel::redirecionar('home');
    }
?>
<div class="box-content w100">
    <h2><i class="fa fa-home"></i> Ferramentas do sistema - <?php echo NOME_EMPRESA;?></h2>
</div><!--box=content-->
    
<div class="box-content w100">
    <h2><i class="fas fa-user-friends" aria-hidden="true"></i> Estatísticas Gerais</h2>
    <div class="box-metricas">
        <div class="box-metrica-single green">
            <div class="box-metrica-wraper">
                <h2>Total de Servidores Cadastrados</h2>
                <p><?php echo count(Painel::selectAll('tb_funcionario.dadospessoais')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Locais Cadastrados</h2>
                <p><?php echo count($locaisDeTrabalho); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
    
        <div class="clear"></div>
    </div><!--box-metricas-->
</div><!--box=content-->

<div class="box-content w100">
    <h2><i class="fas fa-user-friends" aria-hidden="true"></i> Estatísticas de Servidores</h2>
    <div class="box-metricas">
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Vigias</h2>
                <p><?php echo count($servidorVigia); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Professores da Ed. Básica 1</h2>
                <p><?php echo count(Painel::pegaCargos('tb_funcionario.dadospessoais',"professor educacao basica 1")); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Agentes Administrativos</h2>
                <p><?php echo count(Painel::pegaCargos('tb_funcionario.dadospessoais',"agente administrativo")); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
    </div><!--box-metricas-->
    <div class="box-metricas">
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Agentes Administrativos</h2>
                <p><?php echo count(Painel::pegaCargos('tb_funcionario.dadospessoais',"agente administrativo")); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Supervisores Educacionais</h2>
                <p><?php echo count(Painel::pegaCargos('tb_funcionario.dadospessoais',"orientador educacional")); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Total de Assistentes Sociais</h2>
                <p><?php echo count(Painel::pegaCargos('tb_funcionario.dadospessoais',"assistente social educacional")); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="clear"></div>
    </div><!--box-metricas-->
</div><!--box=content-->

<div class="box-content w100">
    <h2><i class="fas fa-book" aria-hidden="true"></i> Servidores Cadastrados</h2>
    <div class="tabela-resp">
        <div class="row">
            <div class="col">
                <span>Matrícula</span>
            </div><!--col-->
            <div class="col">
                <span>Nome</span>
            </div><!--col-->
            <div class="col">
                <span>Alocação</span>
            </div><!--col-->
            <div class="col">
                <span>Editar</span>
            </div><!--col-->
            <div class="col">
                <span>Excluir</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php 
            //laço para preencher tabela de acordo com o bd
            foreach($servidoresCadastrados as $key => $value){
        ?>
        <div class="row">
            <div class="col">
                <span><?php echo $value['matricula']?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo $value['nome']?></span>
            </div><!--col-->
            <div class="col">
                <span>Implementar Select do banco Eventos</span>
            </div><!--col-->
            <div class="col">
                <a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>alterar-servidor?matricula=<?php echo $value['matricula'];?>"><i class=" fa fa-pen"></i></a>
            </div><!--col-->
            <div class="col">
                <a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>home?excluir=<?php echo $value['matricula'];?>"><i class=" fa fa-times"></i></a>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php  }?>
    </div><!--tabela-resp-->
    <div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_funcionario.dadospessoais')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'home?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'home?pagina='.$i.'">'.$i.'</a>';
        }            
    ?>
    </div><!--paginacao-->
</div><!--box=content-->