<?php

    session_start();
    require_once('connessione.php');
    $voto = $_POST["voto"];
    $commento = $_POST["comment"];
    $utente = $_SESSION["user"];
    $stadio = $_POST["stadio"];

    echo $commento,$voto,$stadio,$utente;
    
    if(!empty($_POST["comment"]) && !empty($_SESSION["user"]) && !empty($_POST["voto"]) && !empty($_POST["stadio"])){
        $query = "INSERT INTO recensione(voto,commento,utente,stadio) VALUES ($voto,'$commento','$utente','$stadio')";
        $conn->query($query);
    }
    header("Location: stadiTutti.php");
    $conn->close();
    exit();
?>
