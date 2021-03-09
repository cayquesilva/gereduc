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
    }
?>