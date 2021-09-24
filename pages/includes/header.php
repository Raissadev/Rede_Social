<!DOCTYPE html>
<html>
<head>
	<title>Rede Social</title>
	<link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
	<meta charset="utf-8" />
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?> " />
<header>
	<div class="wrap">
		<div class="row gridTwo alignCenter">
			<div class="logoySearch itemsFlex alignCenter">
				<h1><a href="<?php echo INCLUDE_PATH; ?>">Raissa<span>Dev</span></a></h1>
				<form class="formCurstoContent marginSideSmall w100 positionRelative itemsFlex alignCenter hideMobile">
					<button><i class="ri-search-line"></i></button>
					<input type="search" placeholder="Pesquisar..." class="w60" />
				</form><!--searchContent-->
			</div><!--logoySearch-->
			<div class="itemsUser">
				<nav>
					<ul class="itemsEmphasis itemsFlex alignCenter justEnd">
						<?php 
							if(isset($_SESSION['email_membro'])){
						?>
						<li class="userInfo hideMobile"><a href="<?php echo INCLUDE_PATH; ?>me"><img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img_membro']; ?>" class="userImg"/> <span><?php echo $_SESSION['nome_membro'] ?></span></a></li>
						<?php }else{ 
							echo '';
						}?>

						<?php 
							if(isset($_SESSION['email_membro'])){
								$solicitacoesPendentes = count(\controller\solicitacoesController::listarSolicitacoes()); 
							}
						?>
						<li><a href="<?php echo INCLUDE_PATH; ?>comunidade"><i class="ri-base-station-line"></i></a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>"><i class="ri-home-smile-line"></i></a></li>
						<li><a href="<?php echo INCLUDE_PATH ?>solicitacoes"><i class="ri-notification-3-line"></i>
						<?php if(isset($_SESSION['email_membro'])){ ?>
							<span class="statusTwo"><?php echo $solicitacoesPendentes; ?></span></a></li>
						<?php }else{ echo ''; } ?>
						<li class="toggleAside"><a><i class="ri-message-3-line"></i></a></li>
						<li><a href="<?php echo INCLUDE_PATH ?>me?sair"><i class="ri-door-lock-line"></i></a></li>
					</ul><!--itemsEmphasis-->
				</nav>
			</div><!--itemsUser-->
		</div><!--row-->
	</div><!--wrap-->
	<div class="row gridOne alignCenter">
		<nav class="itemsMenu itemsFlex alignCenter">
			<ul class="w10">
				<li><a class="menuAside"><i class="ri-menu-line"></i></a></li>
			</ul>
			<ul class="itemsFlex alignCenter w90">
				<li><a><i class="ri-quill-pen-line"></i></a></li>
				<li><a><i class="ri-cast-line"></i></a></li>
				<li><a><i class="ri-play-list-2-line"></i></a></li>
				<li><a><i class="ri-bookmark-3-line"></i></a></li>
				<li class="toggleAside"><a><i class="ri-message-3-line"></i></a></li>
				<li><a href="<?php echo INCLUDE_PATH ?>comunidade"><i class="ri-group-line"></i></a></li>
			</ul>
		</nav><!--itemsMenu-->
	</div><!--row-->
</header>

<aside class="aside hide">
	<div class="wrap">
		<div class="row">
			<ul>
				<li class="active"><a href="<?php echo INCLUDE_PATH ?>"><i class="ri-home-smile-line"></i> Home</a>
				<li><a href="<?php echo INCLUDE_PATH ?>me"><i class="ri-user-3-line"></i> Perfil</a>
				<li><a href="<?php echo INCLUDE_PATH ?>comunidade"><i class="ri-group-line"></i> Grupos</a>
				<li><a href="https://github.com/Raissadev"><i class="ri-profile-line"></i> Docs</a>
				<li><a href="<?php echo INCLUDE_PATH ?>solicitacoes"><i class="ri-drag-move-line"></i> Seguindo</a>
				<li><a><i class="ri-equalizer-line"></i> Configurações</a>
			</ul>
		</div><!--row-->
	</div><!--wrap-->
</aside><!--aside-->

<aside class="infosDicesUser card hide">
	<div class="wrap">
		<div class="row">
			<div class="cardUser">
				<div class="cardHeaderUser borderBottomCard marginDownSmall positionRelative">
					<nav class="navigation marginDownSmall">
						<ul class="itemsFlex alignCenter">
							<li class="activeNav tabs--active tab"><a class="tabNav">Mensagens</a></li>
							<li class="tab"><a class="tabNav">Notificações</a></li>
						</ul>
					</nav><!--navigation-->
					<div class="textHeader itemsFlex alignCenter">
						<i class="ri-chat-smile-3-line"></i> <h4>Tudo</h4>
					</div><!--textHeader-->
					<a class="close toggleAside"><i class="ri-close-fill"></i></a>
				</div><!--cardHeaderUser-->
				<div class="cardBodyUser">
					<ul class="users mensagens contentUsers contentActive">
						<?php for($i = 0;$i < 5; $i++){ ?>
						<a>
							<li class="itemsFlex alignCenter">
								<figure class="userImgTwo textCenter">
									<img src="<?php echo INCLUDE_PATH ?>/images/myWallpaper.jpg">
								</figure>
								<div class="infoUser">
									<h4>Jhon Doe</h4>
									<p class="limitLineClampOne">Helo dear i wanna talk to you</p>
								</div><!--infoUser-->
							</li>
						</a>
						<?php } ?>
					</ul><!--users-->
					<ul class="users notificacoes contentUsers content--active">
						<?php for($i = 0;$i < 5; $i++){ ?>
						<a>
							<li class="itemsFlex alignCenter">
								<figure class="userImgTwo textCenter">
									<img src="<?php echo INCLUDE_PATH ?>/images/myWallpaper.jpg">
								</figure>
								<div class="infoUser">
									<h4>Amanda Doe</h4>
									<p class="limitLineClampOne">Helo dear i wanna talk to you</p>
								</div><!--infoUser-->
							</li>
						</a>
						<?php } ?>
					</ul><!--users-->
					
				</div><!--cardBodyUser-->
			</div><!--cardUser-->
		</div><!--row-->
	</div><!--wrap-->
</aside><!--infosDicesUser-->