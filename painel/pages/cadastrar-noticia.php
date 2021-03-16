<div class="box-content">
    <h2><i class="fas fa-plus"></i> Cadastrar Notícia</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alerta('sucesso','A notícia foi cadastrada com sucesso!');
            }else{
                Painel::alerta('erro','Ocorreu um erro ao cadastrar!');
            }   
        }
    ?>
    <div class=form-group>
        <label>Título da notícia:</label>
        <input type="text" name="titulo">
    </div><!--form-group-->
    <div class=form-group>
        <label>Corpo da notícia:</label>
        <textarea name="noticia"></textarea>
    </div><!--form-group-->
    <div class=form-group>
        <input type="hidden" name="id_ordem" value="0">
        <input type="hidden" name="nome_tabela" value="tb_site.noticia">
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->