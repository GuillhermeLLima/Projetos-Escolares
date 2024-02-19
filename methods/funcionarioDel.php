<?php

    include_once("include_dao.php");
    $funcionarioDAO = new FuncionarioDAO();

    $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($cod)) {

        $dados = $funcionarioDAO->deletar($cod);

        // $dados = "casa: ". $cod;
        if ($dados) {
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Funcionário excluído com sucesso</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Funcionário não excluído com sucesso</div>"];
        }

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum Funcionário encontrado</div>"];
    }

    echo json_encode($retorna);

?>