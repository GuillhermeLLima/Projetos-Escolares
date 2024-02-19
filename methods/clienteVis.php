<?php

    include_once("include_dao.php");
    $clienteDAO = new ClienteDAO();

    $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($cod)) {

        $dados = $clienteDAO->listarUm($cod);

        // $dados = "casa: ". $cod;

        $retorna = ['erro' => false, 'dados' => $dados];

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum cliente encontrado</div>"];
    }

    echo json_encode($retorna);

?>