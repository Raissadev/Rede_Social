<?php
	namespace controller;
	use \views\mainView;

	class homeController
	{
		public function cadastro(){
			if(isset($_POST['cadastro'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$imagem = $_FILES['imagem'];
				if($nome === ''){
					echo "<script>alert('O campo nome não pode estar vazio!')</script>";
				}
				if($senha === ''){
					echo "<script>alert('O campo senha não pode estar vazio!')</script>";
				}
				if($email === ''){
					echo "<script>alert('O campo senha não pode estar vazio!')</script>";
				}else if(\Painel::imagemValida($imagem) == false){
					echo "<script>alert('A imagem é invalida!')</script>";
				}else{
					//Realizar o cadastro
					$verifica = \MySql::conectar()->prepare("SELECT email FROM `tb_site.membros` WHERE email = ?");
					$verifica->execute(array($email));
					if($verifica->rowCount() == 0){
						$idImagem = \Painel::uploadFile($imagem);
						$sql = \MySql::conectar()->prepare("INSERT INTO `tb_site.membros` VALUES (null,?,?,?,?)");
						$sql->execute(array($nome,$email,$senha,$idImagem));
						\Painel::redirect(INCLUDE_PATH.'me');
					}else{
						echo "<script>alert('Já existe um usuário com este email')</script>";
					}
				}
			}
			mainView::render('cadastro.php');
		}
		public function login(){
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				$verifica = \MySql::conectar()->prepare("SELECT * FROM `tb_site.membros` WHERE email = ? AND senha = ?");
				$verifica->execute(array($email,$senha));
				if($verifica->rowCount() == 1){
					$info = $verifica->fetch();
					$_SESSION['email_membro'] = $email;
					$_SESSION['id_membro'] = $info['id'];
					$_SESSION['nome_membro'] = $info['nome'];
					$_SESSION['img_membro'] = $info['imagem'];
					echo "<script>alert('Login realizado com sucesso!')</script>";
					\Painel::redirect(INCLUDE_PATH.'me');
				}else{
					echo "<script>alert('Email ou senha incorretos')</script>";
				}
			}
			mainView::render('login.php');
		}
		public function index(){
			if(!isset($_SESSION['email_membro'])){
				\Painel::redirect(INCLUDE_PATH.'cadastro');
			}else{
				if(isset($_POST['feed_post'])){
					$mensagem = strip_tags($_POST['mensagem']);
					if($mensagem == ''){
						echo "<script>alert('Sua mensagem não pode estar vazia!')</script>";
						\Painel::redirect(INCLUDE_PATH);
					}else{
						$sql = \MySql::conectar()->prepare("INSERT INTO `tb_site.feed` VALUES (null,?,?)");
						$sql->execute(array($_SESSION['id_membro'],$mensagem));
						\Painel::redirect(INCLUDE_PATH);
					}
				}
				mainView::render('home.php',['controller'=>$this]);
			}
		}
	}
?>