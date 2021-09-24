<?php
	namespace controller;
	use \views\mainView;

	class perfilController
	{
		public function index(){
            if(!isset($_SESSION['email_membro'])){
                \Painel::redirect(INCLUDE_PATH.'cadastro');
            }
            if(isset($_GET['sair'])){
                session_unset();
                session_destroy();
                \Painel::redirect(INCLUDE_PATH.'login');
            }
            if(isset($_POST['feed_post'])){
                $mensagem = strip_tags($_POST['mensagem']);
                if($mensagem == ''){
                    echo "<script>alert('Sua mensagem não pode estar vazia!')</script>";
                    \Painel::redirect(INCLUDE_PATH.'me');
                }else{
                    $sql = \MySql::conectar()->prepare("INSERT INTO `tb_site.feed` VALUES (null,?,?)");
                    $sql->execute(array($_SESSION['id_membro'],$mensagem));
                    \Painel::redirect(INCLUDE_PATH.'me');
                }
            }
			if(isset($_SESSION['email_membro'])){
			    mainView::render('me.php');
            }
		}
	}
?>