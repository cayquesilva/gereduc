<?php
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $curso = Painel::selectItem('tb_site.curso',$id);
    }else{
        Painel::alerta('Erro','Você precisa selecionar um curso para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Editar Curso</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::editarItem($_POST)){
                $curso = Painel::selectNoticia('tb_site.curso',$id);
                Painel::alerta('sucesso','O curso foi editada com sucesso!');
            }else{
                Painel::alerta('erro','Campos vazios não são permitidos!');
            }   
        }
    ?>
    <div class=form-group>
        <label>Nome do curso:</label>
        <input type="text" name="nome" value="<?php echo $curso['nome'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Descrição do curso:</label>
        <textarea name="descricao"><?php echo $curso['descricao'];?></textarea>
    </div><!--form-group-->
    <div class=form-group>
        <label>Capacidade de vagas:</label>
        <input type="text" name="vagas" value="<?php echo $curso['vagas'];?>">
    </div><!--form-group-->
    <div class=form-group>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="nome_tabela" value="tb_site.curso">
        <input type="submit" name="acao" value="Atualizar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->