<?php
    namespace models;

    class membrosModel{
        public static function getMembroById($id){
            $info = \MySql::conectar()->prepare("SELECT * FROM `tb_site.membros` WHERE id = $id");
            $info->execute();
            return $info->fetch();
        }
        public static function listarAmigos(){
            $sql = \MySql::conectar()->prepare("SELECT * FROM `tb_site.solicitacoes` WHERE (id_to = ? AND status = 1) OR
            (id_from = ? AND status = 1)");
            $sql->execute(array($_SESSION['id_membro'],$_SESSION['id_membro']));
            $sql = $sql->fetchAll();
            $arr = [];
            $idMembro = $_SESSION['id_membro'];
            foreach($sql as $membros){
                if($membros['id_from'] == $idMembro){
                    $arr[] = $membros['id_to'];
                }else{
                    $arr[] = $membros['id_from'];
                }
            }
            return $arr;
        }
    }

?>