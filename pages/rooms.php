<!-- /*
* Template Name: LuxuryHotel
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<?php

  session_start();
  include("../methods/include_dao.php");
  $dao = new QuartoDAO();
  $quartos = $dao->listarTodos();
  
  

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
              <li ><a href="../index.php">Home</a></li>
              <li><a href="reserva.php">Reserva</a></li>
              <li><a href="amenities.php">Serviços</a></li>
              <li class="active"><a href="rooms.php">Quartos</a></li>
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
        
        <div class="untree_co--site-hero inner-page" style="background-image: url('../images/quartos.jpeg')">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-7 text-center">
                <div class="site-hero-contents" data-aos="fade-up">
                  <h1 class="hero-heading text-white">Quartos</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="untree_co--site-section pb-0">
          <div class="container-fluid px-md-0">

            <div class="row justify-content-center text-center site-section pt-0">
              <div class="col-md-6">
                <h2 class="display-4" data-aos="fade-up">Aproveite sua Estadia</h2>
                <p data-aos="fade-up" data-aos-delay="100">Descubra o luxo absoluto em nossa seção de quartos: design elegante, vistas deslumbrantes, comodidades de puro luxo e conforto. Uma experiência inesquecível.</p>
              </div>
            </div>

          </div>

            <section class="section section-rooms d-flex flex-column">
            

            <?php
                foreach($quartos as $quarto) {
                  
              ?>
                  
                  <?php
                    $foto = new FotoDAO();
                    $fotos = $foto->carregar($quarto['cod']);

                    $carrosel = "<div id='carouselExampleFade".$quarto['cod']."' class='carousel slide carousel-fade'><div class='carousel-inner'>";
                                    

                    foreach($fotos as $key=>$img){
                      
                       if($key == 0){
                        $carrosel .="<div class='carousel-item active'><img src='../methods/imgQuartos/".$img['imagem']."' class='d-block w-100' alt='...'></div>";
                      }
                      else{
                          $carrosel .="<div class='carousel-item'><img src='../methods/imgQuartos/".$img['imagem']."' class='d-block w-100' alt='...'></div>";    
                      }

                    }
                    
                      $carrosel .= "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleFade".$quarto['cod']."' data-bs-slide='prev'><span class='carousel-control-prev-icon' aria-hidden='true'></span><span class='visually-hidden'>Previous</span></button><button class='carousel-control-next' type='button' data-bs-target='#carouselExampleFade".$quarto['cod']."' data-bs-slide='next'><span class='carousel-control-next-icon' aria-hidden='true'></span><span class='visually-hidden'>Next</span></button></div>";

                    
                    
                    echo$carrosel;
                  ?>

                  
                    
                  <div class="row justify-content-center">
                    <div class="col-lg-8 py-5">
                      <h3 class="display-4 heading"><span class="room--name"><?=$quarto['nome']?></span></h3>
                      <div class="room-exerpt">
                        <div class="room-price lg-4"><span class="room-price>"><?=$quarto['preco']?></span><span class="per">/Noite</span></div>
                        <p class="room--descrption"><?=$quarto['descricao']?></p>
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
                    <li><a href="#quartos">Quartos</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


    <script src="../js/main.js"></script>
  </body>
</html>