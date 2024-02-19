<?php

    include_once("include_dao.php");
    $quartoDAO = new QuartoDAO();
    $fotoDAO = new FotoDAO();

    $cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM foto WHERE quarto_cod=:quarto_cod";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":quarto_cod", $cod);
    $consulta->execute();
    $imagens = $consulta->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($cod)) {

        $dados = $quartoDAO->listarUm($cod);

        $carrosel = "<div id='carouselExampleFade' class='carousel slide carousel-fade'><div class='carousel-inner'>";
        

        foreach($imagens as $key=>$imagem){
            if($key == 0){
                $carrosel .="<div class='carousel-item active'><img src='../methods/imgQuartos/".$imagem['imagem']."' class='d-block w-100' alt='...'></div>";
            }
            else{
                $carrosel .="<div class='carousel-item'><img src='../methods/imgQuartos/".$imagem['imagem']."' class='d-block w-100' alt='...'></div>";    
            }
            
        }

        
        $carrosel .= "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='prev'><span class='carousel-control-prev-icon' aria-hidden='true'></span><span class='visually-hidden'>Previous</span></button><button class='carousel-control-next' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='next'><span class='carousel-control-next-icon' aria-hidden='true'></span><span class='visually-hidden'>Next</span></button></div>";
        
        // $dados = "casa: ". $cod;

        $retorna = ['erro' => false, 'dados' => $dados, "img" => $carrosel];

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger mt-4 mb-0' role='alert'>Erro: Nenhum Quarto encontrado</div>"];
    }

    echo json_encode($retorna);

?>