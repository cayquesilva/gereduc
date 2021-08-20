<?php
    verificaPermissaoPagina(1);
    if(isset($_GET['inep'])){
        $inep= (int)$_GET['inep'];
        $unidade = Painel::selectLocal('tb_admin.unidades',$inep);
    }else{
        Painel::alerta('Erro','Você precisa selecionar um local para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Registrar Programas - <?php echo $unidade['nome_unidade']?></h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                if(Painel::insert($_POST)){
                    $unidade = Painel::selectLocal('tb_admin.unidades',$inep);
                    Painel::alerta('sucesso','A unidade foi editada com sucesso!');
                    Painel::redirecionar('listar-unidades');
                }else{
                    Painel::alerta('erro','Campos vazios não são permitidos!');
                }   
            }
        ?>
        <input type="hidden" name="inep" value="<?php echo $inep;?>">

        <fieldset>
            <legend>Dados do programa</legend>
            <div class="form-group">
                <h3>Nome do Programa:</h3>
                <input type="text" name="nomeprograma">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Data de Início:</h3>
                <input type="date" name="datainicio">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Data de Conclusão:</h3>
                <input type="date" name="datafim">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Programa MEC:</h3>
                <input type="radio" id="smec" name="convmec" value="s">
                <label for="smec">Sim</label>
                <input type="radio" id="nmec" name="convmec" value="n">
                <label for="nmec">Não</label>
            </div><!--form-group-->
        </fieldset>
        <fieldset>
            <legend>Distribuição de Vagas</legend>
            <div class="form-group">
                <h3>Quantidade de formadores</h3>
                <input type="number" name="qtdformadores" min="0">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Quantidade de cursistas</h3>
                <input type="number" name="qtdcursistas" min="0">
            </div><!--form-group-->
        </fieldset>
        <fieldset>
            <legend>Publico Alvo</legend>
            <div class="form-group">
                <h3>Sede - SEDUC:</h3>
                <input type="radio" id="sseduc" name="pubsecretaria" value="s">
                <label for="sseduc">Sim</label>
                <input type="radio" id="nseduc" name="pubsecretaria" value="n">
                <label for="nseduc">Não</label>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Corpo Gestor:</h3>
                <input type="radio" id="sgestao" name="pubgestao" value="s">
                <label for="sgestao">Sim</label>
                <input type="radio" id="ngestao" name="pubgestao" value="n">
                <label for="ngestao">Não</label>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Técnicos:</h3>
                <input type="radio" id="stecnico" name="pubtecnicos" value="s">
                <label for="stecnico">Sim</label>
                <input type="radio" id="ntecnico" name="pubtecnicos" value="n">
                <label for="ntecnico">Não</label>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Professores:</h3>
                <input type="radio" id="sprof" name="pubprof" value="s">
                <label for="sprof">Sim</label>
                <input type="radio" id="nprof" name="pubprof" value="n">
                <label for="nprof">Não</label>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Apoio Escolar:</h3>
                <input type="radio" id="sapoio" name="pubapoio" value="s">
                <label for="sapoio">Sim</label>
                <input type="radio" id="napoio" name="pubapoio" value="n">
                <label for="napoio">Não</label>
            </div><!--form-group-->
        </fieldset>
            <div class=form-group>
                <input type="hidden" name="nome_tabela" value="tb_unidades.programas">
                <input type="submit" name="acao" value="Cadastrar" >
            </div><!--form-group-->
    </form>
</div><!--box-content-->