<main class="contentMain contentSolicitacoes grid-75x25 w90 gridOneMobile w95Mobile">
    <div class="wrap">
        <div class="row marginSideSmallIn marginSideNoneMobile marginDownDefaultMobile">
            <section class="card marginDownDefault">
                <div class="cardHeader marginDownSmall">
                    <h3>Solicitações</h3>
                </div><!--cardHeader-->
                <div class="cardBody">
                    <div class="listRooms contentSlider">
                        <ul class="itemsFlex">
                            <?php $solicitacoesPendentes = $arr['controller']->listarSolicitacoes();
                                foreach($solicitacoesPendentes as $key => $value){
                                //Puxar informações do solicitande
                                $membro = \models\membrosModel::getMembroById($value['id_from']);
                            ?>
                            <li>
                                <div class="cardRoom">
                                    <figure class="userRoom userImgTwo textCenter positionRelative wFitContent center">
                                        <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $membro['imagem']; ?>" class="userImg"/>
                                        <span class="status on"></span>
                                    </figure><!--userRoom-->
                                    <div class="infoUserRoom textCenter">
                                        <h4><?php echo $membro['nome']; ?></h4>
                                        <div class="btnsRoom itemsFlex alignCenter justCenter">
                                            <a href="<?php echo INCLUDE_PATH; ?>solicitacoes?aceitar=<?php echo $value['id_from']; ?>" class="evaluation">Aceitar</a>
                                            <a href="<?php echo INCLUDE_PATH; ?>solicitacoes?rejeitar=<?php echo $value['id_from']; ?>" class="btnIcon itemsFlex alignCenter justCenter"><i class="ri-close-fill"></i></a>
                                        </div><!--btnsRoom-->
                                    </div><!--infoUserRoom-->
                                </div><!--cardRoom-->
                            </li>
                            <?php } ?>
                        </ul>
                    </div><!--listRooms-->
                </div><!--cardBody-->
            </section><!--card-->
            <section class="card marginDownDefault">
                <div class="cardHeader itemsFlex alignCenter marginDownSmall">
                    <a class="markCardHeader itemsFlex alignCenter justCenter"><i class="ri-bookmark-3-line"></i></a>
                    <div>
                        <h3>Amigos</h3>
                        <p>Follow Similar People</p>
                    </div>
                </div><!--cardHeader-->
                <div class="cardBody">
                    <div class="listFollows itemsFlex">
                        <?php 
                            $amigos = \models\membrosModel::listarAmigos();
                            foreach($amigos as $key => $value){
                                    $membro = \models\membrosModel::getMembroById($value); 
                        ?>
                        <div class="cardFollow">
                            <figure class="userRoom textCenter positionRelative wFitContent center">
                                <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $membro['imagem']; ?>" class="userImg"/>
                            </figure><!--userRoom-->
                            <div class="infoUserRoom textCenter">
                                <h4><?php echo $membro['nome']; ?></h4>
                                <a class="infoWork">Department of Socilolgy</a>
                                <div class="btnsRoom itemsFlex alignCenter justCenter">
                                    <a class="button activeBtn wFitContent">Ver</a>
                                </div><!--btnsRoom-->
                            </div><!--infoUserRoom-->
                        </div><!--cardFollow-->
                        <?php } ?>
                    </div><!--listFollows-->
                </div><!--cardBody-->
            </section><!--card-->
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

