<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Adicionar Usuário</h2>
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
						<?php
							if(isset($_POST['acao'])){
								$login = $_POST['login'];
								$nome = $_POST['nome'];
								$senha = $_POST['password'];
								$imagem = $_FILES['imagem'];
								$cargo = $_POST['cargo'];

								if($login == ''){
									Painel::alert('erro','O login está vázio!');
								}else if($nome == ''){
									Painel::alert('erro','O nome está vázio!');
								}else if($senha == ''){
									Painel::alert('erro','A senha está vázia!');
								}else if($cargo == ''){
									Painel::alert('erro','O cargo precisa estar selecionado!');
								}else if($imagem['name'] == ''){
									Painel::alert('erro','A imagem precisa estar selecionada!');
								}else{
									//Podemos cadastrar!
									if($cargo >= $_SESSION['cargo']){
										Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
									}else if(Painel::imagemValida($imagem) == false){
										Painel::alert('erro','O formato especificado não está correto!');
									}else if(Usuario::userExists($login)){
										Painel::alert('erro','O login já existe, selecione outro por favor!');
									}else{
										//Apenas cadastrar no banco de dados!
										$usuario = new Usuario();
										$imagem = Painel::uploadFile($imagem);
										$usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
										Painel::alert('sucesso','O cadastro do usuário '.$login.' foi feito com sucesso!');
									}
								}}
							?>
						<div class="formGroup">
							<label>Login:</label>
							<input type="text" name="login">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Nome:</label>
							<input type="text" name="nome">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Senha:</label>
							<input type="password" name="password">
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Cargo:</label>
							<select class="w100" name="cargo">
								<?php
									foreach (Painel::$cargos as $key => $value) {
									if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
									}
								?>
						</select>
						</div><!--formGroup-->
						<div class="formGroup">
							<label>Imagem</label>
							<input type="file" name="imagem"/>
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="submit" name="acao" value="Cadastrar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->
