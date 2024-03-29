<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 5;
    $noticias = Painel::selectAll('tb_site.noticia',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirItem('tb_site.noticia',$idExcluir);
        Painel::redirecionar('listar-noticia');
    }else if(isset($_GET['ordenar']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.noticia',$_GET['ordenar'],$_GET['id']);
        Painel::redirecionar('listar-noticia');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Notícias Cadastradas</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>Nome</td>
            <td>Notícia</td>
            <td>Editar</td>
            <td>Deletar</td>
            <td>Ord. Cres.</td>
            <td>Ord. Decr.</td>
        </tr>
        <?php
            foreach ($noticias as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $value['noticia']; ?></td>
            <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-noticia?id=<?php echo $value['id'];?>"><i class=" fa fa-pen"></i></a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>listar-noticia?excluir=<?php echo $value['id'];?>"><i class=" fa fa-times"></i></a></td>
            <td><a actionBtn="ordUp" class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-noticia?ordenar=up&id=<?php echo $value['id'];?>"><i class="fas fa-angle-up"></i></a></td>
            <td><a actionBtn="ordDown" class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-noticia?ordenar=down&id=<?php echo $value['id'];?>"><i class="fas fa-angle-down"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div><!--wraper-table-->

<div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_site.noticia')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-noticia?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-noticia?pagina='.$i.'">'.$i.'</a>';
        }            
    ?>
</div><!--paginacao-->

</div><!--box-content-->