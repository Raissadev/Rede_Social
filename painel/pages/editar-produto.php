<?php
    $id = (int)$_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = ?");
    $sql->execute(array($id));
    if($sql->rowCount() == 0){
    Painel::alert('erro','O produto que você quer editar não existe!');
    die();
    }
    $infoProduto = $sql->fetch();
    
    $pegaImagem = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
    $pegaImagem->execute();
    $pegaImagem = $pegaImagem->fetch()['imagem'];

    $pegaImagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
    $pegaImagens->execute();
    $pegaImagens = $pegaImagens->fetchAll();

    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $largura = $_POST['largura'];
        $altura = $_POST['altura'];
        $comprimento = $_POST['comprimento'];
        $peso = $_POST['peso'];
        $quantidade = $_POST['quantidade'];
        $imagens = [];

        $sucesso = true;
        
        $amountFiles = count($_FILES['imagem']['name']);
        if($_FILES['imagem']['name'][0] != ''){
            //Nosso quer adicionar mais imagens no produto
            for($i = 0; $i < $amountFiles; $i++){
                $imagemAtual = ['type'=>$_FILES['imagem']['type'][$i],
                'size'=>$_FILES['imagem']['size'][$i]];
                if(Painel::imagemValida($imagemAtual) == false){
                    $sucesso = false;
                    Painel::alert('erro','Uma das imagens selecionadas são invalidas');
                    break;
                }
            } 
        }
        if($sucesso){
            if($amountFiles > 0){
            for($i = 0; $i < $amountFiles; $i++){
                $imagemAtual = ['tmp_name'=>$_FILES['imagem']['tmp_name'][$i],
                'name'=>$_FILES['imagem']['name'][$i]];
               $imagens[] = Painel::uploadFile($imagemAtual);
            }
            foreach($imagens as $key => $value){
                MySql::conectar()->exec("INSERT INTO `tb_admin.estoque_imagens` VALUES (null,$id,'$value')");
            }
        } 
    }
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.estoque` SET nome = ?, descricao = ?, altura = ?, largura = ?,
             comprimento = ?, peso = ?, quantidade = ? WHERE id = $id");
            $sql->execute(array($nome,$descricao,$altura,$largura,$comprimento,$peso,$quantidade));
            Painel::alert('sucesso','Você atualizou seu produto com sucesso!');
        
    }
    
    if(isset($_GET['deletar'])){
        $id = (int)$_GET['deletar'];
        $imagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
        $imagens->execute();
        $imagens = $imagens->fetchAll();
        foreach($imagens as $key => $value){
        @unlink(BASE_DIR_PAINEL.'/uploads/'.$value['imagem']);
        }
        MySql::conectar()->exec("DELETE FROM `tb_admin.estoque_imagens` WHERE produto_id = $id");
        MySql::conectar()->exec("DELETE FROM `tb_admin.estoque` WHERE id = $id");
        Painel::alert('sucesso','O produto foi deletado com sucesso');
    }
?>
<section class="myApresentation shopApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage w100">
			<h2>Produto <?php echo $infoProduto['id'] ?></h2>
            <a class="bread breadOne" href="<?php echo INCLUDE_PATH_PAINEL?>vizualizar-produtos">Produtos<a> <a class="bread">/</a> <a class="bread breadTwo">Ver Produto</a>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->
<section class="cardProduct headerCardDefault">
  <div class="wrap">
    <div class="row">
      <div class="boxShop card">
        <div class="boxBody bodyCard text-center">
        <form method="post" enctype="multipart/form-data">
            <?php
                if($pegaImagem == ''){
            ?>
                <img name="imagem" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/error404.png" />
            <?php }else{ ?>
                <img name="imagem" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $pegaImagem; ?>" />
            <?php } ?>
        </div><!--boxBody-->
        <div class="boxFooter">
            <div class="btnsAct active items-flex">
                <input class="deletProduct" type="submit" name="deletar" value="Deletar" />
                <input class="updateProduct" type="submit" name="acao" value="Atualizar" />
            </div><!--actionButtons-->
            <div class="infoProduto">
            <div class="titleProduct">
                    <h2><?php echo $infoProduto['nome']; ?></h2>
                </div><!--titleProduct-->
                <div class="descricao">
                    <h4>Descricao</h4>
                    <textarea name="descricao"><?php echo $infoProduto['descricao']; ?></textarea>
                </div><!--descricao-->
            </div><!--infoProduto-->
        </div><!--boxFooter-->
        <div class="cardFooterInfo">
            <div class="cardInfo">
                <div class="headerCard items-flex">
                    <a class="btn btnTab active cardOpenInfos" id="cardOpenInfos">Especificações</a>
                    <a class="btn btnTab cardOpenFiles" id="cardOpenFiles">Imagens</a>
                    <a class="btn btnTab">Avaliações</a>
                </div><!--headerCard-->
                <div class="bodyCard">
                    <h4>Geral</h4>
                    <div class="especificacoes" id="cardToggleInfos" onClick="openToggle()">
                            <p><span class="nameInfoProduct">Nome:</span> <input type="text" class="resultInfoProduct" placeholder="<?php echo $infoProduto['nome']; ?>" name="nome" /></p>
                            <p><span class="nameInfoProduct">Peso</span> <input type="number" min="0" max="900" step="1" value="<?php echo $infoProduto['peso']; ?>" class="resultInfoProduct" name="peso" /></p>
                            <p><span class="nameInfoProduct">Largura</span> <input type="number" min="0" max="900" step="1" value="<?php echo $infoProduto['largura']; ?>" class="resultInfoProduct" name="largura" /></p>
                            <p><span class="nameInfoProduct">Altura</span> <input type="number"  min="0" max="900" step="1" value="<?php echo $infoProduto['altura']; ?>" class="resultInfoProduct" name="altura" /></p>
                            <p><span class="nameInfoProduct">Comprimento</span> <input type="number"  min="0" max="900" step="1" value="<?php echo $infoProduto['comprimento']; ?>" class="resultInfoProduct" name="comprimento" /></p>
                            <p><span class="nameInfoProduct">Quantidade Atual</span> <input type="number"  min="0" max="900" step="1" value="<?php echo $infoProduto['quantidade']; ?>" class="resultInfoProduct" name="quantidade" /></p>
                            <input type="hidden" name="produto_id" value="<?php echo $value['id']; ?>" />
                            <input type="submit" name="acao" value="Atualizar" />
                        </div><!--especificacoes-->
                        <div class="imagesGrid" id="cardToggleFiles">
                            <div class="gridBtns grid-5x5 gridOneMobile">
                                <div class="fileSend items-flex btnsImgs">
                                    <input multiple type="file" name="imagem[]" />
                                    <input type="submit" name="acao" value="Atualizar" />
                                </div><!--fileSend-->
                                <div class="deletImgs flex btnsImgs">
                                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-produtos?id=<?php echo $id ?>&deletarImagem=<?php echo $infoProduto['imagem']; ?>" class="btn delete"><i data-feather="trash"></i> Deletar Imagens</a>
                                </div><!--deletImgs-->
                            </div><!--gridBtns-->
                            <div class="gridImg items-flex">
                            <?php
                                foreach($pegaImagens as $key => $value){
                            ?>
                            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>" />
                            <?php } ?>
                        </div><!--gridImg-->
                    </div><!--imagesGrid-->
                </div><!--bodyCard-->
            </div><!--cardInfo-->
        </div><!--cardFooterInfo-->
        </form>
      </div><!--boxShop-->
    </div><!--row-->
  </div><!--wrap-->
</section><!--cardProduct-->