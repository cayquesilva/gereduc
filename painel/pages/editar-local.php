<?php
    verificaPermissaoPagina(1);
    if(isset($_GET['inep'])){
        $inep= (int)$_GET['inep'];
        $unidade = Painel::selectLocal('tb_admin.unidades',$inep);
        $turnosbd = Painel::selectAllInep('tb_unidades.turno',$inep,'turnos');
        $etapasbd = Painel::selectAllInep('tb_unidades.etapa',$inep,'etapas');
        $seriesbd = Painel::selectAllInep('tb_unidades.serie',$inep,'series');
    }else{
        Painel::alerta('Erro','Você precisa selecionar um local para editar!');
        die();
    }
?>
<div class="box-content">
    <h2><i class="fas fa-plus"></i> Editar Unidade</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
        <?php 
            if(isset($_POST['acao'])){
                if(Painel::editarItemUni($_POST)){
                    $unidade = Painel::selectLocal('tb_admin.unidades',$inep);
                    Painel::alerta('sucesso','A unidade foi editada com sucesso!');
                }else{
                    Painel::alerta('erro','Campos vazios não são permitidos!');
                }   
            }
        ?>
        <fieldset>
            <legend>Dados Gerais</legend>
            <div class="form-group">
                <h3>INEP da Unidade:</h3>
                <input type="text" name="inep" value="<?php echo $unidade['inep'];?>">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Nome da Unidade:</h3>
                <input type="text" name="nome_unidade" value="<?php echo $unidade['nome_unidade'];?>">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Nome do(a) Gestor(a):</h3>
                <input type="text" name="nome_gestor" value="<?php echo $unidade['nome_gestor'];?>">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Contato do(a) Gestor(a):</h3>
                <input type="text" name="contato_gestor" value="<?php echo $unidade['contato_gestor'];?>">
            </div><!--form-group-->
            <div class=form-group>
                <h3>Endereço:</h3>
                <input type="text" name="endereco" value="<?php echo $unidade['endereco'];?>">
            </div><!--form-group-->
            <div class="form-group">
                <h3>Núcleo:</h3>
                <select name="nucleo">
                    <option >-SELECIONE-</option>
                    <?php foreach (Painel::$nucleos as $key => $value) {
                        if($key == $unidade['nucleo']){
                            echo '<option selected value="'.$key.'">'.$value.'</option>';
                            continue;
                        }
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    };?>
                </select>
            </div><!--form-group-->
            <div class="form-group">
                <h3>Bairro:</h3>
                <select name="bairro">
                    <option >-SELECIONE-</option>
                    <?php foreach (Painel::$bairros as $key => $value) {
                         if($key == $unidade['bairro']){
                            echo '<option selected value="'.$key.'">'.$value.'</option>';
                            continue;
                        }
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    };?>
                </select>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Turnos:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$turnos as $key => $value) {  
                        if(Painel::contaItem('tb_unidades.turno',$inep,'turnos',$value) == 0){
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" name="turnos[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>';
                        }else{
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" checked name="turnos[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>'; 
                        }                         
                    }?>
                    
                </div>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Etapa(s) de Ensino:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$etapas as $key => $value) {
                            if(Painel::contaItem('tb_unidades.etapa',$inep,'etapas',$value) == 0){ 
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" name="etapas[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>';
                        }else{
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" checked name="etapas[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>';
                        }
                    };?>
                </div>
            </div><!--form-group-->
            <div class="form-group check">
                <h3>Séries:</h3>
                <div class="box-check-inner">
                    <?php foreach (Painel::$series as $key => $value) {
                        if(Painel::contaItem('tb_unidades.serie',$inep,'series',$value) == 0){
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" name="series[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>';
                        }else{
                            echo '<div class="check-item">';
                            echo '<input type="checkbox" checked name="series[]" id="'.$value.'" value="'.$value.'">';
                            echo '<label for="'.$value.'">'.$value.'</label>';
                            echo '</div>';
                        }
                    };?>
                </div>
            </div><!--form-group-->
        </fieldset>
        <fieldset>
            <legend>Dados Dicentes/Docentes</legend>
            <div class="box-qtd">
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas Regulares:</h3>
                    <input type="number" name="qtdturmas" min="0" value="<?php echo $unidade['qtdturmas'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas Adaptadas:</h3>
                    <input type="number" name="qtdturmasadapt" min="0" value="<?php echo $unidade['qtdturmasadapt'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Turmas AEE:</h3>
                    <input type="number" name="qtdturmasaee" min="0" value="<?php echo $unidade['qtdturmasaee'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Estudantes (Total):</h3>
                    <input type="number" name="qtdestudantes" min="0" value="<?php echo $unidade['qtdestudantes'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Estudantes (AEE):</h3>
                    <input type="number" name="qtdestudantesaee" min="0" value="<?php echo $unidade['qtdestudantesaee'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Manhã):</h3>
                    <input type="number" name="qtdprofmanha" min="0" value="<?php echo $unidade['qtdprofmanha'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Tarde):</h3>
                    <input type="number" name="qtdproftarde" min="0" value="<?php echo $unidade['qtdproftarde'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Noite):</h3>
                    <input type="number" name="qtdprofnoite" min="0" value="<?php echo $unidade['qtdprofnoite'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (Integral):</h3>
                    <input type="number" name="qtdprofintegral" min="0" value="<?php echo $unidade['qtdprofnoite'];?>">
                </div><!--form-group-->
                <div class="form-group qtd">
                    <h3>Quantidade de Professores (AEE):</h3>
                    <input type="number" name="qtdprofaee" min="0" value="<?php echo $unidade['qtdprofaee'];?>">
                </div><!--form-group-->
            </div><!--box-qtd-->
        </fieldset>
        <fieldset>
            <legend>Dados de Infraestrutura</legend>
            <div class="rad">
                <div class="form-group flex-rad">
                    <h3>Possui Quadra?</h3>
                    <input type="radio" id="squadra" name="quadra" value="s" <?php echo ($unidade['quadra'] == 's') ? 'checked' : ''?>>
                    <label for="squadra">Sim</label>
                    <input type="radio" id="nquadra" name="quadra" value="n" <?php echo ($unidade['quadra'] == 'n') ? 'checked' : ''?>>
                    <label for="nquadra">Não</label>
                </div><!--form-group-->
                <div class="form-group flex-rad">
                    <h3>Possui Biblioteca?</h3>
                    <input type="radio" id="sbibli" name="biblioteca" value="s" <?php echo ($unidade['biblioteca'] == 's') ? 'checked' : ''?>>
                    <label for="sbibli">Sim</label>
                    <input type="radio" id="nbibli" name="biblioteca" value="n" <?php echo ($unidade['biblioteca'] == 'n') ? 'checked' : ''?>>
                    <label for="nbibli">Não</label>
                </div><!--form-group-->
                <div class="form-group flex-rad">
                    <h3>Possui Laboratório de Infor.?</h3>
                    <input type="radio" id="slab" name="labinfo" value="s" <?php echo ($unidade['labinfo'] == 's') ? 'checked' : ''?>>
                    <label for="slab">Sim</label>
                    <input type="radio" id="nlab" name="labinfo" value="n" <?php echo ($unidade['labinfo'] == 'n') ? 'checked' : ''?>>
                    <label for="nlab">Não</label>
                </div><!--form-group-->
            </div><!--rad-->
        </fieldset>
            <div class=form-group>
                <input type="hidden" name="nome_tabela" value="tb_admin.unidades">
                <input type="hidden" name="nome_tabela2" value="tb_unidades.etapa">
                <input type="hidden" name="nome_tabela3" value="tb_unidades.serie">
                <input type="hidden" name="nome_tabela4" value="tb_unidades.turno">
                <input type="submit" name="acao" value="Atualizar" >
            </div><!--form-group-->
    </form>
</div><!--box-content-->