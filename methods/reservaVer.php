<?php

    $reservaDAO = new ReservaDAO();

    $dataEntrada = $_POST['checkin_date'];
    $dataSaida = $_POST['checkout_date'];
    $quarto = $_POST['rooms'];
    $adultos = $_POST['adults'];
    $criancas = $_POST['children'];

    $temReserva = $reservaDAO->procuraReserva($dataEntrada, $dataSaida, $quarto);

    if ($temReserva) {
        # code...
    }

?>