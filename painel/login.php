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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="estilo/font-awesome.min.css">
	<link href="../css/style.css" rel="stylesheet" />
	<link href="css/login.css" rel="stylesheet" />
</head>
<body>
	<section class="boxLogin">
		<div class="wrap items-flex">
			<div class="row w40 w90Mobile">
				<div class="formLogin">
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
					<div class="title text-center">
						<h2>Efetue o Login</h2>
					</div><!--title-->
					<form method="post">
						<input class="w100" type="text" name="user" placeholder="Login..." required>
						<input class="w100" type="password" name="password" placeholder="Senha..." required>
						<div class="formGroup grid-5x5">
							<div class="inputGroup items-flex">
								<input type="submit" name="acao" value="Logar!">
							</div><!--inputGroup-->
							<div class="inputGroup checkGroup items-flex">
								<input type="checkbox" name="lembrar" />
								<label>Lembrar-me</label>
							</div><!--inputGroup-->
						</div><!--formGroup-->
						<div class="clear"></div>
					</form>
				</div><!--formLogin-->
			</div><!--row-->
		</div><!--wrap-->
	</section><!--boxLogin-->

</body>
</html>