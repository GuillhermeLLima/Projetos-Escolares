<?php

    include_once("include_dao.php");

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $fotos = $_FILES['foto'];
    
    if (empty($nome) && empty($preco) && empty($descricao) && empty($fotos)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher todos os campos</div>"];
    } else if(empty($nome)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo nome</div>"];
    } else if(empty($preco)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo preço</div>"];
    } else if(empty($descricao)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo descrição</div>"];
    } else if(empty($fotos)) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo foto</div>"];
    } else {

            $stmt = $conexao->prepare("INSERT INTO quarto (nome, preco, descricao) VALUES (:nome, :preco, :descricao)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            
            $quartoCod = $conexao->lastInsertId();

            for($cont = 0;$cont < count($fotos['name']); $cont++){

                // if(!preg_match("/^image\/(jpeg|jpg|png|JPG|gif)$/", $fotos["type"])){
                //     $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Formato de imagem inválido</div>"];
                // }else{
                    $img = $fotos['name'][$cont];
                    $destino = "imgQuartos/". $img;
                    move_uploaded_file($fotos['tmp_name'][$cont], $destino);
                    $stmt = $conexao->prepare("INSERT INTO foto (quarto_cod, imagem) VALUES (:quarto_cod, :imagem)");
                    $stmt->bindParam(':quarto_cod', $quartoCod);
                    $stmt->bindParam(':imagem', $img);
                    
    
                    if ($stmt->execute()) {
                        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success mt-4 mb-0' role='alert'>Quarto cadastrado com sucesso</div>"];
                    } else {
                        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger mt-4 mb-0' role='alert'>Erro: Quarto não cadastrado com sucesso</div>"];
                    }
                // }

            }          

    }

    echo json_encode($retorna);

?>