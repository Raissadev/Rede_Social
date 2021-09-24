<main class="contentMain contentProfile grid-25x75 w90 gridOneMobile w95Mobile">
    <div class="wrap orderTwoMobile">
        <div class="row colOne marginSideSmall marginSideNoneMobile marginDownDefaultMobile">
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
            <section class="cardProfile marginDownSmall">
                <div class="col marginDownSmall">
                    <figure class="profileFigure itemsFlex alignEnd" style="background-image:url('<?php echo INCLUDE_PATH; ?>images/profileBanner.jpg')">
                        <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img_membro'] ?>" />
                    </figure><!--profileFigure-->
                </div><!--col-->
                <div class="col gridTwo">
                    <div class="infoProfile">
                        <h4><?php echo $_SESSION['nome_membro'] ?></h4>
                        <a>@<?php echo $_SESSION['nome_membro'] ?></a>
                    </div><!--infoProfile-->
                    <div class="infoProfile itemsFlex alignCenter justEnd">
                        <p>Joined: <span>April 2020</span></p>
                        <p>Follow: <span>55K</span></p>
                        <p>Followers: <span>2K</span></p>
                        <p>Posts: <span>45</span></p>
                    </div><!--infoProfile-->
                </div><!--col-->
            </section><!--cardProfile-->
            <section class="contentPostsProfile marginDownSmall">
                <div class="tabsNav marginDownSmall">
                    <nav>
                        <a class="tab activeTab">Início</a><!--tab-->
                        <a class="tab">Recentes</a><!--tab-->
                        <a class="tab">Favoritos</a><!--tab-->
                    </nav>
                </div><!--tabsNav-->
                <section class="card">
                    <div class="bodyCard grid-75x25 gridOneMobile">
                        <div class="colAbout">
                            <h4 class="marginDownSmallIn">Sobre mim</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a magna turpis. Suspendisse quis cursus lorem, ut pulvinar tortor. Nullam aliquet leo eu gravida accumsan.</p>
                        </div><!--col-->
                        <div class="colAbout">
                            <h4 class="marginDownSmallIn">Redes Sociais</h4>
                            <ul class="networkSocial itemsFlex w100">
                                <li><a class="networkSocial"><i class="ri-facebook-fill"></i></a></li>
                                <li><a class="networkSocial"><i class="ri-instagram-line"></i></a></li>
                                <li><a class="networkSocial"><i class="ri-linkedin-fill"></i></a></li>
                                <li><a class="networkSocial"><i class="ri-github-fill"></i></a></li>
                                <li><a class="networkSocial"><i class="ri-stack-overflow-fill"></i></a></li>
                            </ul><!--networkSocial-->
                        </div><!--col-->
                    </div><!--bodyCard-->
                </section><!--card-->
            </section><!--contentPostsProfile-->
            <section class="feed grid-70x30 gridOneMobile">
                <div class="row">
                    <section class="card marginDownSmall">
                        <div class="cardHeader marginDownSmall">
                            <h3>Criar novo post</h3>
                        </div><!--cardHeader-->
                        <div class="cardBody marginDownSmall">
                            <form method="post" class="formCurstoContent positionRelative itemsFlex alignCenter">
                                <button type="submit" name="feed_post"><i class="ri-quill-pen-line"></i></button>
                                <input name="mensagem" type="text" placeholder="Criar novo post..." class="w100" />
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
                                <figure class="marginDownSmall">
                                    <img src="<?php echo INCLUDE_PATH; ?>images/courseImg.jpg" />
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
                <div class="row marginSideSmall">
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
                                            <h4>Lorem ipsum</h4>
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
            </section><!--feed-->
        </div><!--row-->
    </div><!--wrap-->
</main><!--contentMain-->