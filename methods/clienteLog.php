<?php

    session_start();
    include "include_dao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $clienteDAO = new ClienteDAO();

    if(empty($dados['email'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo usuário</div>"];
    } else if(empty($dados['senha'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo senha</div>"];
    } else {

        $temEmail = $clienteDAO->procuraLogin($dados['email']);

        if ($temEmail) {
            $rowCliente = $temEmail->fetch(PDO::FETCH_ASSOC);
            if ($dados['senha'] === $rowCliente['senha']) {

                $_SESSION['cod'] = $rowCliente['cod'];
                $_SESSION['nome'] = $rowCliente['nome'];

                $retorna = ['erro' => false, 'dados ' => $rowCliente];

            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: usuário ou senha inválidos</div>"];
            }
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: usuário ou senha inválidos</div>"];
        }

    }

    echo json_encode($retorna);

?>