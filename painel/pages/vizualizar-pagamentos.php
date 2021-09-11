<?php
	if(isset($_GET['email'])){
		//Queremos enviar um email avisando o atraso!
		$parcela_id = (int)$_GET['parcela'];
		$cliente_id = (int)$_GET['email'];
		if(isset($_COOKIE['cliente_'.$cliente_id])){
			Painel::alert('erro','Você já enviou um e-mail cobrando desse cliente! Aguarde mais um pouco');
		}else{
			//Podemos enviar o email
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE id = $parcela_id");
			$sql->execute();
			$infoFinanceiro = $sql->fetch();
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes` WHERE id = $cliente_id");
			$sql->execute();
			$infoCliente = $sql->fetch();
			$corpoEmail = "Olá $infoCliente[nome], você está com um saldo pendente de $infoFinanceiro[valor] com o vencimento para $infoFinanceiro[vencimento]. Entre em contato conosco para quitar sua parcela";
			$email = new Email('localhost','testes@exemplo.com','123456','Raissa');
			$email->addAdress($infoCliente['email'], $infoCliente['nome']);
			$email->formatarEmail(array('assunto'=>'Cobrança','corpo'=>$corpoEmail));
			$email->enviarEmail();
			Painel::alert('sucesso','Email enviado com sucesso');
			setcookie('cliente_'.$cliente_id,'true',time()+(60*60*24*7),'/');
		}
	}
?>
<?php
	if(isset($_GET['pago'])){
		$sql = MySql::conectar()->prepare("UPDATE `tb_admin.financeiro` SET status = 1 WHERE id = ?");
		$sql->execute(array($_GET['pago']));
		Painel::alert('sucesso','O pagamento foi quitado com sucesso');
	}
?>

<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Vizualizar Pagementos</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentForm headerCardDefault formDefault paddingDefault0">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
			<div class="bodyCard">
			<section class="Payments marginDefault">
					<div class="headerCard">
						<h2>Pagamentos Pendentes</h2>
					</div><!--headerCard-->
					<div class="bodyCard">
						<div class="bodyCard">
							<div class="wapperTable">
								<table>
									<tr class="tHead">
										<td class="w20">Nome do pagamento</td>
										<td class="w20">Cliente</td>
										<td>Valor</td>
										<td>Vencimento</td>
										<td>Enviar e-mail</td>
										<td>Marcar como Pago</td>
									</tr><!--tHead-->
								<?php
									$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 0 ORDER BY vencimento ASC");
									$sql->execute();
									$pendentes = $sql->fetchAll();

									foreach ($pendentes as $key => $value) {
									$clienteNome = MySql::conectar()->prepare("SELECT `nome`,`id` FROM `tb_admin.clientes` WHERE id = $value[cliente_id]");
									$clienteNome->execute();
									$info = $clienteNome->fetch();
									$clienteNome = $info['nome'];
									$idCliente = $info['id'];
									$style = "";
									if(strtotime(date('Y-m-d')) >= strtotime($value['vencimento'])){
									$style = 'style="background-color:#f82649;color:#fff;"';
									}
								?>
									<tr <?php echo $style; ?> class="tBody">
										<td><?php echo $value['nome']; ?></td>
										<td><?php echo $clienteNome; ?></td>
										<td><?php echo $value['valor']; ?></td>
										<td><?php echo date('d/m/Y',strtotime($value['vencimento'])); ?></td>
										<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos?email=<?php echo $info['id']; ?>&parcela=<?php echo $value['id']; ?>"><i data-feather="mail"></i> E-mail</a></td>
										<td><a class="btn pago" href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos?pago=<?php echo $value['id']; ?>"><i data-feather="check-circle"></i> Pago</a></td>
									</tr><!--tBody-->
								<?php  } ?>
								</table>
							</div><!--wapperTable-->
						</div><!--bodyCard-->
					</div><!--boxCard-->
					<div class="gerarPDF items-flex">
						<a class="btn" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamento=concluidos" target="_blank">Gerar PDF</a><!--btn-->
					</div><!--gerarPDF-->
				</section><!--Payments-->

				<section class="Payments">
					<div class="headerCard">
						<h2>Pagamentos Concluidos</h2>
					</div><!--headerCard-->
					<div class="bodyCard">
						<div class="bodyCard">
							<div class="wapperTable">
								<table>
									<tr class="tHead">
										<td class="w20">Nome do pagamento</td>
										<td class="w20">Cliente</td>
										<td>Valor</td>
										<td>Vencimento</td>
										<td>Enviar e-mail</td>
										<td>Marcar como Pago</td>
									</tr><!--tHead-->
								<?php
									$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 1 ORDER BY vencimento ASC");
									$sql->execute();
									$pendentes = $sql->fetchAll();

									foreach ($pendentes as $key => $value) {
									$clienteNome = MySql::conectar()->prepare("SELECT `nome` FROM `tb_admin.clientes` WHERE id = $value[cliente_id]");
									$clienteNome->execute();
									$clienteNome = $clienteNome->fetch()['nome'];
									$style = "";
									if(strtotime(date('Y-m-d')) >= strtotime($value['vencimento'])){
									$style = 'style="background-color:#f82649;color:#fff;"';
									}
								?>
									<tr class="tBody">
										<td><?php echo $value['nome']; ?></td>
										<td><?php echo $clienteNome; ?></td>
										<td><?php echo $value['valor']; ?></td>
										<td><?php echo date('d/m/Y',strtotime($value['vencimento'])); ?></td>
										<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos?email=<?php echo $info['id']; ?>&parcela=<?php echo $value['id']; ?>"><i data-feather="mail"></i> E-mail</a></td>
										<td><a class="btn pago" href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos?pago=<?php echo $value['id']; ?>"><i data-feather="check-circle"></i> Pago</a></td>
									</tr><!--tBody-->
								<?php  } ?>
								</table>
							</div><!--wapperTable-->
						</div><!--bodyCard-->
					</div><!--boxCard-->
					<div class="gerarPDF items-flex">
						<a class="btn" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?pagamento=pendentes" target="_blank">Gerar PDF</a><!--btn-->
					</div><!--gerarPDF-->
				</section><!--Payments-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->

