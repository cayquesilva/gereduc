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
<?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticia` ORDER BY id_ordem ASC LIMIT 4");
    $sql->execute();
    $noticias = $sql->fetchAll();
    foreach ($noticias as $key => $value) {
?>
<div class="noticia-single">
    <h1><?php echo $value['titulo'];?></h1>
    <p><?php echo $value['noticia'];?></p>
</div><!--noticia-single-->
<?php }?> 
</section>
<section class="cursos" id="cursos">
    cursos
</section>