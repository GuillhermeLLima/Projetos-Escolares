<?php
include_once("../methods/include_dao.php");
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="shortcut icon" href="../favicon.png">
</head>

<body style="height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 80px;">
        <div class="container-fluid h-100">
            <a class="navbar-brand" href="#">OM Shanti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            CRUD Pages
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark">
                            <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="funcionarios.php">Funcionários</a></li>
                            <li><a class="dropdown-item" href="quartos.php">Quartos</a></li>
                            <li><a class="dropdown-item" href="reservas.php">Reservas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

        $cod = $_SESSION['cod'];

        include("../methods/conexao.php");
        $sql = 'SELECT * FROM funcionario WHERE cod = :cod';
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":cod",$cod);
        $consulta->execute();
        $funcionario = $consulta->fetch(PDO::FETCH_ASSOC);

        $nome = $funcionario['nome'];
        $email = $funcionario['email']; 
        $senha = $funcionario['senha'];
        $telefone = $funcionario['telefone'];
        $endereco = $funcionario['endereco'];
        $foto = $funcionario['foto'];
        echo"
        <div class='container mx-auto my-auto d-flex flex-column'>
            <dl class='row d-flex justify-content-center'>
                <div class='d-block' style='width: 300px;'><img src='../methods/imgFuncionarios/$foto' id='fotoFuncionario' class='img-thumbnail' alt=''></div>
            </dl>
            <dl class='row d-flex justify-content-center'>
                <dt class='col-lg-1 col-md-3 col-sm-3 d-flex justify-content-start'>Nome:</dt>
                <dd class='col-lg-2 col-md-3 col-sm-3 d-flex justify-content-end'><span id='nomeFuncionario'>$nome</span></dd>
            </dl>
            <dl class='row d-flex justify-content-center'>
                <dt class='col-lg-1 col-md-3 col-sm-3 d-flex justify-content-start'>E-mail:</dt>
                <dd class='col-lg-2 col-md-3 col-sm-3 d-flex justify-content-end'><span id='emailFuncionario'>$email</span></dd>
            </dl>
            <dl class='row d-flex justify-content-center'>
                <dt class='col-lg-1 col-md-3 col-sm-3 d-flex justify-content-start'>Senha:</dt>
                <dd class='col-lg-2 col-md-3 col-sm-3 d-flex justify-content-end'><span id='senhaFuncionario'>$senha</span></dd>
            </dl>
            <dl class='row d-flex justify-content-center'>
                <dt class='col-lg-1 col-md-3 col-sm-3 d-flex justify-content-start'>Endereço:</dt>
                <dd class='col-lg-2 col-md-3 col-sm-3 d-flex justify-content-end'><span id='enderecoFuncionario'>$endereco</span></dd>
            </dl>
            <dl class='row d-flex justify-content-center'>
                <dt class='col-lg-1 col-md-3 col-sm-3 d-flex justify-content-start'>Telefone:</dt>
                <dd class='col-lg-2 col-md-3 col-sm-3 d-flex justify-content-end'><span id='telefoneFuncionario'>$telefone</span></dd>
            </dl>
            <div class='row'>
                <a class=' d-flex justify-content-center' href='../methods/funcionarioSair.php'>Sair</a>
            </div>
        </div>"
    ?>

    

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="funcionario.js"></script>
</body>

</html>