<?php 

    session_start();

    if(isset($_SESSION['cod']) && isset($_SESSION['nome'])){
        header("Location: ../pages/perfil.php");
    } else {   
        header("Location: ../pages/login.php");
    }

?>