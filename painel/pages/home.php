<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();

	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));

	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();

?>

<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Painel de Controle </h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="metricsContent marginDefault">
	<div class="wrapper">
		<div class="row grid-four gridOneMobile">
			<div class="cardMetric card items-flex">
				<div class="col w60">
					<h6>Total de Visitas</h6>
					<h3><?php echo $pegarVisitasTotais; ?></h3>
					<p class="result"><span><i data-feather="chevron-up"></i> 3%</span> Last <br />mont</p>
				</div><!--col-->
				<div class="col items-flex w40">
					<span class="counterIcon"><i data-feather="trending-up"></i></span>
				</div><!--col-->
			</div><!--cardMetric-->
			<div class="cardMetric card items-flex">
				<div class="col w60">
					<h6>Visitas Hoje</h6>
					<h3><?php echo $pegarVisitasHoje; ?></h3>
					<p class="result"><span class="percent"><i data-feather="chevron-up"></i> 3%</span> Last <br />mont</p>
				</div><!--col-->
				<div class="col items-flex w40">
					<span class="counterIcon gradientIconOrange"><i data-feather="pie-chart"></i></span>
				</div><!--col-->
			</div><!--cardMetric-->
			<div class="cardMetric card items-flex">
				<div class="col w60">
					<h6>Usuários Online</h6>
					<h3><?php echo count($usuariosOnline); ?></h3>
					<p class="result"><span><i data-feather="chevron-up"></i> 3%</span> Last <br />mont</p>
				</div><!--col-->
				<div class="col items-flex w40">
					<span class="counterIcon gradientIconPink"><i data-feather="rss"></i></span>
				</div><!--col-->
			</div><!--cardMetric-->
			<div class="cardMetric card items-flex">
				<div class="col w60">
					<h6>Total sales</h6>
					<h3>34,516</h3>
					<p class="result"><span><i data-feather="chevron-up"></i> 3%</span> Last <br />mont</p>
				</div><!--col-->
				<div class="col items-flex w40">
					<span class="counterIcon gradientIconBlue"><i data-feather="zap"></i></span>
				</div><!--col-->
			</div><!--cardMetric-->
		</div><!--row-->
	</div><!--wrapper-->
</section><!--metricsContent-->

<section class="diceContent marginDefault headerCardDefault">
	<div class="wrap grid-7x3 gridOneMobile">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2 class="titleCard">Total de Visitas</h2>
				</div><!--headerCard-->
				<div class="bodyCard items-flex">
					<div id="regions_div" style="width: 100%; height: 58vh;"></div>
				</div><!--bodyCard-->
			</div><!--cardBox-->
		</div><!--row-->
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2 class="titleCard">Total de Visitas</h2>
				</div><!--headerCard-->
				<div class="bodyCard items-flex">
					<div id="donut_single" style="width: 100%; height: 58vh;"></div>
				</div><!--bodyCard-->
			</div><!--cardBox-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--diceContent-->

<section class="timeContent marginDefault headerCardDefault">
	<div class="wrap">
		<div class="row">
			<?php
				$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
				$usuariosPainel->execute();
				$usuariosPainel = $usuariosPainel->fetchAll();
				foreach ($usuariosPainel as $key => $value) {

			?>
			<div class="cardBox card">
				<div class="headerCard">
					<h2 class="titleCard">Time Online</h2>
				</div><!--headerCard-->
				<div class="bodyCard items-flex">
					<div class="iconTime w10 items-flex w20Mobile">
						<span class="counterIcon"><i class="iconUser" data-feather="user"></i></span>
					</div><!--iconTime-->
					<div class="nameTime w85 items-flex">
						<h4><?php echo $value['user'] ?></h4>
					</div><!--nameTime-->
					<div class="ipTime w15 items-flex">
						<span><?php echo pegaCargo($value['cargo']); ?></span>
					</div>
				</div><!--bodyCard-->
			</div><!--cardBox-->
			<?php } ?>
		</div><!--row-->
	</div><!--wrap-->
</section><!--diceContent-->




<?php
	include('./js/charts.php');
?>
