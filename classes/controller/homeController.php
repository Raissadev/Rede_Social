<?php
	namespace controller;
	use \views\mainView;

	class homeController
	{
		public function index(){
			if(isset($_GET['addCart'])){
				$idProduto = (int)$_GET['addCart'];
				if(isset($_SESSION['carrinho']) == false){
					$_SESSION['carrinho'] = array();
				}
				if(isset($_SESSION['carrinho'][$idProduto]) == false){
					$_SESSION['carrinho'][$idProduto] = 1;
				}else{
					$_SESSION['carrinho'][$idProduto]++;
				}
				\Painel::redirect(INCLUDE_PATH.'finalizar');
			}
			mainView::render('home.php');
		}
		public function loja(){
			mainView::render('loja.php');
		}
	}
?>