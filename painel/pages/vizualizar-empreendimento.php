<?php
    if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` WHERE id = ?");
    $sql->execute(array($id));
    if($sql->rowCount() == 0){
    Painel::alert('erro','O imóvel que você quer editar não existe!');
    die();
    }
    $infoImovel = $sql->fetch();
}else{
    header('Location:'.INCLUDE_PATH_PAINEL.'/listar-empreendimentos');
    die();
}
  
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $preco = Painel::formatarMoedaBd($_POST['preco']);
        $area = $_POST['area'];
        $imagem = $_FILES['imagens'];

        $sucesso = true;
    }
    if(isset($_POST['acao'])){
        $empreendId = $id;
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $area = $_POST['area'];


        $imagens = array();
        $amountFiles = count($_FILES['imagens']['name']);

        $sucesso = true;

        if($_FILES['imagens']['name'][0] != ''){

        for($i = 0; $i < $amountFiles; $i++){
            $imagemAtual = ['type'=>$_FILES['imagens']['type'][$i],
            'size'=>$_FILES['imagens']['size'][$i]];
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
            $imagemAtual = ['tmp_name'=>$_FILES['imagens']['tmp_name'][$i],
            'name'=>$_FILES['imagens']['name'][$i]];
        $imagens[] = Painel::uploadFile($imagemAtual);
        }
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.imoveis` VALUE (null,?,?,?,?)");
        $sql->execute(array($empreendId,$nome,$preco,$area));
        $lastId = MySql::conectar()->lastInsertId();
        foreach($imagens as $key => $value){
            MySql::conectar()->exec("INSERT INTO `tb_admin.imagens_imoveis` VALUES (null,$lastId,'$value')");
        }

        Painel::alert('sucesso','O Imóvel foi cadastrado com sucesso!');
    }

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
            <div id="slider" class="sliderBox">
                <img name="imagem" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $infoImovel['imagem']; ?>" />
                <img name="imagem" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/myWallpaper.jpg" />
            </div><!--sliderBox-->
            <span id="proximo" class="previous"><i class="iconUser" data-feather="chevron-right"></i></span>
            <span id="anterior" class="next"><i class="iconUser" data-feather="chevron-left"></i></span>
        </div><!--boxBody-->
        <div class="boxFooter">
            <div class="infoProduto">
            <div class="titleProduct">
                    <h2><?php echo $infoImovel['nome']; ?></h2>
                </div><!--titleProduct-->
            </div><!--infoProduto-->
        </div><!--boxFooter-->
                <div class="cardFooterInfo">
                    <div class="cardInfo">
                        <div class="headerCard items-flex">
                            <a class="btn btnTab cardOpenFiles" id="cardOpenEmpreeds">Empreendimentos</a>
                            <a class="btn btnTab active cardOpenInfos" id="cardOpenInfos">Especificações</a>
                            <a class="btn btnTab cardOpenCadastro" id="cardOpenCadastro">Cadastrar Imóvel</a>
                        </div><!--headerCard-->
                        <div class="bodyCard">
                            <h4>Geral</h4>
                            <div class="especificacoes cardToggleInfos" id="cardToggleInfos">
                                    <p><span class="nameInfoProduct">Nome:</span> <span><?php echo $infoImovel['nome']; ?></span></p>
                                    <p><span class="nameInfoProduct">Preço:</span> <span><?php echo $infoImovel['preco']; ?></span></p>
                                    <p><span class="nameInfoProduct">Área:</span> <span><?php echo $infoImovel['nome']; ?></span></p>
                                </div><!--especificacoes-->
                                <div class="imagesGrid cardToggleFiles" id="cardToggleFiles">
                                    <div class="wapperTable">
                                        <table>
                                            <tr class="tHead">
                                                <td class="w50">Nome</td>
                                                <td class="w10">Preço</td>
                                                <td>Área</td>
                                                <td>#</td>
                                            </tr><!--tHead-->
                                            <?php
                                                $pegaImoveis = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imoveis` WHERE empreend_id = $id");
                                                $pegaImoveis->execute();
                                                $pegaImoveis = $pegaImoveis->fetchAll();
                                                foreach($pegaImoveis as $key => $value){

                                                $value['preco'] = Painel::convertMoney($value['preco']);
                                            ?>
                                            <tr class="tBody">
                                                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>vizualizar-empreendimento?id=<?php echo $id ?>"><?php echo $value['nome']; ?></a></td>
                                                <td>R$<?php echo $value['preco']; ?></td>
                                                <td><?php echo $value['area']; ?></td>
                                                <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-empreendimento?id=<?php echo $id; ?>" class="btn"><i data-feather="eye"></i> Editar Empreendimento</a></td>
                                            </tr><!--tBody-->
                                            <?php } ?>
                                        </table>
                                    </div><!--wapperTable-->
                            </div><!--imagesGrid-->
                                <div class="especificacoes cardToggleCadastro" id="cardToggleCadastro">
                                    <form method="post" enctype="multipart/form-data" class="grid-5x5">
                                    <div class="row">
                                        <p><span class="nameInfoProduct">Nome:</span> <input type="text" class="resultInfoProduct" placeholder="Nome do Imóvel" name="nome" /></p>
                                        <p><span class="nameInfoProduct">Preço</span> <input type="text" placeholder="Preço do Imóvel" class="resultInfoProduct" name="preco" /></p>
                                        <p><span class="nameInfoProduct">Área</span> <input type="number"  min="0" max="900" step="1" value="" class="resultInfoProduct" name="area" /></p>
                                        <input type="submit" name="acao" value="Cadastrar" />
                                    </div><!--row-->
                                    <div class="row">
                                        <input type="file" name="imagens" class="fileInput" />
                                    </div><!--row-->
                                </form>
                            </div><!--especificacoes-->
                        </div><!--bodyCard-->
                    </div><!--cardInfo-->
            </div><!--cardFooterInfo-->
        </form>
      </div><!--boxShop-->
    </div><!--row-->
  </div><!--wrap-->
</section><!--cardProduct-->

