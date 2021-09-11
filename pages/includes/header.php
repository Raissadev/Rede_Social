<!DOCTYPE html>
<html>
<head>
	<title>Portal Imobiliário</title>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet" />
	<script src="https://unpkg.com/feather-icons"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
	<meta charset="utf-8" />
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?> " />

<header>
	<div class="wrap w90 center grid-4x6">
		<div class="row">
			<div class="logo">
				<img src="<?php INCLUDE_PATH ?>images/logo.png" />
			</div><!--logo-->
		</div><!--row-->
		<div class="row">
			<div class="menu">
				<nav class="grid-9x1 gridOneMobile myNav">
					<ul class="colMenu navSidebar hidden" id="navSidebar">
						<li><a href="<?php INCLUDE_PATH ?>home">Início</a></li>
						<li><a href="<?php INCLUDE_PATH ?>empreendimentos">Empreendimentos</a></li>
						<li><a href="">Imóveis</a></li>
						<li><a id="searchCard">Pesquisar</a></li>
						<li><a href="">Contato</a></li>
					</ul>
					<ul class="colMenuIcon">
						<li id="btnSidebar"><a><span class="menuOpen"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64.584px" height="21.75px" viewBox="0 0 64.584 21.75" enable-background="new 0 0 64.584 21.75" xml:space="preserve"><rect x="7.292" y="6.875" fill="#FFFFFF" width="50" height="1"></rect><rect x="7.292" y="13.875" fill="#FFFFFF" width="50" height="1"></rect></svg> </span></a></li>
					</ul>
				</nav>
			</div><!--menu-->
		</div><!--row-->
	</div><!--wrap-->
</header>

<section class="searchHeader items-flex justCenter" id="searchContent">
	<i class="closeContent" data-feather="x"></i>
	<div class="wrap w60">
		<div class="row">
			<form>
				<input type="search" name="texto-busca" placeholder="O'que você procura?" class="w100" />
			</form>
		</div><!--row-->
	</div><!--wrap-->
</section><!--searchHeader-->
