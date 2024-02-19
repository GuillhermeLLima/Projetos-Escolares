<?php
session_start();
?>

<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.111.3">
  <title>OM Shanti | CRUD</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../favicon.png">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">

    </header>

    <main class="px-3">
      <h1>OM Shanti</h1>
      <p class="lead">Área restrita somente para funcionários do Hotel.<br>Faça login para continuar.</p>
      <p class="lead">
        <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white" data-bs-toggle="offcanvas"
          data-bs-target="#logOffcanvas" aria-controls="offcanvasExample">Login</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Por <a href="../index.php" class="text-white">OM shanti Hotel & Resort.</a></p>
    </footer>
  </div>


  <div class="offcanvas offcanvas-start" tabindex="-1" id="logOffcanvas" aria-labelledby="logOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">OM Shanti - Login</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="mb-4">
        faça login para ter acesso à pagina de Admnistração.
      </div>

      <div id="msgAlertErroLogin"></div>
      <span id="msgAlert"></span>
      <form class="d-flex flex-column justify-content-start" id="logFuncionarioForm">
        <div class="mb-3">
          <label for="email" class="form-label d-flex justify-content-start">Email address</label>
          <input type="email" class="form-control d-flex justify-content-start" name="email" id="email"
            aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text d-flex justify-content-start">Não compartilharemos seu E-mail para
            ninguém.
          </div>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label d-flex justify-content-start">Password</label>
          <input type="password" class="form-control d-flex justify-content-start" name="senha" id="senha"
            autocomplete="on">
        </div>
        <button type="submit" class="btn btn-dark">Entrar</button>
      </form>
    </div>
  </div>

  <script src="../js/funcionario.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>

  <script>
    logForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      //Verifica se os campos foram preenchidios
      if (document.getElementById("email").value === "") {
        msgErroLog.innerHTML =
          "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo usuário</div>";
      } else if (document.getElementById("senha").value === "") {
        msgErroLog.innerHTML =
          "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo senha</div>";
      } else {
        //Envia os dados para o PHP
        const dadosForm = new FormData(logForm);

        const dados = await fetch("../methods/funcionarioLog.php", {
          method: "POST",
          body: dadosForm,
        });

        //Recebe os dados do PHP
        const resposta = await dados.json();

        // console.log(resposta);

        //Verifica os dados
        if (resposta["erro"]) {
          msgErroLog.innerHTML = resposta["msg"];
        } else {
          //Direciona para a página
          logForm.reset();
          window.location = "nav.php";
          document.getElementById("dados-usuario").innerHTML =
            "Bem Vindo" +
            resposta["dados"].nome +
            "<br><a href='methods/clienteSair.php'>Sair</a>";
        }
      }
    });
  </script>

</body>

</html>