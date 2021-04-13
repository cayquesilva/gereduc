<?php
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $slide = Painel::selectItem('tb_site.slide',$id);
    }else{
        Painel::alerta('Erro','Você precisa selecionar um slide para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-pen"></i> Editar Slide</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">

    <?php 

        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            if($imagem['name'] != ''){
                //imagem foi escolhida
                if(Painel::imagemValida($imagem)){
                    //deleta imagem existente para livrar o bd
                    Painel::deleteFile($imagem_atual);
                    //faz upload de imagem
                    $imagem = Painel::uploadFile($imagem);
                    $arr = ['id'=>$id,'nome'=>$nome,'slide'=>$imagem,'nome_tabela'=>'tb_site.slide'];
                    Painel::editarItem($arr);
                    $slide = Painel::selectItem('tb_site.slide',$id);
                    Painel::alerta('sucesso','O slide foi editado com sucesso!');
                }else{
                    Painel::alerta('erro','O formato da imagem não é válido');
                }
            }else{
                //imagem não selecionada
                $imagem = $imagem_atual;
                $arr = ['id'=>$id,'nome'=>$nome,'slide'=>$imagem,'nome_tabela'=>'tb_site.slide'];
                Painel::editarItem($arr);
                $slide = Painel::selectItem('tb_site.slide',$id);
                Painel::alerta('sucesso','O nome do slide foi alterado com sucesso!');
            }
        }

    ?>


    <div class=form-group>
        <label>Nome:</label>
        <input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Imagem:</label>
        <input type="file" name="imagem">
        <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">
    </div><!--form-group-->
    <div class=form-group>
        <input type="submit" name="acao" value="Atualizar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->