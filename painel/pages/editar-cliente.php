<?php

if(isset($_GET['id'])){
	$id = (int)$_GET['id'];
	$cliente = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes` WHERE id = ?");
	$cliente->execute(array($id));
	$cliente = $cliente->fetchAll();
	foreach($cliente as $value);
}else{
	Painel::alert('erro','Você precisa passar o parametro ID.');
	die();
}
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Editar Cliente</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Editar Usuário</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
					<form method="post" enctype="multipart/form-data">
						<div class="formGroup">
							<label>Nome:</label>
							<input type="text" name="nome" value="<?php echo $value['nome']; ?>" />
						</div><!--formGroup-->
						<div class="formGroup">
							<label>E-mail:</label>
							<input type="text" name="email" value="<?php echo $value['email']?>" />
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Tipo:</label>
							<select class="w100" name="tipo_cliente">
                                <option <?php if($value['tipo'] == 'fisico') echo 'selected' ?> value="fisico">Físico</option>
                                <option <?php if($value['tipo'] == 'juridico') echo 'selected' ?> value="juridico">Juridico</option>
						</select>
						</div><!--formGroup-->
                        <?php
                            if($value['tipo'] == 'fisco'){
                        ?>
                        <div ref="cpf" class="formGroup">
							<label>CPF:</label>
                            <input type="text" name="cpf" value="<?php echo $value['cpf_cnpj']?>" />
						</div><!--formGroup-->
                        <div style="display:none;" ref="cnpj" class="formGroup">
							<label>CNPJ:</label>
                            <input type="text" name="cnpj" />
						</div><!--formGroup-->
                        <?php }else{ ?>
                        <div style="display:none" ref="cpf" class="formGroup">
							<label>CPF:</label>
                            <input type="text" name="cpf" value="<?php echo $value['cpf_cnpj']?>" />
						</div><!--formGroup-->
                        <div style="display:block;" ref="cnpj" class="formGroup">
							<label>CNPJ:</label>
                            <input type="text" name="cnpj" />
						</div><!--formGroup-->
                        <?php } ?>
                        <div class="formGroup">
							<input type="hidden" name="imagem_original" value="<?php echo $value['imagem']; ?>"  />
						</div><!--formGroup-->
                        <div class="formGroup">
							<input type="hidden" name="id" value="<?php echo $value['id']; ?>"  />
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="hidden" name="tipo_acao" value="atualizar_cliente" />
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="submit" name="acao" value="Atualizar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
				<section class="addPayment">
					<div class="headerCard">
						<h2>Adiocionar Pagamentos</h2>
					</div><!--headerCard-->
					<div class="bodyCard">
						<form method="post">
							<?php
								if(isset($_POST['acao'])){
								$cliente_id = $id;
								$nome = $_POST['nome_pagto'];
								//$valor = str_replace('.','',$_POST['valor']);
								//$valor = str_replace(',','.',$valor);
								$valor = $_POST['valor'];
								$intervalo = $_POST['intervalo'];
								$vencimento = $_POST['vencimento'];
								$numero_parcelas = $_POST['parcelas'];
								$status = 0;
								$vencimentoOriginal = $_POST['vencimento'];
								if(strtotime($vencimentoOriginal) < time()){
									Painel::alert('erro','Você selecionou uma data negativa.');
									}else{
									
									}
									
									for($i = 0; $i < $numero_parcelas; $i++){
									$vencimento = strtotime($vencimentoOriginal) + (($i * $intervalo) *(60*60*24));
									$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.financeiro` VALUES (null,?,?,?,?,?)");
									$sql->execute(array($cliente_id,$nome,$valor,date('Y-m-d',$vencimento),0));
									}
								}
								if(isset($_GET['pago'])){
									$sql = MySql::conectar()->prepare("UPDATE `tb_admin.financeiro` SET status = 1 WHERE id = ?");
									$sql->execute(array($_GET['pago']));
									Painel::alert('sucesso','O pagamento foi quitado com sucesso');
									}
						?>
							<div class="formGroup">
								<label>Nome do pagamento:</label>
								<input type="text" name="nome_pagto" />
							</div><!--formGroup-->
							<div class="formGroup">
								<label>Valor do pagamento:</label>
								<input type="text" name="valor" />
							</div><!--formGroup-->
							<div class="formGroup">
								<label>Número de parcelas</label>
								<input type="text" name="parcelas" />
							</div><!--formGroup-->
							<div class="formGroup">
								<label>Intervalo</label>
								<input type="text" name="intervalo" />
							</div><!--formGroup-->
							<div class="formGroup">
								<label>Vencimento:</label>
								<input type="date" name="vencimento" />
							</div><!--formGroup-->
							<div class="formGroup">
								<input type="submit" name="acao" value="Inserir Pagemento">
							</div><!--formGroup-->
						</form>
					</div><!--bodyCard-->
				</section><!--addPayment-->
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
									$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 0 AND cliente_id = $id ORDER BY vencimento ASC");
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
										<td><a class="btn pago" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $id; ?>&pago=<?php echo $value['id']; ?>"><i data-feather="check-circle"></i> Pago</a></td>
									</tr><!--tBody-->
								<?php  } ?>
								</table>
							</div><!--wapperTable-->
						</div><!--bodyCard-->
					</div><!--boxCard-->
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
									$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.financeiro` WHERE status = 1 AND cliente_id = $id ORDER BY vencimento ASC LIMIT 10");
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
										<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>"><i data-feather="mail"></i> E-mail</a></td>
										<td><a class="btn pago" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $id; ?>&pago=<?php echo $value['id']; ?>"><i data-feather="check-circle"></i> Pago</a></td>
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

