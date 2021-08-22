<?php verificaPermissaoPagina(2);?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Importar Unidade(s)</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 

        if(isset($_POST['acao'])){
            if(Painel::importInsert('tb_admin.unidades',$_FILES['arquivo']['tmp_name'])){
                Painel::alerta('sucesso','O arquivo foi importado!');
            }else{
                Painel::alerta('erro','Houve um erro na importação do arquivo!');
            }
        };
    ?>
    <fieldset>
        <legend>importação de Planilha</legend>
        <div class=form-group>
            <h3>Selecione o arquivo:</h3>
            <input type="file" name="arquivo">
        </div><!--form-group-->
        <div class=form-group>
            <input type="submit" name="acao" value="Importar" >
        </div><!--form-group-->
    </fieldset>
    </form>
</div><!--box-content-->