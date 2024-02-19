<?php

    session_start();
    include "include_dao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $funcionarioDAO = new FuncionarioDAO();

    if(empty($dados['email'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo usuário</div>"];
    } else if(empty($dados['senha'])){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo senha</div>"];
    } else {

        $temEmail = $funcionarioDAO->procuraLogin($dados['email']);

        if ($temEmail) {
            $rowFuncionario = $temEmail->fetch(PDO::FETCH_ASSOC);
            if ($dados['senha'] === $rowFuncionario['senha']) {

                $_SESSION['cod'] = $rowFuncionario['cod'];
                $_SESSION['nome'] = $rowFuncionario['nome'];

                $retorna = ['erro' => false, 'dados ' => $rowFuncionario];
            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: usuário ou senha inválidos</div>"];
            }
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: usuário ou senha inválidos</div>"];
        }

    }

    echo json_encode($retorna);

?>