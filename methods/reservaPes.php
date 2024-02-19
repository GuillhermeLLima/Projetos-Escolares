<?php

include_once("include_dao.php");
include("conexao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['pesquisarReserva'])) {

    $sql = "SELECT * FROM reserva WHERE cliente_cod LIKE :cliente_cod";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":cliente_cod", '%' . $dados['pesquisarReserva'] . '%');
    $consulta->execute();

    $dadosPesq = "<div class='row bg-body-tertiary rounded p-2'><div class='col-lg mx-auto'><div class='table-responsive'><table class='table table-sm'><thead><tr scope='row'><th>COD</th><th>COD Cliente</th><th>Data de Entrada</th><th>Data de Saída</th><th class='d-flex justify-content-end'>Ações</th></tr></thead><tbody class='table-group-divider'>";

    if (($consulta) && ($consulta->rowCount() != 0)) {

        $listarTodos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listarTodos as $listarDado) {
            extract($listarDado);

            $dadosPesq .= "<tr><th scope='row'>$cod</th><td>$cliente_cod</td><td>$dataEntrada</td><td>$dataSaida</td><td class='d-flex justify-content-end'><button class='btn btn-outline-primary mx-1' onclick='visReserva($cod)'>View <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-lines-fill' viewBox='0 0 16 16'>
                    <path d='M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z'/>
                  </svg></button><button class='btn btn-outline-warning mx-1' onclick='edtReservaDados($cod)'>Edit <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
                    <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z'/>
                  </svg></button><button class='btn btn-outline-danger mx-1' onclick='excReserva($cod)'>Delete <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                  </svg></button></td></tr>";
        }

        $dadosPesq .= "</tbody></table></div></div></div>";



        $resposta = ['erro' => false, 'dados' => $dadosPesq];

    } else {
        $resposta = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Sem resultado para a Pesquisa!</div>"];
    }

} else {
    $resposta = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Sem resultado para a Pesquisa!</div>"];
}

echo json_encode($resposta);

?>