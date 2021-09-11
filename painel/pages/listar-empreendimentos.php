<section class="contentShop headerCardDefault">
  <div class="wrap">
      <div class="searchContent">
        <form method="post" class="items-flex w100 formSearchShop card">
			<input class="w100 shopSearch" type="search" placeholder="Procure pelo nome do empreedimento..." name="busca" />
            <input type="submit" name="acao" value="Buscar" />
		</form>
      </div><!--searchContent-->
    <div class="row gridImoveis grid-three gridTwoMobile">
        <?php
            $query = "";
            if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
            $nome = $_POST['busca'];
            $query = "WHERE nome LIKE '$nome%'";
            }

            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` $query ORDER BY order_id ASC");
            $sql->execute();
            $produtos = $sql->fetchAll();
            if($query != ''){
                echo '<div class="box-alert sucesso boxResult" id="boxResult"><p>Foram encontrados '.count($produtos).' resultado(s)</p></div>';
            }
            foreach ($produtos as $key => $value){
        ?>
      <div id="item-<?php echo $value['id']; ?>" class="boxShop card ui-state-default">
          <div class="bag"><span class="ribbon"> <span class="ribbonAdrent">NOVO</span> </span></div><!--bag-->
        <div class="boxBody bodyCard text-center">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>" />
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
                <p class="price"><span class="priceCurrent">R$<?php echo $value['preco']; ?></span> <span class="priceOld">R$300,00</span></p>
            </div><!--infoProduto-->
        </div><!--boxFooter-->
        <div class="boxFooterHover items-flex">
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>vizualizar-empreendimento?id=<?php echo $value['id']?>" class="btn">Vizualizar Imóvel</a>
        </div><!--boxFooterHover-->
      </div><!--boxShop-->
      <?php  } ?>
    </div><!--row-->
  </div><!--wrap-->
</section><!--contentShop-->


