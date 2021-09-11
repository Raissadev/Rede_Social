<?php
    $id = (int)$_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` WHERE id = ?");
    $sql->execute(array($id));
    if($sql->rowCount() == 0){
    Painel::alert('erro','O produto que você quer editar não existe!');
    die();
    }
    $infoImovel = $sql->fetch();
  
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $preco = $_POST['preco'];
        $imagem = $_FILES['imagem'];

        $sucesso = true;

        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.empreendimentos` SET nome = ?, tipo = ?, preco = ?, imagem = ? WHERE id = $id");
        $sql->execute(array($nome,$tipo,$preco,$imagem));
        Painel::alert('sucesso','Você atualizou seu empreendimento com sucesso!');
        
    }
    
    if(isset($_GET['deletar'])){
        $id = (int)$_GET['deletar'];
        $imagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` WHERE imovel_id = $value[id]");
        $imagens->execute();
        $imagens = $imagens->fetchAll();
        @unlink(BASE_DIR_PAINEL.'/uploads/'.$value['imagem']);
        
        MySql::conectar()->exec("DELETE FROM `tb_admin.empreendimentos` WHERE id = $id");
        Painel::alert('sucesso','O Imóvel foi deletado com sucesso');
    }
?>
<section class="myApresentation shopApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage w100">
			<h2>Imóvel <?php echo $infoImovel['id'] ?></h2>
            <a class="bread breadOne" href="<?php echo INCLUDE_PATH_PAINEL?>listar-empreendimentos">Listar empreendimentos<a> <a class="bread">/</a> <a class="bread breadTwo">Ver Imóvel</a>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->
<section class="cardProduct headerCardDefault">
  <div class="wrap">
    <div class="row">
      <div class="boxShop card">
        <div class="boxBody bodyCard text-center">
        <form method="post" enctype="multipart/form-data">
            <img name="imagem" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $infoImovel['imagem']; ?>" />
        </div><!--boxBody-->
        <div class="boxFooter">
            <div class="btnsAct active items-flex">
                <input class="deletProduct" type="submit" name="deletar" value="Deletar" />
                <input class="updateProduct" type="submit" name="acao" value="Atualizar" />
            </div><!--actionButtons-->
            <div class="infoProduto">
            <div class="titleProduct">
                    <h2><?php echo $infoImovel['nome']; ?></h2>
                </div><!--titleProduct-->
            </div><!--infoProduto-->
        </div><!--boxFooter-->
        <div class="cardFooterInfo">
            <div class="cardInfo">
                <div class="headerCard items-flex">
                    <a class="btn btnTab active cardOpenInfos" id="cardOpenInfos">Especificações</a>
                    <a class="btn btnTab cardOpenFiles" id="cardOpenFiles">Imagem</a>
                    <a class="btn btnTab" href="<?php echo INCLUDE_PATH_PAINEL?>vizualizar-empreendimento?id=<?php echo $infoImovel['id']?>">Ver empreendimentos</a>
                </div><!--headerCard-->
                <div class="bodyCard">
                    <h4>Geral</h4>
                    <div class="especificacoes cardToggleInfos" id="cardToggleInfos">
                            <p><span class="nameInfoProduct">Nome:</span> <input type="text" class="resultInfoProduct" placeholder="<?php echo $infoImovel['nome']; ?>" name="nome" /></p>
                            <p><span class="nameInfoProduct">Tipo</span>
                            <select name="tipo" class="w20 w50Mobile">
                                <option value="residencial">Residencial</option>
                                <option value="comercial">Comercial</option>
                            </select></p>
                            <p><span class="nameInfoProduct">Preço</span> <input type="text" placeholder="R$<?php echo $infoImovel['preco']; ?>" class="resultInfoProduct" name="preco" /></p>
                            <input type="submit" name="acao" value="Atualizar" />
                        </div><!--especificacoes-->
                        <div class="imagesGrid cardToggleFiles" id="cardToggleFiles">
                            <div class="gridBtns grid-5x5 gridOneMobile">
                                <div class="fileSend items-flex btnsImgs">
                                    <input type="file" name="imagem" />
                                    <input type="submit" name="acao" value="Atualizar" />
                                </div><!--fileSend-->
                                <div class="deletImgs flex btnsImgs">
                                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-produtos?id=<?php echo $id ?>&deletarImagem=<?php echo $infoImovel['imagem']; ?>" class="btn delete"><i data-feather="trash"></i> Deletar Imagem</a>
                                </div><!--deletImgs-->
                            </div><!--gridBtns-->
                            <div class="gridImg items-flex">
                            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $infoImovel['imagem'] ?>" />
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

