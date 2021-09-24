<?php
    $select = \MySql::conectar()->prepare("SELECT * FROM `tb_site.membros`");
    $select->execute();
    $select = $select->fetchAll();
?>

<main class="contentCommunity grid-75x25 w90 contentMain gridOneMobile w95Mobile">
    <div class="wrap">
        <div class="row marginSideSmallIn marginSideNoneMobile">
        <section class="card marginDownDefault">
                <div class="cardHeader marginDownSmall borderBottomCard">
                    <h3>Recomendados</h3>
                </div><!--cardHeader-->
                <div class="cardBody">
                    <div class="listGroups">
                        <ul class="itemsFlex">
                            <?php
                             foreach($select as $key => $value){ 
                                if($value['id'] == $_SESSION['id_membro'])
                                    continue;
                            ?>
                            <li>
                               <figure class="figureGroup itemsFlex alignEnd positionRelative" style="background-image:url('<?php echo INCLUDE_PATH ?>images/myWallpaper.jpg')">
                                   <div class="infoGroup itemsFlex alignCenter w100">
                                        <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>" class="userImg"/>
                                        <div class="text">
                                            <h3><?php echo $value['nome'] ?></h3>
                                            <p>@<?php echo $value['nome'] ?></p>
                                        </div><!--text-->
                                        <?php
                                            if($arr['controller']->amigoPendente($value['id']) == false){
                                        ?>
                                            <a href="<?php echo INCLUDE_PATH; ?>comunidade?addFriend=<?php echo $value['id']; ?>" class="followGroup itemsFlex alignCenter justCenter"><i class="ri-user-add-line"></i></a><!--followGrop-->
                                        <?php }else{ ?>
                                            <a class="followGroup itemsFlex alignCenter justCenter"><i class="ri-check-double-line"></i></a><!--followGrop-->
                                        <?php } ?>
                                    </div><!--infoGroup-->
                               </figure><!--figureGroup-->
                            </li>
                            <?php } ?>
                        </ul>
                    </div><!--listGroups-->
                </div><!--cardBody-->
            </section><!--card-->
            <section class="card marginDownDefault">
                <div class="cardHeader marginDownSmall">
                    <h3>Chat Rooms</h3>
                </div><!--cardHeader-->
                <div class="cardBody">
                        <a class="btnArrow arrowLeft"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="listRooms contentSlider">
                        <ul class="itemsFlex slider">
                            <?php 
                                foreach($select as $key => $value){ 
                                    if($value['id'] == $_SESSION['id_membro'])
                                        continue;
                            ?>
                            <li>
                                <div class="cardRoom">
                                    <figure class="userRoom userImgTwo textCenter positionRelative wFitContent center">
                                        <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem'] ?>" class="userImg"/>
                                        <span class="status on"></span>
                                    </figure><!--userRoom-->
                                    <div class="infoUserRoom textCenter">
                                        <h4><?php echo $value['nome'] ?></h4>
                                        <div class="btnsRoom itemsFlex alignCenter justCenter">
                                            <?php
                                                if($arr['controller']->isAmigo($value['id'])){
                                            ?>
                                                <a class="evaluation">Amigo</a>
                                            <?php  }else if($arr['controller']->amigoPendente($value['id']) == false){ ?>
                                                <a href="<?php echo INCLUDE_PATH; ?>comunidade?addFriend=<?php echo $value['id']; ?>" class="evaluation">Adicionar</a>
                                            <?php }else{ ?>
                                                <a class="evaluation">Pendente</a>
                                            <?php } ?>
                                            <?php 
                                                if($arr['controller']->isAmigo($value['id'])){
                                            ?>
                                                <a class="btnIcon itemsFlex alignCenter justCenter"><i class="ri-check-fill"></i></a>
                                            <?php }else{ ?>
                                                <a class="btnIcon itemsFlex alignCenter justCenter"><i class="ri-rest-time-line"></i></a>
                                            <?php } ?>
                                        </div><!--btnsRoom-->
                                    </div><!--infoUserRoom-->
                                </div><!--cardRoom-->
                            </li>
                            <?php } ?>
                        </ul>
                    </div><!--listRooms-->
                        <a class="btnArrow arrowRight"><i class="ri-arrow-right-s-line"></i></a>
                </div><!--cardBody-->
            </section><!--card-->
        </div><!--row-->
    </div><!--wrap-->
    <div class="wrap">
        <div class="row marginSideSmall marginSideNoneMobile">
            <section class="card marginDownSmall">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <h3>Faça-nos uma pergunta</h3>
                </div><!--cardHeader-->
                <div class="cardBody cardQuestion">
                    <ul> 
                        <li class="marginDownSmall">
                            <div class="infoQuestion">
                                <div class="textQuestion itemsFlex alignCenter marginDownSmall">
                                    <i class="ri-information-fill"></i><h4>Ask questions in Q&A to get help from experts in your field.</h4>
                                </div><!--textQuestion-->
                                <a target="_blank" href="https://www.linkedin.com/in/raissa-dev-69986a214/" class="button w100">Conversar agora</a>
                            </div><!--infoQuestion-->
                        </li>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
            <section class="card">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <h3>Explorar Eventos</h3>
                </div><!--cardHeader-->
                <div class="cardBody cardEvents">
                    <ul> 
                        <li class="marginDownSmall positionRelative textCenter">
                            <img src="<?php echo INCLUDE_PATH ?>images/timeClock.png" class="timeImg" />
                            <i class="ri-gift-2-fill"></i>
                            <h4>BZ University good night event in columbia</h4>
                        </li>
                        <li class="marginDownSmall positionRelative textCenter">
                            <img src="<?php echo INCLUDE_PATH ?>images/timeClock.png" class="timeImg" />
                            <i class="ri-mic-2-fill"></i>
                            <h4>BZ University good night event in columbia</h4>
                        </li>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
        </div><!--row-->
    </div><!--wrap-->
</main><!--contentCommunity-->
