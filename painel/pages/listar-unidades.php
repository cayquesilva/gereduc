<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 10;
    $unidades = Painel::selectAll('tb_admin.unidades',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirServidor('tb_admin.unidades',$idExcluir);
        Painel::redirecionar('listar-unidades');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Unidades Cadastradas</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>INEP</td>
            <td>Nome da Unidade</td>
            <td>Gestor(a)</td>
            <td>Contato</td>
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
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-unidades?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-unidades?pagina='.$i.'">'.$i.'</a>';
        }
    ?>
</div><!--paginacao-->

</div><!--box-content-->