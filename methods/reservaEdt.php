<?php

    include_once('include_dao.php');

    $reservaDAO = new ReservaDAO();
    $reserva = new Reserva();
    
    $cod = $_POST['cod'];
    $codCliente = $_POST['cliente_cod'];
    $codFuncionario = $_POST['funcionario_cod']; 
    $codQuarto = $_POST['rooms'];
    $dataEntrada = $_POST['checkin_date'];
    $dataSaida = $_POST['checkout_date'];
    $adulto = $_POST['adults'];
    $crianca = $_POST['children'];

    if(empty($cod)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: não foi possível alterar a Reserva</div>"];
    } else if(empty($codCliente)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: não foi possível alterar a Reserva</div>"];
    } else if(empty($codFuncionario)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: não foi possível alterar a Reserva</div>"];
    } else if(empty($codQuarto)){
        $retorna = ['erro' => true, 'msg' => "Erro: não foi possível alterar a Reserva</div>"];
    } else if(empty($dataEntrada)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo Data de Entrada</div>"];
    } else if(empty($dataSaida)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo Data de Saída</div>"];
    } else if(empty($adulto)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo Adultos</div>"];
    } else {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Validar</div>"];

        
      
        
       
            
            $reserva->setCod($cod);
            $reserva->setCliente_cod($codCliente); 
            $reserva->setFuncionario_cod($codFuncionario);
            $reserva->setQuarto_cod($codQuarto);
            $reserva->setDataEntrada($dataEntrada);
            $reserva->setDataSaida($dataSaida);
            $reserva->setAdulto($adulto);
            $reserva->setCrianca($crianca);

            $atualizar = $reservaDAO->atualizar($reserva);

            if ($atualizar) {
                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Reserva Editada com Sucesso!</div>"];
            } else {
                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Reserva não Editada com Sucesso!</div>"];
            }
                     
        

    }

    echo json_encode($retorna);

?>