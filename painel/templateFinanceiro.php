<?php
    include('../incluedeConstantes.php');
    $sql = MySql::conectar();
?>
<?php
	if(isset($_GET['pago'])){
		$sql = MySql::conectar()->prepare("UPDATE `tb_admin.financeiro` SET status = 1 WHERE id = ?");
		$sql->execute(array($_GET['pago']));
		Painel::alert('sucesso','O pagamento foi quitado com sucesso');
	}
?>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: "Mulish", sans-serif;
    }
    .headerCard{
        background:#333;
        padding: 1rem;
    }
    section.contentForm{
        width:900px;
        margin:0 auto;
    }
    table{
        width:900px;
        margin-top:0.5rem;
    }
    table td{
        border:1px solid #ccc;
        border-collapse:collapse;
        padding:0.5rem;
        font-weight:bold;
    }
</style>

<?php
    $nome = (isset($_GET['pagamento']) && $_GET['pagamento'] == 'concluidos') ? 'Concluidos' : 'Pendentes';
?>

<section class="contentForm headerCardDefault formDefault paddingDefault0">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
			<div class="bodyCard">
			    <section class="Payments marginDefault">
					<div class="headerCard">
						<h2>Pagamentos <?php echo $nome ?></h2>
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
                                    if($nome == 'Pendentes')
                                        $nome = 0;
                                    else
                                        $nome = 1;
									$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = $nome ORDER BY vencimento ASC");
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
									<tr <?php echo $style; ?> class="tBody">
										<td><?php echo $value['nome']; ?></td>
										<td><?php echo $clienteNome; ?></td>
										<td><?php echo $value['valor']; ?></td>
										<td><?php echo date('d/m/Y',strtotime($value['vencimento'])); ?></td>
										<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>"><i data-feather="mail"></i> E-mail</a></td>
										<td><a class="btn pago" href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-pagamentos?pago=<?php echo $value['id']; ?>"><i data-feather="check-circle"></i> Pago</a></td>
									</tr><!--tBody-->
								<?php  } ?>
								</table>
							</div><!--wapperTable-->
						</div><!--bodyCard-->
					</div><!--boxCard-->
				</section><!--Payments-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->

