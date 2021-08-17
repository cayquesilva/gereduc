<?php
    if(isset($_GET['inep'])){
        $inep= (int)$_GET['inep'];
        $local = Painel::selectLocal('tb_localtrabalho',$inep);
    }else{
        Painel::alerta('Erro','Você precisa selecionar um local para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Editar Local de Trabalho</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::editarItem($arr)){
                $local = Painel::selectLocal('tb_localtrabalho',$inep);
                Painel::alerta('sucesso','O local de trabalho foi editado com sucesso!');
            }else{
                Painel::alerta('erro','Campos vazios não são permitidos!');
            }   
        }
    ?>
    <div class=form-group>
        <label>Inep:</label>
        <input type="text" name="inep" value="<?php echo $local['inep'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Local de Trabalho:</label>
        <input type="text" name="local" value="<?php echo $local['local'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Endereço:</label>
        <input type="text" name="endereço" value="<?php echo $local['endereço'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $local['bairro'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $local['cidade'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $local['estado'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Telefone fixo:</label>
        <input type="text" name="telefone" value="<?php echo $local['telefone'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Nome do(a) Gestor(a):</label>
        <input type="text" name="gestor" value="<?php echo $local['gestor'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Telefone do(a) Gestor(a):</label>
        <input type="text" name="telefonegestor" value="<?php echo $local['telefonegestor'];?>">
    </div><!--form-group-->

    <div class=form-group>
        <input type="hidden" name="nome_tabela" value="tb_localtrabalho">
        <input type="submit" name="acao" value="Atualizar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->