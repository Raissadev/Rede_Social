<?php
	namespace controller;
	use \views\mainView;

	class finalizarController
	{
		public function index(){
			mainView::render('finalizar.php');
        }
        
	}
?>