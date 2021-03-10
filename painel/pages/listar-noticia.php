<?php
    $noticias = Painel::selectAll('tb_site.noticia');
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Notícias Cadastradas</h2>


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
            <td><a class="btn del" href=""><i class=" fa fa-times"></i> Excluir</a></td>
        </tr>
        <?php } ?>
    </table>

</div><!--box-content-->