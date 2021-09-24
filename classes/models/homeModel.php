<?php
	namespace models;

	class homeModel{
		public static function getMembros(){
            $info = \MySql::conectar()->prepare("SELECT * FROM `tb_site.membros`");
            $info->execute();
            return $info->fetchAll();
        }
	}
?>