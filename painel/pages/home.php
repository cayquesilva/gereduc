<?php 
    verificaPermissaoPagina(1);
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 5;
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $unidades = Painel::selectAll('tb_admin.unidades',($paginaAtual-1) * $porPagina,$porPagina);
?>
<div class="box-content w100">
    <h2><i class="fa fa-home"></i> Olá <span><?php echo $_SESSION['nome'];?></span>, seja bem vindo(a) ao <span><?php echo NOME_EMPRESA;?></span></h2>
</div><!--box=content-->
    
<div class="box-content w100">
    <h2><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i></i> Estatísticas Gerais</h2>
    <div class="box-metricas">
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Unidades</h2>
                <p><?php echo count(Painel::selectAll('tb_admin.unidades')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Estudantes Matriculados</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdestudantes')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Estudantes AEE Matriculados</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdestudantesaee')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->    
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total Geral de Professores</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdturmas')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Professores Aee</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdturmasaee')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Professores (Manhã)</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdprofmanha')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Professores (Tarde)</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdproftarde')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Professores (Noite)</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdprofnoite')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Professores (Integral)</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdprofintegral')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de Programas Ativos</h2>
                <p><?php echo (Painel::contaPrograma('tb_unidades.programas')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
    </div><!--box-metricas-->
</div><!--box=content-->

<div class="box-content w100">
    <h2><i class="fas fa-landmark" aria-hidden="true"></i> Estatísticas de Infraestutura</h2>
    <div class="box-metricas">
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total Geral de Turmas</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdturmas')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total de Turmas Aee</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdturmasaee')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total de Turmas Adaptadas</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','qtdturmasadapt')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total de Unidades com Quadra</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','quadra')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total de Unidades com Bibliotecas</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','biblioteca')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single yellow">
            <div class="box-metrica-wraper">
                <h2>Total de Unidades com Lab. de Informática</h2>
                <p><?php echo (Painel::contaAgentes('tb_admin.unidades','labinfo')); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
    </div><!--box-metricas-->
</div><!--box=content-->

<div class="box-content w100">
    <h2><i class="fas fa-book" aria-hidden="true"></i> Unidades Cadastradas</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td>INEP</td>
                <td>Nome da Unidade</td>
                <td>Gestor(a)</td>
                <td>Contato</td>
                <td>Programas Ativos</td>
                <td>Registrar Programas</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
            <?php
                foreach ($unidades as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value['inep']; ?></td>
                <td><?php echo $value['nome_unidade']; ?></td>
                <td><?php echo $value['nome_gestor']; ?></td>
                <td><?php echo $value['contato_gestor']; ?></td>
                <td><?php echo Painel::contaPrograma('tb_unidades.programas',$value['inep']); ?></td>
                <td><a actionBtn="programas" class="btn program" href="<?php echo INCLUDE_PATH_PAINEL?>registro-programas?inep=<?php echo $value['inep'];?>"><i class="fas fa-tasks"></i></a></td>
                <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-local?inep=<?php echo $value['inep'];?>"><i class=" fa fa-pen"></i></a></td>
                <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>listar-unidades?excluir=<?php echo $value['inep'];?>"><i class=" fa fa-times"></i></a></td>
            </tr>
            <?php } ?>
        </table>
    </div><!--wraper-table-->
    <div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_admin.unidades')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'home?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'home?pagina='.$i.'">'.$i.'</a>';
        }
    ?>
</div><!--paginacao-->
</div><!--box=content-->