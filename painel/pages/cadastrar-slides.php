<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Cadastrar Slide</h2>
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
							$nome = $_POST['nome'];
							$imagem = $_FILES['imagem'];
							if($nome == ''){
								Painel::alert('erro','O campo nome não pode ficar vázio!');
							}else{
								//Podemos cadastrar!
								if(Painel::imagemValida($imagem) == false){
									Painel::alert('erro','O formato especificado não está correto!');
								}else{
									//Apenas cadastrar no banco de dados!
									include('../classes/lib/WideImage.php');
									$imagem = Painel::uploadFile($imagem);
									//WideImage::load('uploads/'.$imagem)->resize(100)->rotate(180)->saveToFile('uploads/'.$imagem);
									$arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
									Painel::insert($arr);
									Painel::alert('sucesso','O cadastro do slide foi realizado com sucesso!');
								}}}
					?>
						<div class="formGroup">
							<label>Nome do slide:</label>
							<input type="text" name="nome">
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