<?php
	namespace controller;

	class empreendimentoController
	{
		
		public function index($par){
			$idEmpreendimento = \MySql::conectar()->prepare("SELECT id,nome FROM `tb_admin.empreendimentos` WHERE slug = '$par[1]'");
			$idEmpreendimento->execute();
			$idEmpreendimento = $idEmpreendimento->fetch();
			\views\mainView::setParam(['nome_empreendimento'=>$idEmpreendimento['nome'],'slug_empreendimento'=>$par[1],'imoveis'=>\models\empreendimentoModel::pegaImoveis($idEmpreendimento['id'])]);
			\views\mainView::render('empreendimentos.php');
		}
	}
?>