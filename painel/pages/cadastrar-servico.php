<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Adicionar Serviço</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Cadastrar depoimento</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
				<form method="post" enctype="multipart/form-data">
					<?php
						if(isset($_POST['acao'])){
							if(Painel::insert($_POST)){
								Painel::alert('sucesso','O cadastro do serviço foi realizado com sucesso!');
							}else{
								Painel::alert('erro','Campos vázios não são permitidos!');
						}}
					?>
						<div class="formGroup">
							<label>Descreva o serviço:</label>
							<textarea name="servico"></textarea>
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="hidden" name="order_id" value="0">
							<input type="hidden" name="nome_tabela" value="tb_site.servicos" />
							<input type="submit" name="acao" value="Cadastrar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->


