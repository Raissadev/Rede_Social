<main class="contentMain grid-25x50x25 w90 gridOneMobile w95Mobile">
    <div class="wrap orderTwoMobile">
        <div class="row colOne marginSideSmall marginSideNoneMobile marginDownDefaultMobile">
            <div class="cardTime marginDownSmall" style="background-image:url('<?php echo INCLUDE_PATH ?>images/bgTime.jpg')">
                <img src="<?php echo INCLUDE_PATH ?>images/timeClock.png" class="timeImg" />
                <div class="contentTimeInfo textCenter">
                    <h2>21:00</h2>
                    <h4>Wed, 22 <br /> September 2021</h4>
                </div><!--contentTimeInfo-->
            </div><!--cardTime-->
            <section class="card marginDownSmall">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <i class="ri-typhoon-line"></i><h3>Cursos Populares</h3>
                </div><!--cardHeader-->
                <div class="cardBody">
                    <ul>
                        <li class="marginDownSmall">
                            <figure class="imgBigger positionRelative">
                                <img src="<?php echo INCLUDE_PATH; ?>images/courseImg.jpg" />
                                <span class="tag">Free</span>
                            </figure><!--imgBigger-->
                            <h3>Wordpress Online video course</h3>
                        </li>
                        <li>
                            <figure class="imgBigger positionRelative">
                                <img src="<?php echo INCLUDE_PATH; ?>images/courseImgTwo.jpg" />
                                <span class="tag">Premium</span>
                            </figure><!--imgBigger-->
                            <h3>Angular Online video course</h3>
                        </li>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
            <section class="card">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <i class="ri-typhoon-line"></i><h3>Blogs Recentes</h3>
                </div><!--cardHeader-->
                <div class="cardBody cardBlog">
                    <ul> 
                        <?php for($i = 0; $i < 3; $i++){ ?>
                        <li class="marginDownSmall itemsFlex alignCenter">
                            <figure class="positionRelative imgWide w40 w25Mobile">
                                <img src="<?php echo INCLUDE_PATH; ?>images/courseImg.jpg" />
                            </figure>
                            <div class="info marginSideSmall">
                                <h3>Moira's fade reach much farther...</h3>
                                <p>2 weeks ago</p>
                            </div><!--info-->
                        </li>
                        <?php } ?>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
        </div><!--row-->
    </div><!--wrap-->
    <div class="wrap">
        <div class="row marginSideSmallIn marginSideNoneMobile marginDownDefaultMobile">
            <div class="tabsNav marginDownSmall">
                <nav>
                    <a class="tab activeTab">Início</a><!--tab-->
                    <a class="tab">Recentes</a><!--tab-->
                    <a class="tab">Favoritos</a><!--tab-->
                </nav>
            </div><!--tabsNav-->
            <section class="card marginDownSmall">
                <div class="cardHeader marginDownSmall">
                    <h3>Criar novo post</h3>
                </div><!--cardHeader-->
                <div class="cardBody marginDownSmall">
                    <form method="post" class="formCurstoContent positionRelative itemsFlex alignCenter">
                        <button type="submit" name="feed_post"><i class="ri-quill-pen-line"></i></button>
                        <input name="mensagem" type="text" placeholder="Criar novo post" class="w100" />
                    </form>
                </div><!--cardBody-->
                <div class="cardFooter">
                    <nav class="midiasUploads">
                        <ul>
                            <li><a><i class="ri-image-add-fill"></i><span>Video/Fotos</span></a></li>
                            <li><a><i class="ri-emotion-happy-line"></i><span>Video/Fotos</span></a></li>
                            <li><a><i class="ri-live-line"></i><span>Video/Fotos</span></a></li>
                        </ul>
                    </nav><!--midias-->
                </div><!--cardFooter-->
            </section><!--card-->
            <section class="cardStorysContent marginDownSmall">
                <div class="cardHeader marginDownSmall">
                    <h3>Stories Recentes</h3>
                </div><!--cardHeader-->
                <div class="storys itemsFlex slider contentSlider">
                    <?php 
                        $amigos = \models\homeModel::getMembros();
                        foreach($amigos as $key => $value){
                    ?>
                    <div class="cardUserStory" style="background-image:url('<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']; ?>')">
                        <div class="userStory itemsFlex alignEnd justCenter">
                            <figure>
                                <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $value['imagem']; ?>" class="userImg"/>
                            </figure>
                            <div class="profileUser itemsFlex alignCenter justCenter w100">
                                <a class="plusIcon"><i class="ri-add-line"></i></a>
                                <span class="decorationStory w100 textCenter"><h4><?php echo $value['nome']; ?></h4></span>
                            </div><!--profileUser-->
                        </div><!--userStory-->
                    </div><!--cardUserStory-->
                    <?php } ?>
                </div><!--storys-->
            </section><!--cardStorysContent-->
            <section class="card marginDownDefault">
                <div class="cardHeader marginDownSmall">
                    <h3>Chat Rooms</h3>
                </div><!--cardHeader-->
                <div class="cardBody">
                        <a class="btnArrow arrowLeft"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="listRooms contentSlider">
                        <ul class="itemsFlex slider">
                            <?php for($i = 0; $i < 10; $i++){ ?>
                            <li>
                                <div class="cardRoom">
                                    <figure class="userRoom userImgTwo textCenter positionRelative wFitContent center">
                                        <img src="<?php echo INCLUDE_PATH ?>images/myWallpaper.jpg" class="userImg"/>
                                        <span class="status on"></span>
                                    </figure><!--userRoom-->
                                    <div class="infoUserRoom textCenter">
                                        <h4>Jhon Doe</h4>
                                        <div class="btnsRoom itemsFlex alignCenter justCenter">
                                            <a class="evaluation">Join</a>
                                            <a class="btnIcon itemsFlex alignCenter justCenter"><i class="ri-chat-1-fill"></i></a>
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
            <section class="card marginDownDefault">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <a class="markCardHeader itemsFlex alignCenter justCenter"><i class="ri-bookmark-3-line"></i></a>
                    <div>
                        <h3>Chat Rooms</h3>
                        <p> Follow Similar People</p>
                    </div>
                </div><!--cardHeader-->
                <div class="cardBody contentSlider">
                        <a class="btnArrow arrowLeft"><i class="ri-arrow-left-s-line"></i></a>
                    <div class="listFollows itemsFlex slider">
                        <?php for($i = 0; $i < 5; $i++){ ?>
                        <div class="cardFollow">
                            <figure class="userRoom textCenter positionRelative wFitContent center">
                                <img src="<?php echo INCLUDE_PATH ?>images/myWallpaper.jpg" class="userImg"/>
                            </figure><!--userRoom-->
                            <div class="infoUserRoom textCenter">
                                <h4>Jhon Doe</h4>
                                <a class="infoWork">Department of Socilolgy</a>
                                <div class="btnsRoom itemsFlex alignCenter justCenter">
                                    <a class="button activeBtn wFitContent">Join</a>
                                </div><!--btnsRoom-->
                            </div><!--infoUserRoom-->
                        </div><!--cardFollow-->
                        <?php } ?>
                    </div><!--listFollows-->
                        <a class="btnArrow arrowRight"><i class="ri-arrow-right-s-line"></i></a>
                </div><!--cardBody-->
            </section><!--card-->
            <div class="cardPost">
                <?php
                    $postsFeed = \MySql::conectar()->prepare("SELECT * FROM `tb_site.feed` ORDER BY id DESC");
                    $postsFeed->execute();
                    $postsFeed = $postsFeed->fetchAll();
                    foreach($postsFeed as $key => $value){
                        $membro = \models\membrosModel::getMembroById($value['membro_id']);
                ?>
                <section class="card marginDownSmall">
                    <div class="cardHeader cardUserContent itemsFlex alignCenter marginDownSmall">
                        <figure class="userImgThree">
                            <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $membro['imagem'] ?>" class="userImg" />
                        </figure><!--userImgThree-->
                        <div class="boxUserInfo">
                            <a class="infoUser"><?php echo $membro['nome'] ?> <span>Podcast</span></a>
                            <p class="date itemsFlex alignCenter"><i class="ri-global-line"></i> Published: Sep,15 2020</p>
                        </div><!--boxUserInfo-->
                    </div><!--cardHeader-->
                    <div class="cardBody cardBodyPost marginDownSmall borderBottomCard">
                        <figure class="figurePost marginDownSmall">
                            <img src="<?php echo INCLUDE_PATH; ?>images/banner.jpg" />
                        </figure>
                        <h2 class="marginDownSmallIn"><a>Supervision as a Personnel Development Device</a></h2>
                        <p class="textPost"><?php echo $value['post']; ?></p>
                    </div><!--cardBody-->
                    <div class="cardFooter gridTwo">
                        <div>
                            <nav class="evaluationsIcons evaluationsNav marginDownSmallIn">
                                <ul class="itemsFlex alignCenter">
                                    <li><a class="itemsFlex alignCenter"><i class="ri-eye-line"></i> <span>1.2k</span></a></li>
                                    <li><a class="itemsFlex alignCenter"><i class="ri-message-3-line"></i> <span>54</span></a></li>
                                    <li><a class="itemsFlex alignCenter"><i class="ri-star-line"></i> <span>1k</span></a></li>
                                    <li><a class="itemsFlex alignCenter"><i class="ri-share-line"></i> <span>35</span></a></li>
                                </ul>
                            </nav><!--evaluationsIcons-->
                            <nav class="evaluationsBtns evaluationsNav">
                                <ul class="itemsFlex alignCenter">
                                    <li><a class="evaluation"><i class="ri-thumb-up-fill"></i> <span>Like</span></a></li>
                                    <li><a class="evaluation"><i class="ri-message-2-fill"></i> <span>Comentar</span></a></li>
                                    <li><a class="evaluation"><i class="ri-share-fill"></i> <span>Compartilhar</span></a></li>
                                </ul>
                            </nav><!--evaluationsBtns-->
                        </div>
                        <div class="contentEmojis itemsFlex alignEnd justEnd">
                            <nav class="emojisNav">
                                <ul class="itemsFlex">
                                    <li><a class="emotion like"><i class="ri-thumb-up-fill"></i></a></li>
                                    <li><a class="emotion love"><i class="ri-heart-fill"></i></a></li>
                                    <li><a class="emotion sad"><i class="ri-emotion-sad-fill"></i></a></li>
                                    <li><a class="emotion happy"><i class="ri-emotion-fill"></i></a></li>
                                </ul>
                            </nav><!--emojisNav-->
                        </div><!--contentEmojis-->
                    </div><!--cardFooter-->
                </section><!--card-->
                <?php } ?>
            </div><!--cardPost-->
        </div><!--row-->
    </div><!--wrap-->
    <div class="wrap">
        <div class="row marginSideSmall marginSideNoneMobile">
            <section class="card marginDownSmall">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <h3>Sugestões de Grupos</h3>
                </div><!--cardHeader-->
                <div class="cardBody cardGroup">
                    <ul> 
                        <?php for($i = 0; $i < 3; $i++){ ?>
                        <li class="marginDownSmall itemsFlex alignCenter">
                            <figure class="positionRelative imgRadondo w40 w25Mobile">
                                <img src="<?php echo INCLUDE_PATH; ?>images/courseImg.jpg" />
                            </figure>
                            <div class="info infoGroup marginSideSmallIn w100">
                                <h3>Moira's fade reach</h3>
                                <p class="itemsFlex alignCenter"><i class="ri-notification-3-line"></i> Notificações <span>13</span></p>
                            </div><!--info-->
                        </li>
                        <?php } ?>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
            <section class="card marginDownSmall">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <h3>Seus Grupos</h3>
                </div><!--cardHeader-->
                <div class="cardBody cardCommunity">
                    <ul> 
                        <li class="marginDownSmall">
                            <div class="topCommunity" style="background-image:url('<?php echo INCLUDE_PATH; ?>images/courseImg.jpg')">
                                <figure class="userImgTwo positionRelative">
                                    <img src="<?php echo INCLUDE_PATH; ?>images/courseImg.jpg" class="userImg" />
                                </figure><!--userImgTwo-->
                            </div><!--topCommunity-->
                            <div class="infoCommunity">
                                <div class="textCommunity w70">
                                    <h4>Lorem ipsum amet</h4>
                                    <p>@Raissadev</p>
                                </div><!--textCommunity-->
                                <a class="button w100">Participar agora</a>
                            </div><!--infoCommunity-->
                        </li>
                    </ul>
                </div><!--cardBody-->
            </section><!--card-->
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
</main><!--contentMain-->
