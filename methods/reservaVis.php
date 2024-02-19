<?php

    include_once("include_dao.php");
    $reservaDAO = new ReservaDAO();

    $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($cod)) {

        $dados = $reservaDAO->listarUm($cod);

        // $dados = "casa: ". $cod;

        $retorna = ['erro' => false, 'dados' => $dados];

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma reserva encontrada</div>"];
    }

    echo json_encode($retorna);

?>