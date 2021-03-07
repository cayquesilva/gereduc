<?php 
    class Site{
        public static function updateUsuarioOnline(){
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
                $check->execute(array($_SESSION['online']));
                if($check->rowCount() == 1){
                    $sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET ultimo_acesso = ? WHERE token = ?");
                    $sql->execute(array($horarioAtual,$token));
                }else{
                    $token = $_SESSION['online'];
                    $horarioAtual = date('Y-m-d H:i:s');
                    //pega ip do usuario
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
                    $sql->execute(array($ip,$horarioAtual,$token));
                } 
            }else{
                $_SESSION['online'] = uniqid();
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                //pega ip do usuario
                $ip = $_SERVER['REMOTE_ADDR'];
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }
        }
    }
?>