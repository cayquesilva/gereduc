<?php
//se pagina for setado, vai pegar o inteiro da pagina, se não vai ser 1
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 50;
    $servidores = Painel::selectAll('tb_funcionario.dadospessoais',($paginaAtual-1) * $porPagina,$porPagina);
//se tiver excluir no endereço (quando clica em excluir adiciona a variavel na url)
    if(isset($_GET['excluir'])){
        //pega o valor do excluir passado no url
        $idExcluir = intVal($_GET['excluir']);
        Painel::excluirServidor('tb_funcionario.dadospessoais',$idExcluir);
        Painel::redirecionar('editar-servidor');
    }
?>
<div class="box-content">
    <h2><i class="fas fa-book"></i> Servidores Cadastrados</h2>

<div class="wraper-table">
    <table>
        <tr>
            <td>Matrícula</td>
            <td>Nome</td>
            <td>Data de Nascimento</td>
            <td>CPF</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php
            foreach ($servidores as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value['matricula']; ?></td>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['datadenascimento']; ?></td>
            <td><?php echo $value['cpf']; ?></td>
            <td><a actionBtn="editar" class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>alterar-servidor?matricula=<?php echo $value['matricula'];?>"><i class=" fa fa-pen"></i></a></td>
            <td><a actionBtn="deletar" class="btn del" href="<?php echo INCLUDE_PATH_PAINEL?>editar-servidor?excluir=<?php echo $value['matricula'];?>"><i class=" fa fa-times"></i></a></td>
        </tr>
        <?php } ?>
    </table>
</div><!--wraper-table-->

<div class="paginacao">
    <?php 
    //ceil arredonda para o proximo inteiro.
        $totalPaginas = ceil(count(Painel::selectAll('tb_funcionario.dadospessoais')) / $porPagina);
        for($i = 1;$i <= $totalPaginas;$i++) {
            if($i == $paginaAtual)
                echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'editar-servidor?pagina='.$i.'">'.$i.'</a>';
            else
                echo '<a href="'.INCLUDE_PATH_PAINEL.'editar-servidor?pagina='.$i.'">'.$i.'</a>';
        }
    ?>
</div><!--paginacao-->

</div><!--box-content-->