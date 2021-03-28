<div class="box-content">
    <h2><i class="fas fa-plus"></i> Cadastrar Slide</h2>
    <!--enctype serve para permitir envio de imagem no formulário-->
    <form method=post enctype="multipart/form-data">
    <?php 

        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $imagem = $_FILES['slide'];
            if($nome == '')
                Painel::alerta('erro','O Nome está vazio!');
            else if(Painel::imagemValida($imagem) == false){
                Painel::alerta('erro','A imagem não é de um formato válido.');
                }else{
                    $imagem = Painel::uploadFile($imagem);
                    //posso usar assim ou colocar em inputs "hidden"
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id_ordem'=>0,'nome_tabela'=>'tb_site.slide'];
                    Painel::insert($arr);
                    Painel::alerta('sucesso','O cadastro do slide foi realizado!');
                }
            };
    ?>
    <div class=form-group>
        <label>Nome do slide:</label>
        <input type="text" name="nome">
    </div><!--form-group-->
    <div class=form-group>
        <label>Imagem:</label>
        <input type="file" name="slide">
    </div><!--form-group-->
    <div class=form-group>
        <input type="submit" name="acao" value="Cadastrar" >
    </div><!--form-group-->
    </form>
</div><!--box-content-->