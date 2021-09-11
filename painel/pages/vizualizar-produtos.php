<?php
  if(isset($_GET['pendentes']) == false){
?>
<section class="myApresentation shopApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage grid-4x6 w100">
			<h2>Vizualizar Produtos</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<?php
  $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE quantidade = 0");
  $sql->execute();
  if($sql->rowCount() > 0){
  Painel::alert('atencao','Você está com produtos em falta! <a href="'.INCLUDE_PATH_PAINEL.'vizualizar-produtos?pendentes">Clique aqui para visualiza-los!</a>');
  }
?>

<section class="contentShop headerCardDefault">
  <div class="wrap">
      <div class="searchContent">
        <form method="post" class="items-flex w100 formSearchShop card">
			    <input class="w100 shopSearch" type="search" placeholder="Procure um Produto..." name="busca" />
          <input type="submit" name="acao" value="Buscar" />
		    </form>
      </div><!--searchContent-->
    <div class="row grid-three gridTwoMobile">
    <?php
          $query = "";
          if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
            $nome = $_POST['busca'];
            $query = "WHERE nome LIKE '$nome%'";
          }

        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` $query");
        $sql->execute();
        $produtos = $sql->fetchAll();
        if($query != ''){
          echo '<div class="box-alert sucesso boxResult" id="boxResult"><p>Foram encontrados '.count($produtos).' resultado(s)</p></div>';
        }
        foreach ($produtos as $key => $value){
          if($value['quantidade'] == '0')
          continue;
        $imagemSingle = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id] LIMIT 1");
        $imagemSingle->execute();
        $imagemSingle = $imagemSingle->fetch()['imagem'];
      ?>
      <div class="boxShop card">
        <div class="boxBody bodyCard text-center">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagemSingle ?>" />
        </div><!--boxBody-->
        <div class="boxFooter">
            <div class="starsRating text-center">
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i data-feather="star"></i>
            </div><!--starsRating-->
            <div class="infoProduto text-center">
                <h2><a href=""><?php echo $value['nome']; ?></a></h2>
                <p class="price"><span class="priceCurrent">R$200,00</span> <span class="priceOld">R$300,00</span></p>
            </div><!--infoProduto-->
        </div><!--boxFooter-->
        <div class="boxFooterHover items-flex">
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-produto?id=<?php echo $value['id']?>" class="btn">Ver Produto</a>
        </div><!--boxFooterHover-->
        <input type="hidden" name="produto_id" value="<?php echo $value['id']; ?>" />
      </div><!--boxShop-->
      <?php  } ?>
    </div><!--row-->
  </div><!--wrap-->
</section><!--contentShop-->

<?php }else{ ?>
<section class="myApresentation shopApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage w100">
			<h2>Produtos em falta!</h2>
      <a class="bread breadOne" href="<?php echo INCLUDE_PATH_PAINEL?>vizualizar-produtos">Produtos no estoque<a> <a class="bread">/</a> <a class="bread breadTwo">Produtos em falta</a>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->


<section class="contentShop headerCardDefault">
  <div class="wrap">
    <div class="row grid-three gridTwoMobile">
    <?php
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE quantidade = 0");
        $sql->execute();
        $produtos = $sql->fetchAll();
        foreach ($produtos as $key => $value){
        $imagemSingle = MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id] LIMIT 1");
        $imagemSingle->execute();
        $imagemSingle = $imagemSingle->fetch()['imagem'];
      ?>
      <div class="boxShop card">
        <div class="boxBody bodyCard text-center">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagemSingle ?>" />
        </div><!--boxBody-->
        <div class="boxFooter">
            <div class="starsRating text-center">
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i class="fill" data-feather="star"></i>
                <i data-feather="star"></i>
            </div><!--starsRating-->
            <div class="infoProduto text-center">
                <h2><a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-produto?id=<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></h2>
                <p class="price"><span class="priceCurrent">R$200,00</span> <span class="priceOld">R$300,00</span></p>
            </div><!--infoProduto-->
        </div><!--boxFooter-->
        <div class="boxFooterHover items-flex">
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-produto?id=<?php echo $value['id']; ?>" class="btn">Ver Produto</a>
        </div><!--boxFooterHover-->
        <input type="hidden" name="produto_id" value="<?php echo $value['id']; ?>" />
      </div><!--boxShop-->
      <?php  } ?>
    </div><!--row-->
  </div><!--wrap-->
</section><!--contentShop-->

<?php } ?>