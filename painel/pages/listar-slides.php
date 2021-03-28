<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 5;
    $slide = Painel::selectAll('tb_site.slide',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirImagem('tb_site.slide',$idExcluir);
        Painel::excluirItem('tb_site.slide',$idExcluir);
        Painel::redirecionar('listar-slides');
    }else if(isset($_GET['ordenar']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.slide',$_GET['ordenar'],$_GET['id']);
        Painel::redirecionar('listar-slides');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Slides Cadastrados</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>Nome</td>
            <td>Imagem</td>
            <td>Editar</td>
            <td>Deletar</td>
            <td>Ord. Cres.</td>
            <td>Ord. Decr.</td>
        </tr>
        <?php
            foreach ($slide as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['slide'];?>"></img></td>
            <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-slide?id=<?php echo $value['id'];?>"><i class=" fa fa-pen"></i></a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?excluir=<?php echo $value['id'];?>"><i class=" fa fa-times"></i></a></td>
            <td><a actionBtn="ordUp" class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?ordenar=up&id=<?php echo $value['id'];?>"><i class="fas fa-angle-up"></i></a></td>
            <td><a actionBtn="ordDown" class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?ordenar=down&id=<?php echo $value['id'];?>"><i class="fas fa-angle-down"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div><!--wraper-table-->

<div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_site.slide')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
        }            
    ?>
</div><!--paginacao-->

</div><!--box-content-->