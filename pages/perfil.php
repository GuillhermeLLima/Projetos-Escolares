<!-- /*
* Template Name: LuxuryHotel
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->

<?php

session_start();
ob_start();

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="../favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link href="https://www.dafontfree.net/embed/cGVudW1icmEtZmxhcmUtc3RkLWxpZ2h0JmRhdGEvNDgvcC80ODIzMy9QZW51bWJyYUZsYXJlU3RkLUxpZ2h0Lm90Zg" rel="stylesheet" type="text/css"/>


  <link rel="stylesheet" href="../css/vendor/icomoon/style.css">
  <link rel="stylesheet" href="../css/vendor/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/vendor/aos.css">
  <link rel="stylesheet" href="../css/vendor/animate.min.css">
  <link rel="stylesheet" href="../css/vendor/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <style>
    body{
    
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
  </style>


  <!-- Theme Style -->
  <link rel="stylesheet" href="../css/style.css">

  <title>OM Shanti</title>
</head>

<body>

  <div id="untree_co--overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Carregando...</span>
    </div>
  </div>

  <nav class="untree_co--site-mobile-menu">
    <div class="close-wrap d-flex">
      <a href="#" class="d-flex ml-auto js-menu-toggle">
        <span class="close-label">Fechar</span>
        <div class="close-times">
          <span class="bar1"></span>
          <span class="bar2"></span>
        </div>
      </a>
    </div>
    <div class="site-mobile-inner"></div>
  </nav>


  <div class="untree_co--site-wrap">

  <nav class="untree_co--site-nav js-sticky-nav">
        <div class="container d-flex align-items-center">
          <div class="logo-wrap">
            <a href="../index.php" class="untree_co--site-logo">OM Shanti</a>
          </div>
          <div class="site-nav-ul-wrap text-center d-none d-lg-block">
            <ul class="site-nav-ul js-clone-nav">
              <li><a href="../index.php">Home</a></li>
              <li><a href="reserva.php">Reserva</a></li>
              <li><a href="amenities.php">Serviços</a></li>
              <li><a href="rooms.php">Quartos</a></li>
            </ul>
          </div>
          <div class="icons-wrap text-md-right">

            <ul class="icons-top d-none d-lg-block">
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href="https://www.instagram.com/omshanti_hotel/"><span class="icon-instagram"></span></a>
              </li>
              <li class="ml-5">
                <a href="..methods/validar.php"><span class="icon-person"></span></a>
              </li>
            </ul>

            <!-- Mobile Toggle -->
            <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
          </div>
        </div>
      </nav>

    <main class="untree_co--site-main">
        
        <div class="untree_co--site-hero inner-page" style="background-image: url('../images/bem.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 text-center">
                <div class="site-hero-contents" data-aos="fade-up">
                  <h1 class="hero-heading text-white">Bem Vindo</h1>
                </div>
              </div>
            </div>
          </div>
        </div>

      <section class="section">

      <?php

        if (isset($_SESSION['cod']) && (isset($_SESSION['nome']))) {
          include("../methods/include_dao.php");
          $query_usuario = "SELECT * FROM cliente WHERE cod = :cod LIMIT 1";
          $result_usuario = $conexao->prepare($query_usuario);
          $result_usuario->bindParam(":cod", $_SESSION['cod'], PDO::PARAM_INT);
          $result_usuario->execute();

          if (($result_usuario) && ($result_usuario->rowCount() != 0)) {
            $row_usuario =  $result_usuario->fetch(PDO::FETCH_ASSOC);
            // var_dump($row_usuario);

      ?>

<div class="container emp-profile border shadow-lg">  
          <div class="row">
              <div class="col-md-4">
                  <div class="profile-img justify-content-center">
                      <img src="../methods/imgClientes/<?=$row_usuario['foto']?>" alt=""/>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="profile-head">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reservas</a>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-2">
                  <button type="button" class="btn btn-lg d-grid gap-2 mx-auto rounded link-dark" onclick="edtClienteDados(<?=$row_usuario['cod']?>)">Editar Perfil</button>
              </div>         
          </div>
          <div class="row">
              <div class="col-md-4">
                
                  <button type="button" class="btn btn-lg d-grid gap-2 col-6 mx-auto my-5 rounded"><a href='../methods/clienteSair.php' class="link-dark">Sair</a></button>
                
              </div>
              <div class="col-md-8">
                  <div class="tab-content profile-tab" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                              <div class="col-md-6">
                                  <label>User Cod</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?=$row_usuario['cod']?></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Nome</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?=$row_usuario['nome']?></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?=$row_usuario['email']?></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Telefone</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?=$row_usuario['telefone']?></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Endereço</label>
                              </div>
                              <div class="col-md-6">
                                  <p><?=$row_usuario['endereco']?></p>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

      <?php

            $query_reserva = "SELECT * FROM reserva WHERE cliente_cod = :cliente_cod";
            $result_reserva = $conexao->prepare($query_reserva);
            $result_reserva->bindParam(":cliente_cod", $_SESSION['cod'], PDO::PARAM_INT);
            $result_reserva->execute();

            if (($result_reserva) && ($result_reserva->rowCount() != 0)) {
              $row_reserva =  $result_reserva->fetchAll(PDO::FETCH_ASSOC);

              foreach($row_reserva as $reserva){
                extract($reserva);

                $query_quarto = "SELECT * FROM quarto WHERE cod = :cod";
                $result_quarto = $conexao->prepare($query_quarto);
                $result_quarto->bindParam(":cod", $quarto_cod, PDO::PARAM_INT);
                $result_quarto->execute();

                if (($result_quarto) && ($result_quarto->rowCount() != 0)) {
                  $row_quarto =  $result_quarto->fetch(PDO::FETCH_ASSOC);

      ?>


                
                    <div class="row">
                        <div class="col-md-6">
                            <label><?=$dataEntrada?> -</label>
                            <label> <?=$dataSaida?></label>
                        </div>
                        <div class="col-md-6">
                            <p><?=$row_quarto['nome']?></p>
                        </div>
                    </div>
                      
      <?php
                }
              }
            }

          } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Necessário realizar o login para acessar a página!</div>";
            header("location: ../login.php");
          }
            
        } else {
          $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Necessário realizar o login para acessar a página!</div>";
          header("location: ../login.php");
        }

      ?>
                      </div>
                  </div>
              </div>
          </div>           
      </div>

      </section>


      <div class="untree_co--site-section py-5 bg-body-darker cta">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
            <h3 class="m-0 p-0">Se você tiver uma solicitação especial. Contate-nos.<a href="tel://+5588981703525">+55 (88) 98170 3525</a></h3>
            </div>
          </div>
        </div>
      </div>


    </div>
    <footer class="untree_co--site-footer">

        <div class="container">
          <div class="row">
            <div class="col-md-4 pr-md-5">
              <h3>Sobre nós</h3>
              <p>Somos uma equipe apaixonada pela arte de receber bem e estamos empenhados em proporcionar uma estadia memorável aos nossos hóspedes.</p>
            </div>
            <div class="col-md-8 ml-auto">
              <div class="row">
                <div class="col-md-3">
                  <h3>Navegação</h3>
                  <ul class="list-unstyled">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#perfil">Perfil</a></li>
                  </ul>
                </div>
                <div class="col-md-9 ml-auto">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <h3>Endereço</h3>
                      <address>Kabupaten Karangasem, Bali 80871 <br> Indonésia</address>
                    </div>
                    <div class="col-md-6">
                      <h3>Telefone</h3>
                      <p>
                        <a href="#">+55 (88) 98170 3525</a> <br>
                        <a href="#">+55 (85) 99160 4139</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-5 pt-5 align-items-center">
            <div class="col-md-6 text-md-left">
              <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="index.php">OM Shanti</a>. Todos os Direitos Reservados. Design by <a href="https://untree.co/" target="_blank" class="text-primary">Untree.co</a>
              </p>
            <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
            </div>
            <div class="col-md-6 text-md-right">
            <ul class="row">
                <li>
                  <a href="../CRUD/login.php" target="_blank" class="text-primary"><span>Gerenciar</span></a>
                </li>
              </ul>

            </div>
          </div>
        </div>
        
      </footer>
  </div>

  <div class="modal fade" id="edtClienteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="edtClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div id="msgAlertErro"></div>
                <span id="msgAlert"></span>
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


  <!-- Search -->

  <script src="../js/vendor/jquery-3.3.1.min.js"></script>
  <script src="../js/vendor/popper.min.js"></script>
  <script src="../js/vendor/bootstrap.min.js"></script>

  <script src="../js/vendor/owl.carousel.min.js"></script>

  <script src="../js/vendor/jarallax.min.js"></script>
  <script src="../js/vendor/jarallax-element.min.js"></script>
  <script sr c="../js/vendor/ofi.min.js"></script>

  <script src="../js/vendor/aos.js"></script>

  <script src="../js/vendor/jquery.lettering.js"></script>
  <script src="../js/vendor/jquery.sticky.js"></script>

  <script src="../js/vendor/TweenMax.min.js"></script>
  <script src="../js/vendor/ScrollMagic.min.js"></script>
  <script src="../js/vendor/scrollmagic.animation.gsap.min.js"></script>
  <script src="../js/vendor/debug.addIndicators.min.js"></script>


  <script src="../js/main.js"></script>
  <script>
    const msgAlertErro = document.getElementById("msgAlertErro");
    const msgAlert = document.getElementById("msgAlert");
    const edtForm = document.getElementById("edtClienteForm");

    const msgAlertErroEdt = document.getElementById("msgAlertErroEdt");
    const msgAlertEdt = document.getElementById("msgAlertEdt");


    async function edtClienteDados(cod) {
    const dados = await fetch("../methods/clienteVis.php?cod=" + cod);
    const resposta = await dados.json();

    console.log(resposta);

    if (resposta["erro"]) {
        msgAlertErroEdt.innerHTML = resposta["msg"];
    } else {
        const edtModal = new bootstrap.Modal(
            document.getElementById("edtClienteModal")
        );
        edtModal.show();

        document.getElementById("edtcod").value = resposta["dados"].cod;
        document.getElementById("edtnome").value = resposta["dados"].nome;
        document.getElementById("edtemail").value = resposta["dados"].email;
        document.getElementById("edtsenha").value = resposta["dados"].senha;
        document.getElementById("edtendereco").value =
            resposta["dados"].endereco;
        document.getElementById("edttelefone").value =
            resposta["dados"].telefone;
        document.getElementById("displayFotoE").src =
            "../methods/imgClientes/" + resposta["dados"].foto;
    }
}

edtForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(edtForm);
    console.log(dadosForm);

    // for (let dados of dadosForm.entries()) {
    //     console.log(dados[0] + "," + dados[1]);
    // }

    const dados = await fetch("../methods/clienteEdt.php", {
        method: "POST",
        body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);

    if (resposta["erro"]) {
      
        msgAlertErro.innerHTML = resposta["msg"];

        setTimeout(() => {
          msgAlertErro.innerHTML = "";
          }, 1000);
    } else {

        msgAlert.innerHTML = resposta["msg"];
        setTimeout(() => {
          location.reload(true);
        }, 1000);

        
    }
});


  </script>
</body>

</html>