<?php

    include_once('include_dao.php');
    
    $cod = $_POST['cod'];
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
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Validar</div>"];


        $sql = 'UPDATE quarto SET preco = :preco, nome = :nome, descricao = :descricao WHERE cod = :cod';
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':preco',$preco); 
        $consulta->bindValue(':nome',$nome); 
        $consulta->bindValue(':descricao',$descricao);
        $consulta->bindValue(':cod',$cod);
        $consulta->execute(); 

        if(count($fotos['name']) > 0){
            $consulta2 = $conexao->prepare("DELETE FROM foto WHERE quarto_cod = :cod");
            $consulta2->bindValue(':cod', $cod);
            $consulta2->execute();

            for($cont = 0;$cont < count($fotos['name']); $cont++){

                $img = $fotos['name'][$cont];
                $destino = "imgQuartos/". $img;
                move_uploaded_file($fotos['tmp_name'][$cont], $destino);
                

                $stmt = $conexao->prepare("INSERT INTO foto (quarto_cod, imagem) VALUES (:quarto_cod, :imagem)");
                $stmt->bindParam(':quarto_cod', $cod);
                $stmt->bindParam(':imagem', $img);
                

                if ($stmt->execute()) {
                    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success mt-4 mb-0' role='alert'>Quarto cadastrado com sucesso</div>"];
                } else {
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger mt-4 mb-0' role='alert'>Erro: Quarto não cadastrado com sucesso</div>"];
                }
            }      
        }
    }

    echo json_encode($retorna);

?>