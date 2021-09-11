<?php
//	verificarPermissao(2);
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Cadastrar Clientes</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Adicionar</h2>
				</div><!--headerCard-->
					<?php 
						$site = Painel::select('tb_site.config',false);
					?>
				<div class="bodyCard">
					<form method="post" enctype="multipart/form-data">
						<div class="formGroup">
							<label>Nome:</label>
							<input type="text" name="nome">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>E-mail:</label>
							<input type="text" name="email">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Tipo:</label>
							<select class="w100" name="tipo_cliente">
                                <option value="fisico">Físico</option>
                                <option value="juridico">Juridico</option>
						</select>
						</div><!--formGroup-->
                        <div ref="cpf" class="formGroup">
							<label>CPF:</label>
                            <input type="text" name="cpf" />
						</div><!--formGroup-->
                        <div style="display:none;" ref="cnpj" class="formGroup">
							<label>CNPJ:</label>
                            <input type="text" name="cnpj" />
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Imagem</label>
							<input type="file" name="imagem"/>
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="hidden" name="tipo_acao" value="cadastrar_cliente">
							<input type="submit" name="acao" value="Cadastrar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->
