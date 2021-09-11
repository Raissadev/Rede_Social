<?php
	if(isset($_POST['acao'])){
		$nome = $_POST['nome'];
		$tipo = $_POST['tipo'];
		$preco = $_POST['preco'];
		$imagem = $_FILES['imagem'];

		if($_FILES['imagem']['name'] == ''){
			Painel::alert('erro','Não foi possível realizar o cadastro, verifique os campos!');
		}else{
			if(Painel::imagemValida($imagem)){
				Painel::alert('erro','Ops! Imagem inválida.');
			}else{
				$idImagem = Painel::uploadFile($imagem);
				$slug = Painel::generateSlug($nome);
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.empreendimentos` VALUES (null,?,?,?,?,?,?)");
				$sql->execute(array($nome,$tipo,$preco,$idImagem,$slug,0));
				$lastId = MySql::conectar()->lastInsertId();
				MySql::conectar()->exec("UPDATE `tb_admin.empreendimentos` SET order_id = $lastId WHERE id = $lastId");
		Painel::alert('sucesso','O cadastro do empreendimento foi realizado com sucesso!');
	}
	}
}
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Cadastrar Empreendimento</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="addProduct contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Cadastrar Imóvel</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
					<form method="post" enctype="multipart/form-data">
						<div class="formGroup">
							<label>Nome</label>
							<input type="text" name="nome" />
						</div><!--formGroup-->
                        <div class="formGroup">
							<label>Tipo</label>
							<select name="tipo" class="w100">
                                <option value="residencial">Residencial</option>
                                <option value="comercial">Comercial</option>
                            </select>
						</div><!--formGroup-->
                        <div class="formGroup">
							<label>Preço:</label>
                            <input type="text" name="preco" />
                        </div><!--formGroup-->
                        <div class="formGroup">
							<label>Imagem</label>
                            <input type="file" name="imagem" />
                        </div><!--formGroup-->
                        <div class="formGroup">
							<input type="submit" name="acao" value="Cadastrar Imóvel!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->