<div class="box-content">
    <h2><i class="fas fa-plus"></i> Cadastrar Unidade</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alerta('sucesso','O evento foi cadastrada com sucesso!');
            }else{
                Painel::alerta('erro','Ocorreu um erro ao cadastrar!');
            }   
        }
    ?>
    <input type="hidden" name="id" value="0">
    <div class=form-group>
        <label>Nome da Unidade:</label>
        <input type="text" name="evento">
    </div><!--form-group-->
    <div class=form-group>
        <label>Nome do(a) Gestor(a):</label>
        <input type="text" name="evento">
    </div><!--form-group-->
    <div class=form-group>
        <label>Endereço:</label>
        <input type="text" name="evento">
    </div><!--form-group-->
    <div class=form-group>
        <label>Núcleo:</label>
        <select name="serie">
            <?php foreach (Painel::$nucleos as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            };?>
        </select>
    </div><!--form-group-->
    <div class=form-group>
        <label>Bairro:</label>
        <select name="serie">
            <?php foreach (Painel::$bairros as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            };?>
        </select>
    </div><!--form-group-->
    <div class=form-group>
        <label>Bairro:</label>
        <select name="serie">
            <?php foreach (Painel::$series as $key => $value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            };?>
        </select>
    </div><!--form-group-->

    <div class=form-group>
        <input type="hidden" name="nome_tabela" value="tb_eventos">
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->