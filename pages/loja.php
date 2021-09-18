<section class="cartApresentation apesentationDefault marginDownBigger">
    <div class="wrap w95 center">
        <div class="row grid-two alignCenter">
            <div class="titleCard">
                <h2>Loja</h2>
            </div><!--titleCard-->
            <div class="breadcrumbs itemsFlex alignCenter justEnd">
                <a class="itemsFlex alignCenter marginSideDefault"><i class="ri-home-wifi-line"></i> Home</a>
                <a class="itemsFlex alignCenter marginSideDefault"><i class="ri-arrow-right-line"></i> Loja</a>
            </div><!--breadcrumbs-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--cardApresentation-->

<section class="shopFilter marginDownDefault">
    <div class="wrap w95 center">
        <div class="row">
            <div class="card cardFilter grid-two w55 w100Mobile">
                <div class="col">
                    <label>Genêros:</label>
                    <select class="marginSideDefault">
                        <option>Todas as Categorias</option>
                        <option>Playstation</option>
                    </select>
                </div><!--col-->
                <div class="col">
                    <label>Ordenar por:</label>
                    <select class="marginSideDefault">
                        <option>Mais Relevantes</option>
                        <option>Novos</option>
                    </select>
                </div><!--col-->
            </div><!--cardFilter-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--shopFilter-->

<section class="gamesApresentation shopList marginTopDefault">
    <div class="wrap w95 center">
        <div class="row">
            <div class="gamesListCustom grid-five gridOneMobile">
                <?php
                    $items = \models\homeModel::getLojaItems();
                    foreach($items as $key => $value){
                        $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id]");
                        $imagem->execute();
                        $imagem = $imagem->fetch()['imagem'];
                ?>
                <div class="card cardTwo w100">
                    <?php if($imagem == ''){ ?>
                        <img src="<?php echo INCLUDE_PATH; ?>images/gameOne.jpg" />
                    <?php }else{ ?>
                    <figure style="background-image:url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $imagem; ?>');" class="gameImgCustom paddingInternalDefault">
                    <?php } ?>
                        <div class="platforms marginDownDefault">
                            <ul class="plataformIcons itemsFlex alignCenter">
                                <li class="ps"><i class="ri-playstation-line"></i></li>
                                <li class="xbox"><i class="ri-xbox-fill"></i></li>
                                <li class="windows"><i class="ri-windows-fill"></i></li>
                            </ul><!--platforms-->
                        </div><!--platforms-->
                        <div class="tag">
                            <a class="tag">Novo</a>
                        </div><!--tag-->
                    </figure><!--gameImgCustom-->
                    <div class="gameInfo paddingInternalDefault">
                        <div class="titleGame marginDownSmall limitLineClampOne">
                            <h2><a href=""><?php echo $value['nome']; ?></a></h2>
                        </div><!--titleGame-->
                        <div class="priceCard marginDownSmall">
                            <p class="priceDefault"><span>$<?php echo Painel::convertMoney($value['preco']); ?></span></p>
                        </div><!--priceCard-->
                        <div class="btnCard grid-6x4">
                            <a href="<?php INCLUDE_PATH ?>?addCart=<?php echo $value['id']; ?>"><button>Comprar</button></a>
                            <div class="itemsFlex justEnd">
                                <button class="btnInput"><i class="ri-heart-line"></i></button>
                            </div>
                        </div><!--btnCard-->
                    </div><!--gameInfo-->
                </div><!--card-->
                <?php } ?>
            </div><!--gamesListCustom-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--gamesApresentation-->