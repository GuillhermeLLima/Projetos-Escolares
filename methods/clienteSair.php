<?php

    session_start();
    unset($_SESSION['cod'], $_SESSION['nome']);
    header("Location: ../index.php");

?>