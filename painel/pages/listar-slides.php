<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));

		$imagem = $selectImagem->fetch()['slide'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.slides',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.slides',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	
	$slides = Painel::selectAll('tb_site.slides',($paginaAtual - 1) * $porPagina,$porPagina);
?>

<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Slides Cadastrados</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentList headerCardDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Slides</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
					<div class="wapperTable">
						<table>
							<tr class="tHead">
								<td class="w10">Nome</td>
								<td class="w50">Imagem</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
							</tr><!--tHead-->
						<?php
							foreach ($slides as $key => $value) {
						?>
							<tr class="tBody">
							<td><?php echo $value['nome']; ?></td>
			<td><img style="width: 50px;height:50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>" /></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide?id=<?php echo $value['id']; ?>"><i data-feather="edit"></i> Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']; ?>"><i data-feather="trash-2"></i> Excluir</a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id'] ?>"><i data-feather="chevron-up"></i></a></td>
			<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id'] ?>"><i data-feather="chevron-down"></i></a></td>
							</tr><!--tBody-->
						<?php } ?>
						</table>
					</div><!--wapperTable-->
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentList-->

<div class="btnPags">
	<?php
		$totalPaginas = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);

		for($i = 1; $i <= $totalPaginas; $i++){
			if($i == $paginaAtual)
				echo '<a class="btnSelected btn btnPage" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
			else
				echo '<a class="btn btnPage" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
		}

	?>
</div><!--btnPags-->


























