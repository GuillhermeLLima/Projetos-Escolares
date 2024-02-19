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
    <title>CRUD Quartos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="shortcut icon" href="../favicon.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 80px;">
        <div class="container-fluid h-100">
            <a class="navbar-brand" href="nav.php">OM Shanti</a>
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
                            <li><a class="dropdown-item active" href="quartos.php">Quartos</a></li>
                            <li><a class="dropdown-item" href="reservas.php">Reservas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row-lg-12 row-md-8 row-sm-4 mt-4 mb-4 d-flex  align-items-center">
            <div class="col-lg-8 col-md-6 col-sm-4 d-flex me-auto justify-content-start">
                <h1>Quartos</h1>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-1 d-flex ms-auto justify-content-end">
                <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#cadQuartoModal">Cadastrar</button>
            </div>
            <div id="msgAlertErro"></div>
            <span id="msgAlert"></span>

        </div>
        <form class="d-flex mb-3" id="pesquisarQuartos" role="search">
            <input class="form-control me-2" type="search" id="pesquisarQuarto" name="pesquisarQuarto"
                placeholder="Pesquisar Quarto" aria-label="Search">
            <button class="btn btn-outline-success" id="pesquisar" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </form>
        <span id="msg"></span>
        <hr>
        <span class="listarQuarto"></span>

    </div>





    <!-- Modal -->
    <div class="modal fade modal-lg" id="cadQuartoModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="cadQuartoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Novo Quarto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroCad"></div>
                    <form id="cadQuartoForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col mb-3">
                                <label for="preco" class="col-form-label">Preço:</label>
                                <input type="number" step="any" class="form-control" id="preco" name="preco">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="descricao" class="col-form-label">Descrição:</label>
                                <input type="text" class="form-control" id="descricao" name="descricao">
                            </div>
                            <div class="col mb-3">
                                <label for="foto" class="col-form-label">Foto:</label>
                                <input type="file" class="form-control" id="foto" name="foto[]" multiple="multiple">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="cadQuartoBtn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="visQuartoModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="visQuartoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalhes do Quarto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroVis"></div>
                    <span id="msgAlert"></span>
                    <div class="d-flex">
                        <div class="col">
                            <dl class="row">
                                <dt class="col-sm-3">Cod:</dt>
                                <dd class="col-sm-3"><span id="codQuarto"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Nome:</dt>
                                <dd class="col-sm-3"><span id="nomeQuarto"></span></dd>
                            </dl>
                        </div>
                        <div class="col">
                            <dl class="row">
                                <dt class="col-sm-3">Preço:</dt>
                                <dd class="col-sm-3"><span id="precoQuarto"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Descrição:</dt>
                                <dd class="col-sm-3"><span id="descricaoQuarto"></span></dd>
                            </dl>
                        </div>
                    </div>
                    <dl class="row d-flex justify-content-center">
                        <dl class="col-sm-3">Foto:</dl>
                        <dd class="col-sm-9" style="width: 250px; height: 250px;"><span id="fotoQuarto"></span></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="edtQuartoModal" 
tabindex="-1" aria-labelledby="edtQuartoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Quarto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroEdt"></div>
                    <span id="msgAlertEdt"></span>
                    <form id="edtQuartoForm" enctype="multipart/form-data">
                        <input type="hidden" id="edtcod" name="cod">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="edtnome" name="nome">
                            </div>
                            <div class="col mb-3">
                                <label for="preco" class="col-form-label">Preço:</label>
                                <input type="number" step="any" class="form-control" id="edtpreco" name="preco">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="descricao" class="col-form-label">Descricão:</label>
                                <input type="text" class="form-control" id="edtdescricao" name="descricao"
                                    autocomplete="on">
                            </div>
                            <div class="col mb-3">
                                <label for="foto" class="col-form-label">Foto:</label>
                                <div id="displayFotoE"></div>
                                <input type="file" class="form-control" id="edtfoto" name="foto[]" multiple="multiple">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-warning" id="edtQuartoBtn" value="Editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="excQuartoModalC" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="excQuartoModalCLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroDel"></div>
                    <span id="msgAlertDel"></span>
                    <form id="excQuartoC" enctype="multipart/form-data">
                        <input type="hidden" id="delcod" name="cod">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Tem Certeza que deseja excluir esse
                                    item?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning" id="" onclick="excQuartoC()">Sim</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Não</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/quarto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>