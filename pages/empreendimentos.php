<?php
    $selectImoveis = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imoveis`");
    $selectImoveis->execute();
?>

<section class="sliderMain marginDownDefault myPropertys">
    <div class="wrap w100">
        <div class="row w90 center text-center">
            <h2 class="titleFeature">Propriedades</h1>
        </div><!--row-->
    </div><!--wrap-->
</section><!--section-->

<section class="contentFilters" id="contentFilters">
    <div class="wrap w25 w80Mobile">
        <div class="headerRow grid-9x1">
            <h2 class="textFeature">RaissaDev</h2>
            <i id="closeFilter" data-feather="x"></i>
        </div><!--headerRow-->
        <div class="row">
            <div class="socials items-flex">
                <a class="items-flex justCenter"><i data-feather="github"></i></a>
                <a class="items-flex justCenter"><i data-feather="linkedin"></i></a>
                <a class="items-flex justCenter"><i data-feather="instagram"></i></a>
                <a class="items-flex justCenter"><i data-feather="twitter"></i></a>
                <a class="items-flex justCenter"><i data-feather="facebook"></i></a>
            </div><!--socials-->
        </div><!--row-->
        <div class="row cardRow">
            <div class="cardFilter">
                <div class="searchContentFilter">
                    <form>
                        <input type="search" name="texto-busca" placeholder="Faça sua Pesquisa..." />
                    </form>
                </div><!--searchContentFilter-->
                <form method="post" action="<?php INCLUDE_PATH ?>ajax/formularios.php">
                    <div class="boxCard">
                        <div class="headerCard">
                            <h2 class="textFeature">Categorias</h2>
                        </div><!--headerCard-->
                        <div class="bodyCard">
                            <div class="checkGroup">
                                <label class="textFeature">Área Minima:</label>
                                <input name="area_minima" type="number" min="0" max="10000" step="100" />
                            </div><!--checkGroup-->
                            <div class="checkGroup">
                                <label class="textFeature">Área Máxima:</label>
                                <input name="area_maxima" type="number" min="0" max="10000" step="100" />
                            </div><!--checkGroup-->
                            <div class="checkGroup">
                                <label class="textFeature">Preço Minimo:</label>
                                <input name="preco_min" type="text" />
                            </div><!--checkGroup-->
                            <div class="checkGroup">
                                <label class="textFeature">Preço Máximo:</label>
                                <input name="preco_max" type="text" />
                            </div><!--checkGroup-->
                            <input type="hidden" name="slug_empreendimento" value="'.$parametros['slug_empreendimento].'" />
                        </div><!--bodyCard-->
                    </div><!--boxCard-->
                </form>
            </div><!--cardFilter-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--contentFilters-->

<section class="contentSlideImobbile contentEmpreendimentos">
    <div class="wrap">
        <div class="row w90 center marginDownDefault">
            <div class="dataFilters">
                <a id="btnFilter" class="btnFilter items-flex justCenter"><i data-feather="sliders"></i> <span class="textFeature">Filtrar</span></a>
            </div><!--dataFilters-->
        </div><!--row-->
        <div class="row w90 center">
            <div class="slidCard center items-flex">
            <div class="slidAuto grid-5x5 center w100Mobile gridOneMobile">
                <?php 
                    $selectImoveis = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imoveis`");
                    $selectImoveis->execute();
                    $selectImoveis = $selectImoveis->fetchAll();
                    $selectImoveisImages = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imagens_imoveis` WHERE imovel_id = id");
                    $selectImoveisImages->execute();
                    $selectImoveisImages = $selectImoveisImages->fetch()['imagem'];

                    foreach($selectImoveis as $key => $value){
                ?>
                <div class="cardInfo w100 text-center w100Mobile">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $selectImoveisImages; ?>" />
                    <h5 class="titleFeatureTwo"><?php echo $value['nome']; ?></h5>
                    <p class="textFeatureThree">Área: <?php echo $value['area']; ?> | Preço: <?php echo $value['preco']; ?></p>
                    <a class="linkBtn" href="<?php echo INCLUDE_PATH ?>imovel?id=<?php echo $value['id']; ?>">Ver mais</a>
                </div><!--cardInfo-->
                <?php } ?>
                </div><!--slidAuto-->
            </div><!--slidCard-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--contentSlideImobbile-->


