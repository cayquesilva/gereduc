<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 5;
    $noticias = Painel::selectAll('tb_site.noticia',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirNoticia('tb_site.noticia',$idExcluir);
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
        </tr>
        <?php
            foreach ($noticias as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $value['noticia']; ?></td>
            <td><a class="btn edit" href=""><i class=" fa fa-pen"></i> Editar</a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>listar-noticia?excluir=<?php echo $value['id'];?>"><i class=" fa fa-times"></i> Excluir</a></td>
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