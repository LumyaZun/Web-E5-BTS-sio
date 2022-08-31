<?php
    // demarrage de la session
    session_start();

    // on détruit la session active 
    session_destroy(); 

    // on renvoie à la page de connexion quand la session est détruite
    header("Location:index.php");

    // ferme la page
    exit();
?>