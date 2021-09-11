<?php
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imoveis` WHERE id = ?");
            $sql->execute(array($id));
            if($sql->rowCount() == 0){
            Painel::alert('erro','O imóvel que você quer editar não existe!');
            die();
            }
            $infoImovel = $sql->fetch();
        }else{
            header('Location:'.INCLUDE_PATH_PAINEL.'empreendimentos');
            die();
        }
        $imagesImoveis = MySql::conectar()->prepare("SELECT * FROM `tb_admin.imagens_imoveis`");
        $imagesImoveis->execute();
        $imagesImoveis = $imagesImoveis->fetch()['imagem'];
?>

<section class="sliderMain marginDownBigger myPropertys">
    <div class="wrap w100">
        <div class="row w90 center text-center">
            <h2 class="titleFeature"><?php echo $infoImovel['nome']; ?></h1>
        </div><!--row-->
    </div><!--wrap-->
</section><!--section-->

<section class="propertyPresentation marginDownBigger w90 center">
    <div class="wrap">
        <div class="row">
            <div class="titleTabs">
                <ul class="items-flex justCenter marginDownDefault">
                    <li class="textFeature active btnOne">Propriedade</li>
                    <li class="textFeature btnTwo">Especificações</li>
                </ul>
            </div><!--titleTabs-->
        </div><!--row-->
        <div class="row">
            <div class="cardWrapper grid-5x5 gridOneMobile cardOne cardActive">
                <div class="card">
                    <h2 class="titleFeature"><?php echo $infoImovel['nome']; ?></h2>
                    <p class="textFeature marginDownDefault">AT VERO EOS ET ACCUS AMUS ET IUS TO ODIO DIGNISSIMOS DUCIMUS</p>
                    <div class="gridIcons grid-three">
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                    </div><!--gridIcons-->
                </div><!--card-->
                <div class="card">
                    <img src="<?php INCLUDE_PATH ?>images/imobbile.jpg" />
                </div><!--card-->
            </div><!--cardWrapper cardOne-->
            <div class="cardWrapper grid-5x5 gridOneMobile cardTwo">
                <div class="card">
                    <h2 class="titleFeature">VALUES OF SMART LIVING IN VISTA RESIDENCE, NY</h2>
                    <p class="textFeature marginDownDefault">AT VERO EOS ET ACCUS AMUS ET IUS TO ODIO DIGNISSIMOS DUCIMUS</p>
                    <div class="gridIcons grid-three">
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                        <ul class="listIcons">
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                            <li class="textFeatureThree">wellnes & spa</li>
                        </ul><!--listIcons-->
                    </div><!--gridIcons-->
                </div><!--card-->
                <div class="card">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagesImoveis; ?>" />
                </div><!--card-->
            </div><!--cardWrapper cardTwo-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--propertyPresentation-->

<section class="videoProperty marginDownBigger">
    <div class="wrap">
        <div class="row">
            <div class="cardVideo items-flex justCenter">
                <div class="btnPlay">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="110px" height="110px" viewBox="0 0 110 110" enable-background="new 0 0 110 110" xml:space="preserve">
                    <circle fill="#FFFFFF" cx="55.077" cy="55.533" r="50"></circle>
                    <polygon fill="#C28562" points="51.073,65.258 63.081,55.641 51.073,45.809 "></polygon>
                    <circle opacity="0.5" fill="none" stroke="#C28562" cx="50%" cy="50%" r="42%"></circle>
                    <circle fill="none" stroke="#C28562" cx="50%" cy="50%" r="42%"></circle>
                    </svg>
                </div><!--btnPlay-->
            </div><!--cardVideo-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--videoProperty-->


<section class="supportHome requestProperty marginDownBigger">
    <div class="wrap w60 w90Mobile center">
        <div class="row w90 center w90Mobile">
            <div class="titlePresentation text-center marginDownDefault">
                <h2 class="titleFeature">Visite-nos</h2>
            </div><!--titlePresentation-->
            <form class="text-center">
                <input type="text" placeholder="Seu nome completo..." />
                <input type="email" placeholder="Seu email..." />
                <input type="date" class="w49 inlineBlock" />
                <input type="time" class="w49 inlineBlock" />
                <textarea placeholder="Envie sua mensagem"></textarea>
                <div class="btnInput"><input type="submit" value="Contatar" /></div>
            </form>
        </div><!--row-->
    </div><!--wrap-->
</section><!--requestProperty-->


<script src="<?php INCLUDE_PATH; ?>js/singleProperty.js"></script>