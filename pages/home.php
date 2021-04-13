<section class="main">
    <div class="container">
        <div class="main-conteudo">
            <div class="box-conteudo">
                <div class="box-individual">
                    <h1>Título de algo</h1>
                    Alguma notícia
                </div><!--box-individual-->
            </div><!--box-conteudo-->
        </div><!--main-conteudo-->
    </div><!--container-->
</section><!--main-->
<section class="noticias" id="noticias">
<div class="container">
    <h1>Notícias</h1>
<?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticia` ORDER BY id_ordem ASC LIMIT 6");
    $sql->execute();
    $noticias = $sql->fetchAll();
    foreach ($noticias as $key => $value) {
?>
<div class="noticia-single">
    <h1><?php echo $value['titulo'];?></h1>
    <p><?php echo $value['noticia'];?></p>
</div><!--noticia-single-->
<?php }?> 
</div>
<div class="clear"></div>
</section>

<section class="cursos" id="cursos">
<div class="container">
    <h1>Cursos</h1>
<?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.curso` ORDER BY id_ordem ASC LIMIT 3");
    $sql->execute();
    $cursos = $sql->fetchAll();
    foreach ($cursos as $key => $value) {
?>
    <div class="cursos-single">
        <h1><?php echo $value['nome']; ?></h1>
        <p><?php echo $value['descricao']; ?></p>
        <p><?php echo $value['vagas']; ?></p>
    </div><!--cursos-single-->
<?php }?> 
</div>
<div class="clear"></div>
</section>