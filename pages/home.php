<section class="myApresentationHome marginDownBigger">
    <div class="wrap">
        <div class="row w95 center">
            <div class="titleCard marginDownSmall">
                <h2><span>The Bests </span> Games</h2>
            </div><!--titleCard-->
            <div class="cardsList grid-two itemsFlexMobile">
                <?php
                    for($i = 0;$i < 2; $i++){
                ?>
                <div class="card grid-two marginSideDefault gridOneMobile minW60Mobile">
                    <figure class="gameImg">
                        <img src="<?php INCLUDE_PATH; ?>images/gameOne.jpg" />
                    </figure><!--gameImg-->
                    <div class="gameInfo paddingInternalSmall">
                        <div class="titleGame marginDownSmall">
                            <h2><a href="">X4: Foundations Collector's Edition</a></h2>
                        </div><!--titleGame-->
                        <div class="details marginDownMiddle">
                            <p>Release date: <span>30.11.2018</span></p>
                            <p>Genres: <span>Simulation, Action, Sci-fi</span></p>
                        </div><!--details-->
                        <div class="platforms marginDownDefault">
                            <ul class="plataformIcons itemsFlex alignCenter">
                                <li class="ps"><i class="ri-playstation-line"></i></li>
                                <li class="xbox"><i class="ri-xbox-fill"></i></li>
                                <li class="windows"><i class="ri-windows-fill"></i></li>
                            </ul><!--platforms-->
                        </div><!--platforms-->
                        <div class="priceCard marginDownDefault">
                            <p class="priceDefault"><span>$59.99</span></p>
                            <p class="pricePrevious"><span>$79.99</span></p>
                            <p class="pricePromotion"><span>30% OFF</span></p>
                        </div><!--priceCard-->
                        <div class="btnCard grid-6x4">
                            <button>Comprar</button>
                            <div class="itemsFlex justEnd">
                                <button class="btnInput"><i class="ri-heart-line"></i></button>
                            </div>
                        </div><!--btnCard-->
                    </div><!--gameInfo-->
                </div><!--card-->
                <?php } ?>
            </div><!--cardsLists-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--myApresentation-->

<section class="gamesApresentation marginTopBigger marginDownBigger">
    <div class="wrap w95 center">
        <div class="row">
            <div class="titleCard marginDownDefault itemsFlex alignCenter flexWrap">
                <h2 class="w80 w100Mobile"><span>The Bests </span> Games</h2>
                <div class="btns itemsFlex alignCenter w100Mobile">
                    <a href="" class="AInput itemsFlex alignCenter">Ver Tudo</a>
                    <div class="arrows itemsFlex w70Mobile justEndMobile">
                        <a class="svgInput itemsFlex alignCenter marginSideDefault"><i class="ri-arrow-left-s-line"></i></a>
                        <a class="svgInput itemsFlex alignCenter"><i class="ri-arrow-right-s-line"></i></a>
                    </div><!--arrow-->
                </div><!--btns-->
            </div><!--titleCard-->
            <div class="gamesListCustom itemsFlex">
                <?php
                    $items = \models\homeModel::getLojaItems();
                    foreach($items as $key => $value){
                        $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id]");
                        $imagem->execute();
                        $imagem = $imagem->fetch()['imagem'];
                ?>
                <div class="card cardTwo w20 minW50Mobile">
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

<section class="gamesApresentation marginTopBigger marginDownBigger">
    <div class="wrap w95 center">
        <div class="row">
            <div class="titleCard marginDownDefault itemsFlex alignCenter flexWrap">
                <h2 class="w80 w100Mobile"><span>The Bests </span> Games</h2>
                <div class="btns itemsFlex alignCenter w100Mobile">
                    <a href="" class="AInput itemsFlex alignCenter">Ver Tudo</a>
                    <div class="arrows itemsFlex w70Mobile justEndMobile">
                        <a class="svgInput itemsFlex alignCenter marginSideDefault"><i class="ri-arrow-left-s-line"></i></a>
                        <a class="svgInput itemsFlex alignCenter"><i class="ri-arrow-right-s-line"></i></a>
                    </div><!--arrow-->
                </div><!--btns-->
            </div><!--titleCard-->
            <div class="gamesListCustom itemsFlex">
                <?php
                    $items = \models\homeModel::getLojaItems();
                    foreach($items as $key => $value){
                        $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id]");
                        $imagem->execute();
                        $imagem = $imagem->fetch()['imagem'];
                ?>
                <div class="card cardTwo w20 minW50Mobile">
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




<section class="gamesApresentation gamesList marginTopBigger marginDownBigger">
    <div class="wrap w95 center grid-three gridOneMobile">
        <?php
            for($i = 0; $i < 3; $i++){
        ?>
        <div class="row marginSideDefault">
            <div class="titleCardTwo marginDownDefault itemsFlex alignCenter">
                <h2 class="w80"><span>The Bests </span> Games</h2>
                <div class="btns itemsFlex alignCenter">
                    <a href="" class="AInput itemsFlex alignCenter">Tudo</a>
                </div><!--btns-->
            </div><!--titleCard-->
            <div class="gamesListCustom">
                <?php
                    foreach($items as $key => $value){
                        $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id]");
                        $imagem->execute();
                        $imagem = $imagem->fetch()['imagem'];
                ?>
                <div class="card cardThree grid-3x7 marginDownDefault">
                    <figure class="gameImg">
                        <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $imagem; ?>" />
                    </figure><!--gameImg-->
                    <div class="gameInfo paddingInternalSmall">
                        <div class="titleGame marginDownSmall limitLineClampTwo height100">
                            <h2><a href="<?php INCLUDE_PATH ?>?addCart=<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></h2>
                        </div><!--titleGame-->
                        <div class="wrapper grid-6x4 alignEnd height100">
                            <div class="priceCard">
                                <p class="priceDefault"><span>$<?php echo Painel::convertMoney($value['preco']); ?></span></p>
                                <p class="pricePrevious small"><span>$79.99</span></p>
                                <p class="pricePromotion small"><span>30% OFF</span></p>
                            </div><!--priceCard-->
                            <div class="btnCard itemsFlex justEnd">
                                <button class="btnInput"><i class="ri-heart-line"></i></button>
                            </div><!--btnCard-->
                        </div><!--wrapper-->
                    </div><!--gameInfo-->
                </div><!--card-->
                <?php } ?>
            </div><!--gamesListCustom-->
        </div><!--row-->
        <?php
           }
        ?>
    </div><!--wrap-->
</section><!--gamesApresentation-->

<section class="blogCards">
    <div class="wrap w95 center">
        <div class="row">
            <div class="titleCard marginDownDefault itemsFlex alignCenter">
                <h2 class="w80"><span>The Orders </span> Games</h2>
            </div><!--titleCard-->
            <div class="gamesList grid-two gridOneMobile">
                <?php
                    for($i = 0; $i < 2; $i++){
                ?>
                <div class="card cardVideo marginSideDefault marginDownMobileDefault">
                    <figure style="background-image:url('<?php echo INCLUDE_PATH; ?>images/bgBlog.jpg');" class="gameImgCustom itemsFlex justEnd paddingInternalDefault">
                        <div class="marginDownSmall">
                            <a class="category">Novo</a>
                        </div><!--categoryDiv-->
                        <div class="titleVideo marginDownSmall">
                            <h2><a>New hot race from your favorite computer games studio</a></h2>
                        </div><!--titleVideo-->
                        <div class="dicesBlog grid-two">
                            <div class="colIcon itemsFlex alignCenter">
                                <p><i class="ri-time-line"></i><span>2 horas atrás</span></p>
                            </div>
                            <div class="colIcon itemsFlex justEnd alignCenter">
                                <p><i class="ri-question-answer-line"></i><span>17</span></p>
                            </div>
                        </div><!--dicesBlog-->
                    </figure><!--gameImgCustom-->
                </div><!--cardVideo-->
                <?php } ?>
            </div><!--gamesList-->
        </div><!--row-->
    </div><!--wrap--> 
</section><!--blogCards-->

<section class="gamesApresentation blogCardThree blogCards marginTopBigger marginDownBigger">
    <div class="wrap w95 center">
        <div class="row">
            <div class="titleCard marginDownDefault itemsFlex alignCenter flexWrap">
                    <h2 class="w80 w100Mobile"><span>The Bests </span> Games</h2>
                    <div class="btns itemsFlex alignCenter w100Mobile">
                        <a href="" class="AInput itemsFlex alignCenter">Ver Tudo</a>
                        <div class="arrows itemsFlex w70Mobile justEndMobile">
                            <a class="svgInput itemsFlex alignCenter marginSideDefault"><i class="ri-arrow-left-s-line"></i></a>
                            <a class="svgInput itemsFlex alignCenter"><i class="ri-arrow-right-s-line"></i></a>
                        </div><!--arrow-->
                    </div><!--btns-->
                </div><!--titleCard-->
            <div class="gamesListCustom grid-three gridOneMobile">
                <?php
                    for($i = 0;$i < 3; $i++){
                ?>
                <div class="card cardTwo marginDownMobileDefault">
                    <figure style="background-image:url('<?php echo INCLUDE_PATH; ?>images/gameOne.jpg');" class="gameImgCustom paddingInternalDefault">
                    </figure><!--gameImgCustom-->
                    <div class="gameInfo paddingInternalDefault">
                        <div class="marginDownSmall">
                            <a class="category">Novo</a>
                        </div><!--categoryDiv-->
                        <div class="titleGame marginDownSmall limitLineClampOne">
                            <h2><a href="">X4: Foundations Collector's Edition</a></h2>
                        </div><!--titleGame-->
                        <div class="dicesBlog grid-two">
                            <div class="colIcon itemsFlex alignCenter">
                                <p><i class="ri-time-line"></i><span>2 horas atrás</span></p>
                            </div>
                            <div class="colIcon itemsFlex justEnd alignCenter">
                                <p><i class="ri-question-answer-line"></i><span>17</span></p>
                            </div>
                        </div><!--dicesBlog-->
                    </div><!--gameInfo-->
                </div><!--card-->
                <?php } ?>
            </div><!--gamesListCustom-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--gamesApresentation-->