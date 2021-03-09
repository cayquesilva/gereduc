<?php verificaPermissaoPagina(2);?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Criar Usuário</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 

        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $user = $_POST['user'];
            $senha = $_POST['password'];
            $cargo = $_POST['cargo'];
            $imagem = '';
            if(Painel::verificarCampos($user,$senha,$nome,$cargo)){
                if(!Painel::userExists($user)){
                    $usuario = new Usuario();
                    if($usuario->criarUsuario($user,$senha,$imagem,$nome,$cargo)){
                        Painel::alerta('sucesso','O cadastro do usuário: '.$user.' foi feito com sucesso!');
                    }else{
                        Painel::alerta('erro','Houve um problema no cadastro do usuário, tente novamente!');
                    }
                }
            }
        };
    ?>
    <div class=form-group>
        <label>Nome:</label>
        <input type="text" name="nome">
    </div><!--form-group-->
    <div class=form-group>
        <label>Usuário:</label>
        <input type="text" name="user">
    </div><!--form-group-->
    <div class=form-group>
        <label>Senha:</label>
        <input type="password" name="password">
    </div><!--form-group-->
    <div class=form-group>
        <label>Cargo:</label>
        <select name="cargo">
            <?php foreach (Painel::$cargos as $key => $value) {
                //só libera criação de usuários de cargo abaixo 
                //de quem está solicitando a criação
               if($key < $_SESSION['cargo'])
                echo '<option value="'.$key.'">'.$value.'</option>';
            };?>
        </select>
    </div><!--form-group-->
    <div class=form-group>
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->