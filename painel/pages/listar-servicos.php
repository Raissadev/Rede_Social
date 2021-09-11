
<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site.servicos',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	
	$servicos = Painel::selectAll('tb_site.servicos',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Serviços Cadastrados</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentList headerCardDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Serviços</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
					<div class="wapperTable">
						<table>
							<tr class="tHead">
								<td class="w50">Serviço</td>
								<td class="w10">#</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
							</tr><!--tHead-->
						<?php
							foreach ($servicos as $key => $value) {
						?>
							<tr class="tBody">
								<td><?php echo $value['servico']; ?></td>
								<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id']; ?>"><i data-feather="edit"></i> Editar</a></td>
								<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id']; ?>"><i data-feather="trash-2"></i> Excluir</a></td>
								<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id'] ?>"><i data-feather="chevron-up"></i></td>
								<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id'] ?>"><i data-feather="chevron-down"></i></a></td>
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
		$totalPaginas = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);

		for($i = 1; $i <= $totalPaginas; $i++){
			if($i == $paginaAtual)
				echo '<a class="btnSelected btn btnPage" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
			else
				echo '<a class="btn btnPage" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
		}

	?>
</div><!--btnPags-->
































