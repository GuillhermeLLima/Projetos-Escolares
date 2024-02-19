<?php

    include_once("include_dao.php");
    $reservaDAO = new ReservaDAO();

    $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($cod)) {

        $dados = $reservaDAO->deletar($cod);

        // $dados = "casa: ". $cod;
        if ($dados) {
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Cliente excluído com sucesso</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Cliente não excluído com sucesso</div>"];

            
        }

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum cliente encontrado</div>"];
    }

    echo json_encode($retorna);

?>