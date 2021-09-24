<section class="loginContent itemsFlex alignCenter justCenter">
    <div class="wrap">
        <div class="row">
            <div class="card">
                <div class="cardHeader textCenter marginDownSmall">
                    <h4>Efetuar cadastro</h4>
                </div><!--cardHeader-->
                <form method="post" enctype="multipart/form-data" class="textCenter">
                    <div class="formGroup">
                        <input type="text" name="nome" placeholder="Nome completo" class="w100" />
                        <input type="email" name="email" placeholder="Endereço de email" class="w100" />
                        <input type="password" name="senha" placeholder="Senha..." class="w100" />
                    </div><!--formGroup-->
                    <div class="formGroup marginDownSmall">
                        <input class="inputFile" type="file" name="imagem" />
                    </div><!--formGroup-->
                    <div class="formGroup marginDownSmall">
                        <input type="submit" name="cadastro" value="Cadastrar" class="center w30" />
                    </div><!--formGroup-->
                    <div class="formGroup itemsFlex alignCenter justEnd">
                        <p>Já possui uma conta? <a href="<?php echo INCLUDE_PATH; ?>login">Faça login.</a></p>
                    </div><!--formGroup-->
                </form>
            </div><!--card-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--loginContent-->