<?php 

    # NOM DU SERVEUR
    $sName = "localhost";
    # NOM D'UTILISATEUR
    $uName = "root";
    # MOT DE PASSE
    $pass = "root";
    # NOM DE LA BASE
    $db_name = "gestionsyndic";

    #CONNECTION A LA BASE DE DONNÉES
    try {
        $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    # ERREUR DE CONNECTION
    catch(PDOException $e){
        echo "Connection erreur : ". $e->getMessage();
    }