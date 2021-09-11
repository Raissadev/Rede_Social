<?php 
    if(isset($_GET['deletar'])){
        //Queremos deletar algum produto
        $id = (int)$_GET['deletar'];
        $imagens = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes` WHERE id = $id");
        $imagens->execute();
        $imagens = $imagens->fetchAll();
        MySql::conectar()->exec("DELETE FROM `tb_admin.clientes` WHERE id = $id");
        Painel::alert('sucesso','O cliente foi deletado com sucesso');
    }
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage grid-5x5 w100">
			<h2>Gerenciar Clientes</h2>
      <form method="post" class="items-flex w100 formSearchClient">
					<input class="w100" type="search" placeholder="Procure um cliente..." name="busca" />
          <input type="submit" name="acao" value="Buscar" />
			</form>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="clients headerCardDefault">
  <div class="wrap">
    <div class="row grid-three gridOneMobile">
      <?php 
        $query = "";
        if(isset($_POST['acao'])){
          $busca = $_POST['busca'];
          $query = " WHERE nome Like '%$busca%' OR email Like '%$busca%'";
        }
        $clientes = MySql::conectar()->prepare("SELECT * FROM `tb_admin.clientes` $query");
        $clientes->execute();
        $clientes = $clientes->fetchAll();
        if(isset($_POST['acao'])){
        echo '<div class="box-alert sucesso boxResult" id="boxResult"><p>Foram encontrados '.count($clientes).' resultado(s)</p></div>';
        }
        foreach($clientes as $value){
      ?>
      <div class="boxClient card">
        <div class="boxHeader headerCard grid-5x5 gridMobile-3x7">
          <h2><?php echo $value['nome']?></h2>
          <div class="btnsAction items-flex">
            <a  href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $value['id'] ?>" item_id="<?php echo $value['id'];?>" class="btn edit"><i data-feather="edit"></i> Editar</a>
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-clientes?deletar=<?php echo $value['id'] ?>" class="btn delete" item_id="<?php echo $value['id'];?>"><i data-feather="trash-2"></i> Excluir</a>
          </div>
        </div><!--boxHeader-->
        <div class="boxBody bodyCard text-center">
          <?php 
              if($value['imagem'] == ''){
          ?>
              <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/myWallpaper.jpg" />
          <?php }else{ ?>
              <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/myWallpaper.jpg" />
          <?php } ?>
        </div><!--boxBody-->
        <div class="boxFooter">
          <p>Nome: <?php echo $value['nome']?></p>
          <p>Email: <?php echo $value['email']?></p>
          <p>Tipo: <?php echo $value['tipo']?></p>
          <?php if($value['tipo'] == 'fisico')
              echo '<p>CPF:'; 
            else
              echo '<p>CNPJ: ';
          ?>
          <?php echo $value['cpf_cnpj']?></p>
        </div><!--boxFooter-->
      </div><!--boxClient-->
      <?php } ?>
    </div><!--row-->
  </div><!--wrap-->
</section><!--clients-->