<!-- /*
* Template Name: LuxuryHotel
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php

  session_start();
  include_once("../methods/quartoList.php");
  include_once("../methods/include_dao.php");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>LuxuryHotel Free HTML Template by Untree.co</title>
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
              <li class="active"><a href="#">Reserva</a></li>
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
                <a href="../methods/validar.php"><span class="icon-person"></span></a>
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
      <div class="untree_co--site-hero inner-page" style="background-image: url('../images/wallpaperflare.com_wallpaper.jpg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 text-center">
                <div class="site-hero-contents" data-aos="fade-up">
                  <h1 class="hero-heading text-white">Faça sua Reserva</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="untree_co--site-section mx-auto">
          <div class="container">
          <?php

            if (empty($_SESSION['cod']) && empty($_SESSION['nome'])) {
              echo "<div class='alert alert-danger' role='alert'>Para fazer uma reserva é necessário fazer Login</div>";
            } else {

          ?>
            <div class="row check-availabilty my-0" id="next">
              <div class="block-32" data-aos="fade-up" data-aos-offset="-200">
                <span id="msgErroCheck"></span>
                <form id="cadReservaForm">
                  <input type="hidden" id="funcionario_cod" name="cliente_cod" class="form-control">
                  <input type="hidden" id="cliente_cod" name="cliente_cod" class="form-control">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                      <label for="checkin_date" class="font-weight-bold text-black">Data de Entrada</label>
                      <div class="field-icon-wrap">
                        <input type="date" id="checkin_date" name="checkin_date" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                      <label for="checkout_date" class="font-weight-bold text-black">Data de Saída</label>
                      <div class="field-icon-wrap">
                        <input type="date" id="checkout_date" name="checkout_date" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                      <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
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
                        <div class="col-md-4 mb-3 mb-md-0">
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
                        <div class="col-md-4 mb-3 mb-md-0">
                          <label for="children" class="font-weight-bold text-black">Crianças</label>
                          <div class="field-icon-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="children" id="children" class="form-control">
                              <option value="">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3+</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 align-self-end">
                      <button class="btn btn-block text-white">Checar e Reservar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php
            }

          ?>
        </section>
        <div class="untree_co--site-section py-5 bg-body-darker cta">
          <div class="container">
            <div class="row">
              <div class="col-12 text-center">
                <h3 class="m-0 p-0">Se você tiver uma solicitação especial. Contate-nos.<a href="tel://+55 (88) 98170 3525">+55 (88) 98170 3525</a></h3>
              </div>
            </div>
          </div>
        </div>

      </main>

      
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
                    <li><a href="#reserva">Reservas</a></li>
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

    <script src="../js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>

    <script src="../js/vendor/owl.carousel.min.js"></script>
    
    <script src="../js/vendor/jarallax.min.js"></script>
    <script src="../js/vendor/jarallax-element.min.js"></script>
    <script src="../js/vendor/ofi.min.js"></script>

    <script src="../js/vendor/aos.js"></script>

    <script src="../js/vendor/jquery.lettering.js"></script>
    <script src="../js/vendor/jquery.sticky.js"></script>

    <script src="../js/vendor/TweenMax.min.js"></script>
    <script src="../js/vendor/ScrollMagic.min.js"></script>
    <script src="../js/vendor/scrollmagic.animation.gsap.min.js"></script>
    <script src="../js/vendor/debug.addIndicators.min.js"></script>


    <script src="../js/main.js"></script>
    <script src="../js/reserva.js"></script>
  </body>
</html>