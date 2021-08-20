<?php
    verificaPermissaoPagina(1);
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 50;
    $usuarios = Painel::selectAll('tb_admin.usuarios',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirServidor('tb_admin.usuarios',$idExcluir);
        Painel::redirecionar('listar-usuarios');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Usuários Cadastrados</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>Nome</td>
            <td>Usuário</td>
            <td>Cargo</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php
            foreach ($usuarios as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['user']; ?></td>
            <td><?php echo Painel::$cargos[$value['cargo']]; ?></td>
            <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario?matricula=<?php echo $value['id'];?>"><i class=" fa fa-pen"></i></a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>listar-usuarios?excluir=<?php echo $value['id'];?>"><i class=" fa fa-times"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div><!--wraper-table-->

<div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_admin.usuarios')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-usuarios?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'editar-usuario?pagina='.$i.'">'.$i.'</a>';
        }
    ?>
</div><!--paginacao-->

</div><!--box-content-->