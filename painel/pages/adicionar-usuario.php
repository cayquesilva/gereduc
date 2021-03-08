<?php verificaPermissaoPagina(2);?>
<div class="box-content">
    <h2><i class="fas fa-pen"></i> Editar Usuário</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">

    <?php 

        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $usuario = $_POST['user'];
            $senha = $_POST['password'];
            $cargo = $_POST['cargo'];
        }

    ?>


    <div class=form-group>
        <label>Nome:</label>
        <input type="text" name="nome" required>
    </div><!--form-group-->
    <div class=form-group>
        <label>Usuário:</label>
        <input type="text" name="user" required>
    </div><!--form-group-->
    <div class=form-group>
        <label>Senha:</label>
        <input type="password" name="password" required>
    </div><!--form-group-->
    <div class=form-group>
        <label>Cargo:</label>
        <input type="text" name="cargo" required>
    </div><!--form-group-->
    <div class=form-group>
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->