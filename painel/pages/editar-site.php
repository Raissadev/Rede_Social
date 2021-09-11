<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Adicionar Depoimentos</h2>
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
					<?php 
						$site = Painel::select('tb_site.config',false);
					?>
				<div class="bodyCard">
					<form method="post" enctype="multipart/form-data">
						<?php 
							if(isset($_POST['acao'])){
								if(Painel::update($_POST,true)){
									Painel::alert('sucesso','O site foi editado com sucesso!');
									$site = Painel::select('tb_site.config',false);
								}else{
									Painel::alert('erro','Campos vázios não são permitidos.');
								}
							}
						?>
						<div class="formGroup">
							<label>Título do site:</label>
							<input type="text" name="titulo" value="<?php echo $site['titulo'] ?>" />
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Nome do autor do site:</label>
							<input type="text" name="nome_autor" value="<?php echo $site['nome_autor'] ?>" />
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Descrição do autor do site:</label>
							<textarea name="descricao"><?php echo $site['descricao']; ?></textarea>
						</div><!--formGroup-->
							<?php
								for($i = 1; $i <= 3; $i++){
							?>
						<div class="formGroup">
							<label>Ícone <?php echo $i; ?>:</label>
							<input type="text" name="icone<?php echo $i; ?>" value="<?php echo $site['icone'.$i] ?>" />						
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Descrição do ícone <?php echo $i; ?>:</label>
							<textarea name="descricao<?php echo $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>
						</div><!--formGroup-->
							<?php } ?>
						<div class="formGroup">
							<input type="hidden" name="nome_tabela" value="tb_site.config" />
							<input type="submit" name="acao" value="Atualizar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->


