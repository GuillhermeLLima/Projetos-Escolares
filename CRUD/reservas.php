<?php
include_once("../methods/include_dao.php");
include_once("../methods/quartoList.php");
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Reservas</title>
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
                            <li><a class="dropdown-item" href="quartos.php">Quartos</a></li>
                            <li><a class="dropdown-item active" href="reservas.php">Reservas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row-lg-12 row-md-8 row-sm-4 mt-4 mb-4 d-flex  align-items-center">
            <div class="col-lg-8 col-md-6 col-sm-4 d-flex me-auto justify-content-start">
                <h1>Reservas</h1>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-1 d-flex ms-auto justify-content-end">
                <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#cadReservaModal">Cadastrar</button>
            </div>
            <div id="msgAlertErroDel"></div>
            <span id="msgAlertDel"></span>

        </div>
        <form class="d-flex mb-3" id="pesquisarReservas" role="search">
            <input class="form-control me-2" type="search" id="pesquisarReserva" name="pesquisarReserva"
                placeholder="Pesquisar Reserva" aria-label="Search">
            <button class="btn btn-outline-success" id="pesquisar" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </form>
        <span id="msg"></span>
        <hr>
        <span class="listarReserva"></span>

    </div>





    <!-- Modal -->
    <div class="modal fade modal-lg" id="cadReservaModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="cadReservaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Novo Reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgErroCheck"></span>
                    <form id="cadReservaForm">
                
                        <input type="hidden" id="funcionario_cod" name="funcionario_cod" class="form-control">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="cliente_cod" class="font-weight-bold text-black">Código do Cliente</label>
                                <input type="number" id="cliente_cod" name="cliente_cod" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="checkin_date" class="font-weight-bold text-black">Data de Entrada</label>
                                <div class="field-icon-wrap">
                                    <input type="date" id="checkin_date" name="checkin_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="checkout_date" class="font-weight-bold text-black">Data de Saída</label>
                                <div class="field-icon-wrap">
                                    <input type="date" id="checkout_date" name="checkout_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="rooms" class="font-weight-bold text-black">Quartos</label>
                                    <div class="field-icon-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="rooms" id="rooms" class="form-control">
                                                <?php

                                                foreach ($listarQuartos as $listarQuarto) {
                                                    extract($listarQuarto);
                                                ?>
                                                    <option value="<?=$cod?>"><?=$nome?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="adults" class="font-weight-bold text-black">Adultos</label>
                                    <div class="field-icon-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="adults" id="adults" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="children" class="font-weight-bold text-black">Crianças</label>
                                    <div class="field-icon-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="children" id="children" class="form-control">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="edtReservaBtn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="visReservaModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="visReservaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalhes do Reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroVis"></div>
                    <span id="msgAlert"></span>
                    <div class="d-flex">
                        <div class="col">
                            <dl class="row">
                                <dt class="col-lg-4">Cod:</dt>
                                <dd class="col-lg-4"><span id="codReserva"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Cod Quarto:</dt>
                                <dd class="col-lg-4"><span id="codQuarto"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Cod Funcionario:</dt>
                                <dd class="col-lg-4"><span id="codFuncionario"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Cod Cliente:</dt>
                                <dd class="col-lg-4"><span id="codCliente"></span></dd>
                            </dl>
                        </div>
                        <div class="col">
                            <dl class="row">
                                <dt class="col-lg-4">Data de Entrada:</dt>
                                <dd class="col-lg-4"><span id="dataEntrada"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Data de Saída:</dt>
                                <dd class="col-lg-4"><span id="dataSaida"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Adultos:</dt>
                                <dd class="col-lg-4"><span id="adulto"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-lg-4">Crianças:</dt>
                                <dd class="col-lg-4"><span id="crianca"></span></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="edtReservaModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="edtReservaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroEdt"></div>
                    <span id="msgAlertEdt"></span>
                    
                    
                        <form id="edtReservaForm">
                            <input type="hidden" id="edtcodReserva" name="cod">
                            <input type="hidden" id="edtcodFuncionario" name="funcionario_cod" class="form-control">
                            <input type="hidden" id="edtcodCliente" name="cliente_cod" class="form-control">
                            <input type="hidden" id="edtcodQuarto" name="quarto_cod">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="checkin_date" class="font-weight-bold text-black">Data de Entrada</label>
                                    <div class="field-icon-wrap">
                                        <input type="date" id="edtdataEntrada" name="checkin_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="checkout_date" class="font-weight-bold text-black">Data de Saída</label>
                                    <div class="field-icon-wrap">
                                        <input type="date" id="edtdataSaida" name="checkout_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rooms" class="font-weight-bold text-black">Quartos</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="rooms" id="edtcodQuarto" class="form-control">

                                                    <?php

                                                    foreach ($listarQuartos as $listarQuarto) {
                                                        extract($listarQuarto);
                                                    ?>
                                                        <option value="<?=$cod?>"><?=$nome?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="adults" class="font-weight-bold text-black">Adultos</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="adults" id="edtadulto" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="children" class="font-weight-bold text-black">Crianças</label>
                                        <div class="field-icon-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="children" id="edtcrianca" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" id="edtReservaBtn" value="Cadastrar">
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="excReservaModalC" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="excReservaModalCLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroDel"></div>
                    <span id="msgAlertDel"></span>
                    <form id="excReservaC" enctype="multipart/form-data">
                        <input type="hidden" id="delcod" name="cod">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Tem Certeza que deseja excluir esse
                                    item?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning" id="" onclick="excReservaC()">Sim</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Não</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/reserva.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>