<?php

    session_start();
    include_once("include_dao.php");
    $reservaDAO = new ReservaDAO();
    $reserva = new Reserva();


    $sql = 'SELECT cod FROM funcionario LIMIT 1';
    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    while($cods = $consulta->fetch(PDO::FETCH_ASSOC)){

        $cod = $cods;
    }

    $clienteCod = $_SESSION['cod'];
    $quartoCod = $_POST['rooms'];
    $funcionarioCod = $cod['cod'];
    $dataEntrada = $_POST['checkin_date'];
    $dataSaida = $_POST['checkout_date'];
    $adulto = $_POST['adults'];
    $crianca = $_POST['children'];

    if(empty($clienteCod) && empty($quartoCod) && empty($funcionarioCod) && empty($dataEntrada) && empty($dataSaida) && empty($adulto) && empty($crianca)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais trade</div>"];
    } else if(empty($clienteCod)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais trade</div>"];
    } else if(empty($quartoCod)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais trade</div>"];
    } else if(empty($funcionarioCod)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais trade</div>"];
    } else if(empty($dataEntrada)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo Data de Entrada</div>"];
    } else if(empty($dataSaida)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo Data de Saída</div>"];
    } else if(empty($adulto)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher a Quantidade de Adultos</div>"];
    } else {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Validar</div>"];

        
        $reserva->setCliente_cod($clienteCod);
        $reserva->setFuncionario_cod($funcionarioCod);
        $reserva->setQuarto_cod($quartoCod);
        $reserva->setDataEntrada($dataEntrada);
        $reserva->setDataSaida($dataSaida);
        
        $reserva->setAdulto($adulto);
        $reserva->setCrianca($crianca); 

        $reservar = $reservaDAO->inserir($reserva);

    }

    echo json_encode($retorna);

?>