<div class="box-content">
    <h2><i class="fas fa-plus"></i> Cadastrar Turma</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alerta('sucesso','A turma foi cadastrada com sucesso!');
            }else{
                Painel::alerta('erro','Ocorreu um erro ao cadastrar!');
            }   
        }
    ?>
    <div class=form-group>
        <input type="hidden" name="resp" value="<?php echo $_SESSION['user']?>">
    </div><!--form-group-->
    <div class=form-group>
        <label>Capacidade da turma:</label>
        <input type="text" name="capacidade">
    </div><!--form-group-->
    <div class=form-group>
        <label>Unidade de Ensino:</label>
        <input type="text" name="unidade">
    </div><!--form-group-->
    <div class=form-group>
        <label>Série/Ano:</label>
        <select name="serie">
            <?php foreach (Painel::$series as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            };?>
        </select>
    </div><!--form-group-->
    <div class=form-group>
        <input type="hidden" name="id_ordem" value="0">
        <input type="hidden" name="nome_tabela" value="tb_site.turma">
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->