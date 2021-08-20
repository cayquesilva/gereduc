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
        <fieldset>
            <legend>Dados Gerais</legend>
            <div class="form-group">
                <h3>INEP da Unidade:</h3>
                <input type="text" name="inep">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Nome da Unidade:</h3>
                <input type="text" name="nome_unidade">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Nome do(a) Gestor(a):</h3>
                <input type="text" name="nome_gestor">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Contato do(a) Gestor(a):</h3>
                <input type="text" name="contato_gestor">
            </div><!--form-group-->
            <div class=form-group>
                <h3>Endereço:</h3>
                <input type="text" name="endereco">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Núcleo:</h3>
                <select name="nucleo">
                    <option >-SELECIONE-</option>
                    <?php foreach (Painel::$nucleos as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    };?>
                </select>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Bairro:</h3>
                <select name="bairro">
                    <option >-SELECIONE-</option>
                    <?php foreach (Painel::$bairros as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    };?>
                </select>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Turnos:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$turnos as $key => $value) {
                        echo '<div class="check-item">';
                        echo '<input type="checkbox" name="turnos[]" id="'.$value.'" value="'.$value.'">';
                        echo '<label for="'.$value.'">'.$value.'</label>';
                        echo '</div>';
                    };?>
                </div>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Etapa(s) de Ensino:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$etapas as $key => $value) {
                        echo '<div class="check-item">';
                        echo '<input type="checkbox" name="etapas[]" id="'.$value.'" value="'.$value.'">';
                        echo '<label for="'.$value.'">'.$value.'</label>';
                        echo '</div>';
                    };?>
                </div>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Séries:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$series as $key => $value) {
                        echo '<div class="check-item">';
                        echo '<input type="checkbox" name="series[]" id="'.$value.'" value="'.$value.'">';
                        echo '<label for="'.$value.'">'.$value.'</label>';
                        echo '</div>';
                    };?>
                </div>
            </div><!--form-group-->
        </fieldset>
        <fieldset>
            <legend>Dados Dicentes/Docentes</legend>
            <div class="box-qtd">
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas Regulares:</h3>
                    <input type="number" name="qtdturmas" max="20" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas Adaptadas:</h3>
                    <input type="number" name="qtdturmasadapt" max="20" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas AEE:</h3>
                    <input type="number" name="qtdturmasaee" max="20" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Estudantes (Total):</h3>
                    <input type="number" name="qtdestudantes" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Estudantes (AEE):</h3>
                    <input type="number" name="qtdestudantesaee" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Manhã):</h3>
                    <input type="number" name="qtdprofmanha" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Tarde):</h3>
                    <input type="number" name="qtdproftarde" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Noite):</h3>
                    <input type="number" name="qtdprofnoite" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Integral):</h3>
                    <input type="number" name="qtdprofintegral" min="0">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (AEE):</h3>
                    <input type="number" name="atdprofaee" min="0">
                </div><!--form-group-->
            </div><!--box-qtd-->
        </fieldset>
        <fieldset>
            <legend>Dados de Infraestrutura</legend>
            <div class="rad">
                <div class="form-group flex-rad">
                    <h3>Possui Quadra?</h3>
                    <input type="radio" id="squadra" name="quadra" value="s">
                    <label for="squadra">Sim</label>
                    <input type="radio" id="nquadra" name="quadra" value="n">
                    <label for="nquadra">Não</label>
                </div><!--form-group-->
                <div class="form-group flex-rad">
                    <h3>Possui Biblioteca?</h3>
                    <input type="radio" id="sbibli" name="biblioteca" value="s">
                    <label for="sbibli">Sim</label>
                    <input type="radio" id="nbibli" name="biblioteca" value="n">
                    <label for="nbibli">Não</label>
                </div><!--form-group-->
                <div class="form-group flex-rad">
                    <h3>Possui Laboratório de Infor.?</h3>
                    <input type="radio" id="slab" name="labinfo" value="s">
                    <label for="slab">Sim</label>
                    <input type="radio" id="nlab" name="labinfo" value="n">
                    <label for="nlab">Não</label>
                </div><!--form-group-->
            </div><!--rad-->
        </fieldset>
            <div class=form-group>
                <input type="hidden" name="nome_tabela" value="tb_admin.unidades">
                <input type="submit" name="acao" value="Cadastrar" >
            </div><!--form-group-->
    </form>
</div><!--box-content-->