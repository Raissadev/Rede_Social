<?php
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome']; 
				$_SESSION['img'] = $info['img'];
				header('Location: '.INCLUDE_PATH_PAINEL);
				die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH ?>css/style.css" rel="stylesheet" />
</head>
<body>
				<?php
					if(isset($_POST['acao'])){
						$user = $_POST['user'];
						$password = $_POST['password'];
						$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
						$sql->execute(array($user,$password));
						if($sql->rowCount() == 1){
							$info = $sql->fetch();
							//Logamos com sucesso.
							$_SESSION['login'] = true;
							$_SESSION['user'] = $user;
							$_SESSION['password'] = $password;
							$_SESSION['cargo'] = $info['cargo'];
							$_SESSION['nome'] = $info['nome']; 
							$_SESSION['img'] = $info['img'];
							if(isset($_POST['lembrar'])){
								setcookie('lembrar',true,time()+(60*60*24),'/');
								setcookie('user',$user,time()+(60*60*24),'/');
								setcookie('password',$password,time()+(60*60*24),'/');
							}
							header('Location: '.INCLUDE_PATH_PAINEL);
							die();
						}else{
							//Falhou
							echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
						}}
				?>
					<section class="boxLogin itemsFlex alignCenter justCenter">
    					<div class="wrap">
        					<div class="row">
            					<div class="title textCenter marginDownDefault">
                					<h3>Faça Login!</h3>
                					<p>LOREM IPSUM DOLOR SIT AMET</p>
            					</div><!--title-->
            			<div class="cardLogin itemsFlex alignCenter justCenter">
							<form method="post" class="textCenter">
								<input class="w100" type="text" name="user" placeholder="Login..." required>
								<input class="w100" type="password" name="password" placeholder="Senha..." required>
							<div class="checkGroup itemsFlex alignCenter">
								<input class="checkbox" type="checkbox" name="lembrar" />
								<label>Lembrar-me</label>
							</div><!--checkGroup-->
							<div class="formGroup">
								<div class="inputFormGroup">
									<input type="submit" name="acao" value="Logar!">
								</div><!--inputGroup-->
							</div><!--formGroup-->
					</form>
					</div><!--cardLogin-->
				</div><!--row-->
			</div><!--wrap-->
		</section><!--boxLogin-->
</body>
</html>
