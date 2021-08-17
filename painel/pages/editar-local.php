<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 30;
    $local = Painel::selectAll('tb_localtrabalho',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirItem('tb_localtrabalho',$idExcluir);
        Painel::redirecionar('editar-local');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Locais de Trabalho Cadastrados</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>Inep</td>
            <td>Local</td>
            <td>Bairro</td>
            <td>Gestor</td>
            <td>Telefone do(a) Gestor(a)</td>
            <td>Editar</td>
            <td>Deletar</td>
        </tr>
        <?php
            foreach ($local as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['inep']; ?></td>
            <td><?php echo $value['local']; ?></td>
            <td><?php echo $value['bairro']; ?></td>
            <td><?php echo $value['gestor']; ?></td>
            <td><?php echo $value['telefonegestor']; ?></td>
            <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>alterar-local?inep=<?php echo $value['inep'];?>"><i class=" fa fa-pen"></i></a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>editar-local?excluir=<?php echo $value['inep'];?>"><i class=" fa fa-times"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div><!--wraper-table-->

<div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_localtrabalho')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'editar-local?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'editar-local?pagina='.$i.'">'.$i.'</a>';
        }            
    ?>
</div><!--paginacao-->

</div><!--box-content-->