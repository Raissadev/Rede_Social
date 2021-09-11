<?php 
    sleep(2);
    include('../../incluedeConstantes.php');

    $data['sucesso'] = true;
    $data['mensagem'] = "";

    if(Painel::logado() == false ){
       die("Você não está logado!");
    }

    if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'cadastrar_cliente'){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }
    $imagem == "";
    if($nome == "" || $email == "" || $tipo == ""){
        $data['sucesso'] = false;
        $data['mensagem']= "Atenção: campos vazios não são permitidos!";
    }
    if(isset($_FILES['imagem'])){
        if(Painel::imagemValida($_FILES['imagem'])){
        $imagem = $_FILES['imagem'];
    }else{
        $imagem == "";
        $data['sucesso'] = false;
        $data['mensagem'] = "Você está tentando realizar o upload com uma imagem inválida.";
    }
}
    if($data['sucesso']){
        if(is_array($imagem))
        $imagem = Painel::uploadFile($imagem);
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.clientes` VALUES (null,?,?,?,?,?)");
        $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
        $sql->execute(array($nome,$email,$tipo,$dadoFinal,$imagem));
        //Tudo okey, só cadastrar.
        $data['mensagem'] = "O cliente foi cadastrado com sucesso!";
    }
}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'atualizar_cliente'){
    sleep(2);
    $data['sucesso'] = true;
    $data['mensagem'] = "O cliente foi editado com sucesso!";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo_cliente'];
    $imagem = $_POST['imagem_original'];
    $cpf = '';
    $cnpj = '';
    if($tipo == 'fisico'){
        $cpf = $_POST['cpf'];
    }else if($tipo == 'juridico'){
        $cnpj = $_POST['cnpj'];
    }

    if($nome == '' || $email == ''){
        $data['sucesso'] = false;
        $data['mensagem'] = "Campos vazios não são permitidos!";
    }

    if(isset($_FILES['imagem'])){
        if(Painel::imagemValida($_FILES['imagem'])){
            @unlink('../uploads/'.$imagem);
            $imagem = $_FILES['imagem'];
        }else{
            $data['sucesso'] = false;
            $data['mensagem'] = "Você está tentando realizar o upload com uma imagem inválida.";
        }
    }

    if($data['sucesso']){
        if(is_array($imagem)){
            $imagem = Painel::uploadFile($imagem);
        }

        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.clientes` SET nome = ?, email = ?, tipo = ?, cpf_cnpj = ?, imagem = ? WHERE id = $id");
        $dadoFinal = ($cpf == '') ? $cnpj : $cpf;
        $sql->execute(array($nome, $email, $tipo, $dadoFinal, $imagem));

        $data['mensagem'] = "O cliente foi atualizado com sucesso!";
    }
}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'deletar_cliente'){
    $sql = MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.clientes` WHERE id = $id");
    $sql->execute();
    $imagem = $sql->fetch()['imagem'];
    @unlink('../uploads/'.$imagem);
    MySql::conectar()->exec("DELETE FROM `tb_admin.clientes` WHERE id = $id");
    MySql::conectar()->exec("DELETE FROM `tb_admin.financeiro` WHERE cliente_id = $id");
}else if(isset($_POST['tipo_acao']) && $_POST['tipo_acao'] == 'ordenar_empreendimentos'){
    $ids = $_POST['item'];

    $i = 1;
    foreach($ids as $key => $value){
        echo $value;
        MySql::conectar()->exec("UPDATE `tb_admin.empreendimentos` SET order_id = $i WHERE id = $value");
        $i++;
    }
}

    die(json_encode($data)); 


?>