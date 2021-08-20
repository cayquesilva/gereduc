<?php verificaPermissaoPagina(1);?>
<div class="box-content">
    <h2><i class="fas fa-pen"></i> Editar Usuário</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">

    <?php 

        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            $usuario = new Usuario();

            if($imagem['name'] != ''){
                //imagem foi escolhida
                if(Painel::imagemValida($imagem)){
                    //deleta imagem existente para livrar o bd
                    Painel::deleteFile($imagem_atual);
                    //faz upload de imagem
                    $imagem = Painel::uploadFile($imagem);
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                        $_SESSION['img'] = $imagem;
                        Painel::alerta('sucesso','Cadastro atualizado com Sucesso!');
                    }else{
                        Painel::alerta('erro','Ocorreu um erro ao atualizar!');
                    }
                }else{
                    Painel::alerta('erro','O formato da imagem não é válido');
                }
            }else{
                //imagem não selecionada
                $imagem = $imagem_atual;
                if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                    Painel::alerta('sucesso','Cadastro atualizado com Sucesso!');
                }else{
                    Painel::alerta('erro','Ocorreu um erro ao atualizar!');
                }
            }
        }

    ?>


    <div class=form-group>
        <label>Nome:</label>
        <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Senha:</label>
        <input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Imagem:</label>
        <input type="file" name="imagem">
        <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
    </div><!--form-group-->
    <div class=form-group>
        <input type="submit" name="acao" value="Atualizar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->