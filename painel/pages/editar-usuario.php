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
				<div class="bodyCard">
					<form method="post" enctype="multipart/form-data">
						<?php
							if(isset($_POST['acao'])){
								//Enviei o meu formulário.
								$nome = $_POST['nome'];
								$senha = $_POST['password'];
								$imagem = $_FILES['imagem'];
								$imagem_atual = $_POST['imagem_atual'];
								$usuario = new Usuario();
								if($imagem['name'] != ''){
									//Existe o upload de imagem.
									if(Painel::imagemValida($imagem)){
										Painel::deleteFile($imagem_atual);
										$imagem = Painel::uploadFile($imagem);
										if($usuario->atualizarUsuario($nome,$senha,$imagem)){
											$_SESSION['img'] = $imagem;
											Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
										}else{
											Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
										}
									}else{
										Painel::alert('erro','O formato da imagem não é válido');
									}
								}else{
									$imagem = $imagem_atual;
									if($usuario->atualizarUsuario($nome,$senha,$imagem)){
										Painel::alert('sucesso','Atualizado com sucesso!');
									}else{
										Painel::alert('erro','Ocorreu um erro ao atualizar...');
									}
								}

							}
						?>
						<div class="formGroup">
							<label>Nome:</label>
							<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Senha:</label>
							<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Imagem</label>
							<input type="file" name="imagem"/>
							<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="submit" name="acao" value="Atualizar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->
