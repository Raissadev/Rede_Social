<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	<link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
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
	<div class="wrap center">
		<div class="row gridCustom alignCenter gridTwoMobile">
			<div class="logoHeader itemsFlex alignCenter">
				<a class="menuMobile"><i class="ri-menu-2-line"></i></a>
				<h2><a href="">Raissa<span>Dev</span></a></h2>
			</div><!--logoHeader-->
			<div class="itemsMenu showMenu">
				<ul class="itemsLi itemsFlex alignCenter dpGrid">
					<li><a href="<?php echo INCLUDE_PATH; ?>">Início</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>loja">Catálogo</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>loja">Loja</a></li>
					<li><a href="">Suporte</a></li>
					<li><a href="">Novos</a></li>
				</ul>
			</div><!--itemsMenu-->
			<div class="btsActionHeader itemsFlex alignCenter justEnd">
				<?php 
					if(!isset($_SESSION['login'])){
				?>
				<a href="<?php echo INCLUDE_PATH; ?>painel/login"><button class="btnInput">Entrar</button></a><!--btnInput-->
				<?php }else{ ?>
					<a href="<?php echo INCLUDE_PATH; ?>painel/home"><button class="btnInput">Painel</button></a><!--btnInput-->
				<?php } ?>
			</div><!--btnsActionHeader-->
		</div><!--row-->
		<div class="row grid-two alignCenter">
			<div class="searchShop itemsFlex alignCenter">
				<form class="inputGroup itemsFlex alignCenter">
					<input type="search" placeholder="Pesquise aqui..." />
					<select>
						<option>Todas as Categorias</option>
						<option>Games</option>
					</select>
					<button><i class="ri-search-line"></i></button>
				</form><!--inputGroup-->
			</div><!--searchShop-->
			<div class="dicesLine">
				<ul class="itemsLi itemsLiIcons itemsFlex alignCenter justEnd">
					<li><a href=""><i class="ri-heart-line"></i> <span>Favoritos</span></a></li>
					<li><a href="<?php INCLUDE_PATH ?>finalizar"><i class="ri-shopping-cart-line"></i> <span>Carrinho</span></a></li>
				</ul>
			</div><!--dicesLines-->
		</div><!--row-->
	</div><!--wrap-->
</header>
