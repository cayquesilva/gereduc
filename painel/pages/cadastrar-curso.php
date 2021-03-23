<div class="box-content">
    <h2><i class="fas fa-plus"></i> Cadastrar Cursos</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alerta('sucesso','O curso foi cadastrada com sucesso!');
            }else{
                Painel::alerta('erro','Ocorreu um erro ao cadastrar!');
            }   
        }
    ?>
    <div class=form-group>
        <label>Nome do curso:</label>
        <input type="text" name="nome">
    </div><!--form-group-->
    <div class=form-group>
        <label>Descrição do curso:</label>
        <textarea name="descricao"></textarea>
    </div><!--form-group-->
    <div class=form-group>
        <label>Capacidade de vagas:</label>
        <input type="text" name="vagas">
    </div><!--form-group-->
    <div class=form-group>
        <input type="hidden" name="id_ordem" value="0">
        <input type="hidden" name="nome_tabela" value="tb_site.curso">
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->