<?php
	include('../config.php');
	$data = array();
	$data['sucesso'] = true;
	$data = "";

	
	if(isset($_POST['slug_empreendimento'])){
		//Estamos na página de um empreendimento específico.
		$preco_min = Painel::formatarMoedaBd(str_replace('R$ ','',$_POST['preco_min']));
		if($preco_min === ''){
			$preco_min = 0;
		}
		$preco_max = Painel::formatarMoedaBd(str_replace('R$ ','',$_POST['preco_max']));
		if($preco_max === ''){
			$preco_max = 0;
		}
		$area_min = $_POST['area_minima'];
		if($area_min === ''){
			$area_min = 0;
		}
		$area_max = $_POST['area_maxima'];
		if($area_max === ''){
			$area_max = 0;
		}
		$slug_empreendimento = $_POST['slug_empreendimento'];
		$nome_imovel = $_POST['nome_imovel'];
		$infoEmpreendimento = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` WHERE slug = ?");
		$infoEmpreendimento->execute(array($slug_empreendimento));
		$infoEmpreendimento = $infoEmpreendimento->fetch();
		$sql = \MySql::conectar()->prepare("SELECT `tb_admin.imoveis`.* FROM `tb_admin.imoveis` WHERE (preco >= ? AND 
			preco <= ?) AND (area >= ? AND area <= ?) AND nome LIKE ? AND empreend_id = ?");
		$sql->execute(array($preco_min,$preco_max,$area_min,$area_max,"%$nome_imovel%",$infoEmpreendimento['id']));
		$imoveis = $sql->fetchAll();

		$data.='<h2 class="title-busca">Listando <b>'.count($imoveis).' imóveis</b> em '.$infoEmpreendimento['nome'].'</h2>';
		
		foreach ($imoveis as $key => $value) {
			$imagem = \MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.imagens_imoveis` WHERE imovel_id = $value[id]");
			$imagem->execute();
			$imagem = $imagem->fetch()['imagem'];
			$data.='<div class="cardInfo w100 text-center w100Mobile">
						<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$imagem.'" />
						<h5 class="titleFeatureTwo">'.$value['nome'].'</h5>
						<p class="textFeatureThree">Área: '.$value['nome'].' ?> | Preço: R$'.\Painel::convertMoney($value['preco']).'</p>
						<a class="linkBtn" href="'.INCLUDE_PATH.'imovel?id='.$value['id'].'">Ver mais</a>
					</div><!--cardInfo-->';
		}
		
	}else{
		//Estamos na página de um empreendimento específico.
		$preco_min = Painel::formatarMoedaBd(str_replace('R$ ','',$_POST['preco_min']));
		if($preco_min === ''){
			$preco_min = 0;
		}
		$preco_max = Painel::formatarMoedaBd(str_replace('R$ ','',$_POST['preco_max']));
		if($preco_max === ''){
			$preco_max = 0;
		}
		$area_min = $_POST['area_minima'];
		if($area_min === ''){
			$area_min = 0;
		}
		$area_max = $_POST['area_maxima'];
		if($area_max === ''){
			$area_max = 0;
		}
		$nome_imovel = $_POST['nome_imovel'];
		$sql = \MySql::conectar()->prepare("SELECT `tb_admin.imoveis`.* FROM `tb_admin.imoveis` WHERE `tb_admin.imoveis`.`preco` >= ? AND 
			`tb_admin.imoveis`.`preco` <= ? AND `tb_admin.imoveis`.`area` >= ? AND `tb_admin.imoveis`.`area` <= ? AND `tb_admin.imoveis`.`nome` LIKE ?");
		$sql->execute(array($preco_min,$preco_max,$area_min,$area_max,"%$nome_imovel%"));
		$imoveis = $sql->fetchAll();
		
		$data.='<h2 class="title-busca">Listando <b>'.count($imoveis).' imóveis</b></h2>';
		
		foreach ($imoveis as $key => $value) {
			$imagem = \MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.imagens_imoveis` WHERE imovel_id = $value[id]");
			$imagem->execute();
			$imagem = $imagem->fetch()['imagem'];
			$data.='
			<div class="cardInfo w100 text-center w100Mobile">
				<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$imagem.'" />
				<h5 class="titleFeatureTwo">'.$value['nome'].'</h5>
				<p class="textFeatureThree">Área: '.$value['nome'].' ?> | Preço: R$'.\Painel::convertMoney($value['preco']).'</p>
				<a class="linkBtn" href="'.INCLUDE_PATH.'imovel?id='.$value['id'].'">Ver mais</a>
			</div><!--cardInfo-->';
			
		}
		
	}

	echo $data;



?>

