<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>

<?php
	include('pages/includes/header.php')
?>

<base base="<?php echo INCLUDE_PATH; ?>" />
	<?php
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'empreendimentos':
				echo '<target target="depoimentos" />';
				break;

			case 'contato':
				echo '<target target="servicos" />';
				break;
		}
	?>
	


	<main class="mainContent">
	<?php

		if(file_exists('pages/'.$url.'.php')){ //A gente verifica se existe
			include('pages/'.$url.'.php');
		}else{
			//Caso contrário... Podemos fazer o que quiser, pois a página não existe.
			if($url != 'empreendimentos' && $url != 'servicos'){
				$urlPar = explode('/',$url)[0];
				if($urlPar != 'noticias'){
				$pagina404 = true;
				include('pages/404.php');
			}
			}else{
				include('pages/home.php');
				}
			}

	?>
	</main><!--mainContent-->




<?php
	include('pages/includes/footer.php')
?>



</body>
</html>