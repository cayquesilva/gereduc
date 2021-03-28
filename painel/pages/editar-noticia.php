<?php
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $noticia = Painel::selectItem('tb_site.noticia',$id);
    }else{
        Painel::alerta('Erro','Você precisa selecionar uma notícia para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Editar Notícia</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::editarItem($_POST)){
                $noticia = Painel::selectNoticia('tb_site.noticia',$id);
                Painel::alerta('sucesso','A notícia foi editada com sucesso!');
            }else{
                Painel::alerta('erro','Campos vazios não são permitidos!');
            }   
        }
    ?>
    <div class=form-group>
        <label>Título da notícia:</label>
        <input type="text" name="titulo" value="<?php echo $noticia['titulo'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Corpo da notícia:</label>
        <textarea name="noticia"><?php echo $noticia['noticia'];?></textarea>
    </div><!--form-group-->
    <div class=form-group>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="nome_tabela" value="tb_site.noticia">
        <input type="submit" name="acao" value="Atualizar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->