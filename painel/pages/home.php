<?php 
    $usuariosOnline = Painel::listarUsuariosOnline();
?>
<div class="box-content w100">
    <h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA;?></h2>
    <div class="box-metricas">
        <div class="box-metrica-single red">
            <div class="box-metrica-wraper">
                <h2>Usuários Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single blue">
            <div class="box-metrica-wraper">
                <h2>Total de visitas</h2>
                <p>100</p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="box-metrica-single green">
            <div class="box-metrica-wraper">
                <h2>Visitas hoje</h2>
                <p>3</p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->
        <div class="clear"></div>
    </div><!--box-metricas-->
</div><!--box=content-->
    
<div class="box-content w100">
    <h2><i class="fas fa-user-friends" aria-hidden="true"></i> Usuários Online</h2>
    <div class="tabela-resp">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Ultima Ação</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php 
            //laço para preencher tabela de acordo com o bd
            foreach($usuariosOnline as $key => $value){
        ?>
        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultimo_acesso']))?></span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php  }?>
    </div><!--tabela-resp-->
</div><!--box=content-->
