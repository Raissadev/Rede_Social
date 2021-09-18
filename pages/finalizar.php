<section class="cartApresentation apesentationDefault marginDownBigger">
    <div class="wrap w95 center">
        <div class="row grid-two alignCenter">
            <div class="titleCard">
                <h2>Checkout</h2>
            </div><!--titleCard-->
            <div class="breadcrumbs itemsFlex alignCenter justEnd">
                <a class="itemsFlex alignCenter marginSideDefault"><i class="ri-home-wifi-line"></i> Home</a>
                <a class="itemsFlex alignCenter marginSideDefault"><i class="ri-arrow-right-line"></i> Carrinho</a>
            </div><!--breadcrumbs-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--cardApresentation-->

<section class="cartContent">
    <div class="wrap w90 center">
        <div class="row grid-7x3">
            <div class="col">
                <div class="card marginSideDefault">
                    <div class="cardBody marginDownMiddle">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product"><a>Produto<a></th>
                                    <th class="name"><a>Nome<a></th>
                                    <th class="platform"><a>Quantidade<a></th>
                                    <th class="price"><a>Valor<a></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $itemsCarrinho = $_SESSION['carrinho'];
                                    $total = 0;
                                    foreach($itemsCarrinho as $key => $value){
                                        $idProduto = $key;
                                        $produto = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque`"); //WHERE id = $idProduto
                                        $produto->execute();
                                        $produto = $produto->fetch();
                                        $produtoImagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens`");
                                        $produtoImagem->execute();
                                        $produtoImagem = $produtoImagem->fetch();
                                        $valor = $value * $produto['preco'];
                                        $total+=$valor;
                                ?>
                                <tr>
                                    <td><img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $produtoImagem['imagem']; ?>" /></td>
                                    <td><a><?php echo $produto['nome']; ?></a></td>
                                    <td><a><?php echo $value; ?></a></td>
                                    <td><a>R$<?php echo Painel::convertMoney($valor); ?></a></td>
                                    <td><a><i class="ri-close-fill removeProduct"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!--cardBody-->
                    <div class="cardFooter grid-two">
                        <div class="cartTotal">
                            <p>Total:</p>
                            <p class="priceDefault"><span>$<?php echo Painel::convertMoney($total); ?></span></p>
                        </div><!--cartTotal-->
                        <div class="methodsPayments itemsFlex alignEnd justEnd">
                            <i class="ri-visa-line"></i>
                            <i class="ri-mastercard-fill"></i>
                            <i class="ri-paypal-fill"></i>
                        </div><!--methodsPayments-->
                    </div><!--cardFooter-->
                </div><!--card-->
            </div><!--col-->
            <div class="col">
                <div class="card marginSideDefault">
                    <div class="formInternalPayment">
                        <form>
                            <input type="text" placeholder="Nome Completo" />
                            <input type="email" placeholder="Endereço de Email" />
                            <input type="text" placeholder="Número de Telefone" />
                            <select>
                                <option>Mastercard</option>
                                <option>Visa</option>
                            </select>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            <a class="button" href="<?php echo INCLUDE_PATH ?>finalizar">Comprar</a>
                        </form>
                    </div><!--formInternalPayment-->
                </div><!--card-->
           </div><!--col-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--cardContent-->



<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
