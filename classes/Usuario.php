<?php
    class Usuario{

        public function atualizarUsuario($nome,$senha,$imagem){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ? ");
            if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
                return true;
            }else{
                return false;
            }
        }

        public function criarUsuario($user,$senha,$imagem,$nome,$cargo){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES(?,?,?,?,?,?)");
            if($sql->execute(array(null,$user,$senha,$imagem,$nome,$cargo))){
                return true;
            }else{
                return false;
            }
        }
    }
?>