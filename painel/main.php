<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html lang="pt-br" data-theme="dark">
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/feather-icons"></script>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
</head>
<body>
<base base="<?php echo INCLUDE_PATH_PAINEL ?>" />

<main id="mainContent">
	<aside id="asidePainel" ontouchstart="showCoordinates(event)" ontouchmove="showCoordinates(event)">
		<div class="wrap">
			<div class="userPainel items-flex">
				<div class="boxUser">
					<div class="imageUser text-center">
						<?php
							if($_SESSION['img'] == ''){
						?>
							<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/myWallpaper.jpg" />
						<?php }else{ ?>
							<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
						<?php } ?>
					</div><!--imageUser-->
					<div class="infoUser text-center">
						<p><?php echo $_SESSION['nome']; ?></p>
						<p class="cargo"><?php echo pegaCargo($_SESSION['cargo']); ?></p>
					</div><!--infoUser-->
				</div><!--box-user-->
			</div><!--userPainel-->
			<div class="menu" id="myMenu">
				<div class="wrapperMenu w90">
					<h2>Principal</h2>
					<ul>
						<li><a <?php selecionadoMenu('index'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="myGit" data-feather="command"></i> Painel de Controle</a></li>
					</ul>
					<h2>Cadastrar</h2>
					<ul>
						<li><a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento"><i class="myGit" data-feather="edit-2"></i> Cadastrar Depoimento</a></li>
						<li><a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico"><i class="myGit" data-feather="feather"></i> Cadastrar Serviço</a></li>
						<li><a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides"><i class="myGit" data-feather="download-cloud"></i> Cadastrar Slides</a></li>
					</ul>
					<h2>Gestão</h2>
					<ul>
						<li><a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos"><i class="myGit" data-feather="trello"></i> Listar Depoimentos</a></li>
						<li><a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos"><i class="myGit" data-feather="users"></i> Listar Serviços</a></li>
						<li><a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides"><i class="myGit" data-feather="layers"></i> Listar Slides</a></li>
					</ul>
					<h2>Administração do painel</h2>
					<ul>
						<li><a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario"><i class="myGit" data-feather="user"></i> Editar Usuário</a></li>
						<li><a <?php selecionadoMenu('adicionar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario"><i class="myGit" data-feather="user-plus"></i> Adicionar Usuário</a></li>
					</ul>
					<h2>Configuração Geral</h2>
					<ul>
						<li><a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site"><i class="myGit" data-feather="globe"></i> Editar Site</a></li>
					</ul>
					<h2>Gestão de Clientes</h2>
					<ul>
						<li><a <?php selecionadoMenu('cadastrar-clientes'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-clientes"><i class="myGit" data-feather="user-plus"></i> Cadastrar Clientes</a></li>
						<li><a <?php selecionadoMenu('gerenciar-clientes'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-clientes"><i class="myGit" data-feather="tool"></i> Gerenciar Clientes</a></li>
					</ul>
					<h2>Controle Financeiro</h2>
					<ul>
						<li><a <?php selecionadoMenu('vizualizar-pagamentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos"><i class="myGit" data-feather="dollar-sign"></i> Vizualizar Pagamentos</a></li>
					</ul>
					<h2>Controle de estoque</h2>
					<ul>
						<li><a <?php selecionadoMenu('cadastrar-produtos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-produtos"><i class="myGit" data-feather="box"></i> Cadastrar Produtos</a></li>
						<li><a <?php selecionadoMenu('vizualizar-produtos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-produtos"><i class="myGit" data-feather="shopping-cart"></i> Vizualizar Produtos</a></li>
					</ul>
					<h2>Gestão de Imóveis</h2>
					<ul>
						<li><a <?php selecionadoMenu('cadastrar-empreendimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-empreendimento"><i class="myGit" data-feather="coffee"></i> Cadastrar Imóvel</a></li>
						<li><a <?php selecionadoMenu('vizualizar-produtos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-empreendimentos"><i class="myGit" data-feather="home"></i> Listar Empreendimentos</a></li>
					</ul>
				</div><!--wrapperMenu-->
			</div><!--menu-->
		</div><!--wrap-->
	</aside><!--asidePainel-->

	<section id="bodyContents">

		<header>
			<div class="wrap grid-5x5">
				<div class="row items-flex w90 center">
					<div class="headerIcon items-flex w40Mobile">
						<span id="menuClose" class="btnIcon"><i class="menuMobile" data-feather="menu"></i> </span>
						<span id="menuOpen" class="btnIcon"><i class="menuMobile" data-feather="menu"></i> </span>
					</div><!--headerIcon-->
					<div class="headerInput w70">
						<form method="post" class="items-flex w100">
							<input class="w100" type="search" placeholder="Pesquisar..." /><div class="searchIcon"><i data-feather="search"></i></div><!--searchIcon-->
						</form>	
					</div><!--headerInput-->
				</div><!--row-->
				<div class="row">
					<div class="userIcons items-flex w60Mobile">
						<a class="btnIcon theme" id="themeDark" name="theme"><i class="iconUser" data-feather="sun"></i></a>
						<a class="btnIcon theme" id="themeLight" name="theme"><i class="iconUser" data-feather="moon"></i></a>
						<a class="btnIcon" href="<?php echo INCLUDE_PATH_PAINEL ?>#myChart"><i class="iconUser" data-feather="bar-chart"></i></a>
						<a class="btnIcon" href="<?php echo INCLUDE_PATH_PAINEL ?>loja"><i class="iconUser" data-feather="box"></i></a>
						<a class="btnIcon" href="<?php echo INCLUDE_PATH_PAINEL ?>?listar-depoimentos"><i class="iconUser" data-feather="bookmark"></i></a>
						<a class="btnIcon" href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="iconUser" data-feather="log-out"></i></a>
					</div><!--userIcons-->
				</div><!--row-->
			</div><!--wrap-->
		</header>
		
		<section style="padding:3%" class="content">
			<?php 
			Painel::carregarPagina(); 
			?>
		</section><!--content-->
	</section>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.maskMoney.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.ajaxform.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/ajax.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/constantes.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/myfunctions.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
	tinymce.init({
	selector:'.tinymce', //Usando o WYSIWYNG nas textareas que possuem a classe .tinymce
	plugins: "image", //Pode utilizar imagens dentro desse editor
	height:300 //Muda a altura
});
</script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/HelpMask.js"></script>
<?php Painel::loadJS(array('ajax.js'),'gerenciar-clientes'); ?>
<?php Painel::loadJS(array('ajax.js'),'cadastrar-clientes'); ?>
<?php Painel::loadJS(array('ajax.js'),'editar-cliente'); ?>
<?php Painel::loadJS(array('controleFinanceiro.js'),'editar-cliente'); ?>
<?php Painel::loadJS(array('drag.js'),'listar-empreendimentos'); ?>


</body>
</html>