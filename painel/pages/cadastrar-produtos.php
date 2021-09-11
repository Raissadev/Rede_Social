<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Cadastrar Produtos</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="addProduct contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Cadastrar Produto</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
                    <?php
                        if(isset($_POST['acao'])){
                            $nome = $_POST['nome'];
                            $descricao = $_POST['descricao'];
                            $largura = $_POST['largura'];
                            $altura = $_POST['altura'];
                            $peso = $_POST['peso'];
                            $comprimento = $_POST['comprimento'];
                            $quantidade = $_POST['quantidade'];

                            $imagens = array();
                            $amountFiles = count($_FILES['imagem']['name']);

                            $sucesso = true;

                            if($_FILES['imagem']['name'][0] != ''){

                            for($i = 0; $i < $amountFiles; $i++){
                                $imagemAtual = ['type'=>$_FILES['imagem']['type'][$i],
                                'size'=>$_FILES['imagem']['size'][$i]];
                                if(Painel::imagemValida($imagemAtual) == false){
                                    $sucesso = false;
                                    Painel::alert('erro','Uma das imagens selecionadas são invalidas');
                                    break;
                                }
                            }
                        }else{
                            $sucesso = false;
                            Painel::alert('erro','Você precisa selecionar pelo menos uma imagem');
                        }
                            if($sucesso){
                            //TODO: Cadastrar informações e imagens e realizar upload;
                            for($i = 0; $i < $amountFiles; $i++){
                                $imagemAtual = ['tmp_name'=>$_FILES['imagem']['tmp_name'][$i],
                                'name'=>$_FILES['imagem']['name'][$i]];
                               $imagens[] = Painel::uploadFile($imagemAtual);
                            }
                            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.estoque` VALUE (null,?,?,?,?,?,?,?)");
                            $sql->execute(array($nome,$descricao,$largura,$altura,$comprimento,$peso,$quantidade));
                            $lastId = MySql::conectar()->lastInsertId();
                            foreach($imagens as $key => $value){
                                MySql::conectar()->exec("INSERT INTO `tb_admin.estoque_imagens` VALUES (null,$lastId,'$value')");
                            }

                            Painel::alert('sucesso','O produto foi cadastrado com sucesso!');
                        }

                    }
                    ?>
					<form method="post" enctype="multipart/form-data">
						<div class="formGroup">
							<label>Nome do Produto</label>
							<input type="text" name="nome" />
						</div><!--formGroup-->
                        <div class="formGroup">
							<label>Descricao do Produto</label>
							<textarea name="descricao"></textarea>
						</div><!--formGroup-->
                        <div class="formRow w49 w100Mobile">
                            <div class="formGroup items-flex w100">
                                <label class="w70">Largura do produto</label>
                                <input type="number" name="largura" min="0" max="900" step="5" value="0" />
                            </div><!--formGroup-->
                            <div class="formGroup items-flex w100">
                                <label class="w70">Altura do Produto</label>
                                <input type="number" name="altura" min="0" max="900" step="5" value="0" />
                            </div><!--formGroup-->
                            <div class="formGroup items-flex w100">
                                <label class="w70">Peso do Produto</label>
                                <input type="number" name="peso" min="0" max="900" step="5" value="0" />
                            </div><!--formGroup-->
                        </div><!--formRow-->
                        <div class="formRow w49 w100Mobile">
                            <div class="formGroup items-flex w100">
                                <label class="w70">Comprimento do Produto</label>
                                <input type="number" name="comprimento" min="0" max="900" step="5" value="0" />
                            </div><!--formGroup-->
                            <div class="formGroup items-flex w100">
                                <label class="w70">Quantidade do Produto</label>
                                <input type="number" name="quantidade" min="0" max="900" step="5" value="0" />
                            </div><!--formGroup-->
                        </div><!--formRow-->
                        <div class="formGroup">
							<label>Selecione as imagens</label>
                            <input type="file" name="imagem[]" multiple />
                        </div><!--formGroup-->
                        <div class="formGroup">
							<input type="submit" name="acao" value="Cadastrar Produto!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->