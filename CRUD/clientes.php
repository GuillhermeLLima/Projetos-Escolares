<?php
session_start();
include_once("../methods/include_dao.php");
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
                            <li><a class="dropdown-item active" href="#">Clientes</a></li>
                            <li><a class="dropdown-item" href="funcionarios.php">Funcionários</a></li>
                            <li><a class="dropdown-item" href="quartos.php">Quartos</a></li>
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
                <h1>Clientes</h1>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-1 d-flex ms-auto justify-content-end">
                <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#cadClienteModal">Cadastrar</button>
            </div>
            <div id="msgAlertErro"></div>
            <span id="msgAlert"></span>

        </div>
        <form class="d-flex mb-3" id="pesquisarClientes" role="search">
            <input class="form-control me-2" type="search" id="pesquisarCliente" name="pesquisarCliente"
                placeholder="Pesquisar Cliente" aria-label="Search">
            <button class="btn btn-outline-success" id="pesquisar" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </form>
        <span id="msg"></span>
        <hr>
        <span class="listarCliente"></span>

    </div>





    <!-- Modal -->
    
    <div class="modal fade modal-lg" id="cadClienteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="cadClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar Novo Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroCad"></div>

                    <form id="cadClienteForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col mb-3">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="senha" class="col-form-label">Senha:</label>
                                <input type="password" class="form-control" id="senha" name="senha" autocomplete="on">
                            </div>
                            <div class="col mb-3">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="number" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="endereco" class="col-form-label">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco">
                            </div>
                            <div class="col mb-3">
                                <label for="foto" class="col-form-label">Foto:</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="cadClienteBtn" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="visClienteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="visClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalhes do Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroVis"></div>
                    <span id="msgAlert"></span>
                    <div class="d-flex">
                        <div class="col">
                            <dl class="row">
                                <dt class="col-sm-3">Cod:</dt>
                                <dd class="col-sm-3"><span id="codCliente"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Nome:</dt>
                                <dd class="col-sm-3"><span id="nomeCliente"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">E-mail:</dt>
                                <dd class="col-sm-3"><span id="emailCliente"></span></dd>
                            </dl>
                        </div>
                        <div class="col">
                            <dl class="row">
                                <dt class="col-sm-3">Senha:</dt>
                                <dd class="col-sm-3"><span id="senhaCliente"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Endereço:</dt>
                                <dd class="col-sm-3"><span id="enderecoCliente"></span></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3">Telefone:</dt>
                                <dd class="col-sm-3"><span id="telefoneCliente"></span></dd>
                            </dl>
                        </div>
                    </div>

                    <dl class="row d-flex justify-content-center">
                        <dl class="col-sm-3">Foto:</dl>
                        <dd class="col-sm-9" style="width: 300px; height: 300px;"><img src="" id="fotoCliente"
                                class="rounded img-fluid img-thumbnail" alt=""></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="edtClienteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="edtClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroEdt"></div>
                    <span id="msgAlertEdt"></span>
                    <form id="edtClienteForm" enctype="multipart/form-data">
                        <input type="hidden" id="edtcod" name="cod">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="edtnome" name="nome">
                            </div>
                            <div class="col mb-3">
                                <label for="email" class="col-form-label">E-mail:</label>
                                <input type="email" class="form-control" id="edtemail" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="senha" class="col-form-label">Senha:</label>
                                <input type="password" class="form-control" id="edtsenha" name="senha"
                                    autocomplete="on">
                            </div>
                            <div class="col mb-3">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="number" class="form-control" id="edttelefone" name="telefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="endereco" class="col-form-label">Endereço:</label>
                                <input type="text" class="form-control" id="edtendereco" name="endereco">
                            </div>
                            <div class="col mb-3">
                                <label for="foto" class="col-form-label">Foto:</label>
                                <div style="width:200px; height: 200px"><img src="" id="displayFotoE"
                                        class="rounded img-fluid img-thumbnail" alt=""></div>
                                <input type="file" class="form-control" id="edtfoto" name="foto">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-warning" id="edtClienteBtn" value="Editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="excClienteModalC" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="excClienteModalCLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Excluir</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="msgAlertErroDel"></div>
                    <span id="msgAlertDel"></span>
                    <form id="excClienteC" enctype="multipart/form-data">
                        <input type="hidden" id="delcod" name="cod">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="col-form-label">Tem Certeza que deseja excluir esse
                                    item?</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning" id="" onclick="excClienteC()">Sim</button>
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Não</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>

</html>