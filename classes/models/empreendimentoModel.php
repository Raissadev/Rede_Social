<?php
    namespace models;

    class empreendimentoModel{
        public static function pegaImoveis($id){
            $selectImoveis = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.imoveis` WHERE empreed_id = $id");
            $selectImoveis->execute();
            return $selectImoveis->fetchAll();
        }
    }
?>